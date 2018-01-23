<?php

namespace AppBundle\Presenter;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * PresenterBag Trait
 *
 * @package AppBundle\Presenter
 */
trait PresenterBagTrait
{
    /**
     * @var ArrayCollection
     */
    private $items;

    /**
     * @param PresenterEntityInterface $item
     * @return void
     */
    public function add(PresenterEntityInterface $item): void
    {
        $this->items->add($item);
    }

    /**
     * @param PresenterEntityInterface $item
     * @return void
     */
    public function remove(PresenterEntityInterface $item): void
    {
        $this->items->removeElement($item);
    }

    /**
     * @param PresenterEntityInterface $item
     * @return bool
     */
    public function has(PresenterEntityInterface $item): bool
    {
        $this->items->contains($item);
    }

    /**
     * @return array<PresenterEntityInterface>
     */
    public function getAll(): array
    {
        return $this->items->toArray();
    }

    /**
     * @return void
     */
    public function clear(): void
    {
        $this->items = new ArrayCollection();
    }
}