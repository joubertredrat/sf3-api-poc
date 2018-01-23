<?php

namespace AppBundle\Service;

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
}
