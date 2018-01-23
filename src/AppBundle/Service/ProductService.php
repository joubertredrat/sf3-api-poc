<?php

namespace AppBundle\Service;

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
}
