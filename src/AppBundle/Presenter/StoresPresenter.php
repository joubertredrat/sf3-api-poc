<?php

namespace AppBundle\Presenter;

/**
 * Stores Presenter
 *
 * @package AppBundle\Presenter
 */
class StoresPresenter
{
    use PresenterBagTrait;

    /**
     * StoresPresenter constructor
     */
    public function __construct()
    {
        $this->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function toArrayApi(): array
    {
        $return = [];

        /** @var PresenterInterface $storePresenter */
        foreach ($this->getAll() as $storePresenter) {
            $return[] = $storePresenter->toArrayApi();
        }

        return $return;
    }
}
