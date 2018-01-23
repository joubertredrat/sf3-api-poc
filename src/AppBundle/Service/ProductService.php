<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use AppBundle\Exception\Product\NotFoundException as ProductNotFoundException;
use AppBundle\Presenter\ProductPresenter;
use AppBundle\Presenter\ProductsPresenter;
use AppBundle\Repository\ProductRepository;

/**
 * Product Service
 *
 * @package AppBundle\Service
 */
class ProductService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * Product Service constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function get(int $id): ?Product
    {
        /** @var Product $product */
        $product = $this->productRepository->find($id);

        return $product;
    }

    /**
     * @param int $id
     * @return ProductPresenter
     * @throws ProductNotFoundException
     */
    public function getApi(int $id): ProductPresenter
    {
        $product = $this->get($id);

        if (!$product instanceof Product) {
            throw new ProductNotFoundException(
                sprintf('Product not found: %d', $id)
            );
        }

        return new ProductPresenter($product);
    }

    /**
     * @return array<Product>
     */
    public function getAll(): array
    {
        return $this->productRepository->findAll();
    }

    /**
     * @return ProductsPresenter
     */
    public function getAllApi(): ProductsPresenter
    {
        $productsPresenter = new ProductsPresenter();

        /** @var Product $product */
        foreach ($this->getAll() as $product) {
            $productsPresenter->add(
                new ProductPresenter($product)
            );
        }

        return $productsPresenter;
    }
}
