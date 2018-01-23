<?php

namespace AppBundle\Presenter;

/**
 * Products Presenter
 *
 * @package AppBundle\Presenter
 */
class ProductsPresenter
{
    use PresenterBagTrait;

    /**
     * Products Presenter constructor
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

        /** @var PresenterInterface $productPresenter */
        foreach ($this->getAll() as $productPresenter) {
            $return[] = $productPresenter->toArrayApiTinyStore();
        }

        return $return;
    }
}