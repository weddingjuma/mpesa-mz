<?php

use Illuminate\Support\Facades\Facade;

/**
 * Class MPesaMzFacade
 *
 * @author Calvin Chiulele <cchiulele@protonmail.com>
 * @since 0.1.0
 */
class MPesaMzFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mpesamz';
    }
}
