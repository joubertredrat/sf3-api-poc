<?php

namespace AppBundle\Presenter;

use AppBundle\Entity\Product;

/**
 * Product Presenter
 *
 * @package AppBundle\Presenter
 */
class ProductPresenter implements PresenterInterface, PresenterEntityInterface
{
    /**
     * @var Product
     */
    private $product;

    /**
     * Product Presenter constructor
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return array
     */
    private function getValueApi(): array
    {
        return [
            'cents' => $this->product->getValue(),
            'decimal' => $this->product->getValue() / 100,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toArrayApi(): array
    {
        $createdAt = $this->product->getCreatedAt()->format('Y-m-d H:i:s');
        $updatedAt = $this->product->getUpdatedAt() instanceof \DateTime ?
            $this->product->getUpdatedAt()->format('Y-m-d H:i:s') :
            null
        ;

        return [
            'id' => $this->product->getId(),
            'name' => $this->product->getName(),
            'value' => $this->getValueApi(),
            'stock' => $this->product->getStock(),
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
        ];
    }

    /**
     * @return array
     */
    public function toArrayApiTinyStore(): array
    {
        $createdAt = $this->product->getCreatedAt()->format('Y-m-d H:i:s');
        $updatedAt = $this->product->getUpdatedAt() instanceof \DateTime ?
            $this->product->getUpdatedAt()->format('Y-m-d H:i:s') :
            null
        ;

        return [
            'id' => $this->product->getId(),
            'name' => $this->product->getName(),
            'value' => $this->getValueApi(),
            'stock' => $this->product->getStock(),
            'store' => [
                'name' => $this->product->getStore()->getName(),
            ],
            'createdAt' => $createdAt,
            'updatedAt' => $updatedAt,
        ];
    }
}
