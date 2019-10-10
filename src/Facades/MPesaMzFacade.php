<?php

namespace calvinchiulele\MPesaMz\Facades;

use calvinchiulele\MPesaMz\Services\MpesaMz;
use Illuminate\Support\Facades\Facade;

/**
 *
 * @package calvinchiulele\MPesaMz\Facades
 * @author Calvin Chiulele <cchiulele@protonmail.com>
 * @since 0.1.0
 * @see MpesaMz
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
