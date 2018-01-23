<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Store
 *
 * @package AppBundle\Entity
 */
class Store
{
    use DateTimeTrait;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection
     * @see Product
     */
    private $products;

    /**
     * Store constructor
     */
    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Product $product
     * @return void
     */
    public function addProduct(Product $product): void
    {
        $this->products->add($product);
    }

    /**
     * @param Product $product
     * @return void
     */
    public function removeProduct(Product $product): void
    {
        $this->products->removeElement($product);
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function hasProduct(Product $product): bool
    {
        return $this->products->contains($product);
    }

    /**
     * @return array<Product>
     */
    public function getProducts(): array
    {
        return $this->products->toArray();
    }
}
