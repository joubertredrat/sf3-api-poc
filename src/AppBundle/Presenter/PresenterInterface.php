<?php

namespace AppBundle\Presenter;

/**
 * Presenter Interface
 *
 * @package AppBundle\Presenter
 */
interface PresenterInterface
{
    /**
     * Format array to response in API controller
     *
     * @return array
     */
    public function toArrayApi(): array;
}
