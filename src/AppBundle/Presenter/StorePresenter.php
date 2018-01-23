<?php

namespace AppBundle\Presenter;

use AppBundle\Entity\Store;

/**
 * Store Presenter
 *
 * @package AppBundle\Presenter
 */
class StorePresenter implements PresenterInterface, PresenterEntityInterface
{
    use PresenterBagTrait;

    /**
     * @var Store
     */
    private $store;

    /**
     * Store Presenter constructor
     *
     * @param Store $store
     */
    public function __construct(Store $store)
    {
        $this->clear();
        $this->store = $store;
    }

    /**
     * {@inheritdoc}
     */
    public function toArrayApi(): array
    {
        $createdAt = $this->store->getCreatedAt()->format('Y-m-d H:i:s');
        $updatedAt = $this->store->getUpdatedAt() instanceof \DateTime ?
            $this->store->getUpdatedAt()->format('Y-m-d H:i:s') :
            null
        ;

        $products = [];

        /** @var ProductPresenter $productPresenter */
        foreach ($this->getAll() as $productPresenter) {
            $products[] = $productPresenter->toArrayApi();
        }

        return [
            'id' => $this->store->getId(),
            'name' => $this->store->getName(),
            'products' => $products,
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
        ];
    }
}
