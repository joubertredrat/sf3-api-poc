<?php

namespace AppBundle\Service;

use AppBundle\Entity\Product;
use AppBundle\Entity\Store;
use AppBundle\Exception\Store\NotFoundException as StoreNotFoundException;
use AppBundle\Presenter\ProductPresenter;
use AppBundle\Presenter\StorePresenter;
use AppBundle\Presenter\StoresPresenter;
use AppBundle\Repository\StoreRepository;

/**
 * Store Service
 *
 * @package AppBundle\Service
 */
class StoreService
{
    /**
     * @var StoreRepository
     */
    private $storeRepository;

    /**
     * Store Service constructor
     *
     * @param StoreRepository $storeRepository
     */
    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * @param int $id
     * @return Store|null
     */
    public function get(int $id): ?Store
    {
        /** @var Store $store */
        $store = $this->storeRepository->find($id);

        return $store;
    }

    /**
     * @param int $id
     * @return StorePresenter
     * @throws StoreNotFoundException
     */
    public function getApi(int $id): StorePresenter
    {
        /** @var Store $store */
        $store = $this->get($id);

        if (!$store instanceof Store) {
            throw new StoreNotFoundException(
                sprintf('Store not found: %d', $id)
            );
        }

        $storePresenter = new StorePresenter($store);

        /** @var Product $product */
        foreach ($store->getProducts() as $product) {
            $storePresenter->add(
                new ProductPresenter($product)
            );
        }

        return $storePresenter;
    }

    /**
     * @return array<Store>
     */
    public function getAll(): array
    {
        return $this->storeRepository->findAll();
    }

    /**
     * @return StoresPresenter
     */
    public function getAllApi(): StoresPresenter
    {
        $storesPresenter = new StoresPresenter();

        /** @var Store $store */
        foreach ($this->getAll() as $store) {

            $storePresenter = new StorePresenter($store);

            /** @var Product $product */
            foreach ($store->getProducts() as $product) {
                $storePresenter->add(
                    new ProductPresenter($product)
                );
            }

            $storesPresenter->add($storePresenter);
        }

        return $storesPresenter;
    }
}
