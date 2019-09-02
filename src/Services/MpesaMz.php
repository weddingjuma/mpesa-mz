<?php

namespace calvinchiulele\MPesaMz\Services;

use abdulmueid\mpesa\Transaction;
use abdulmueid\mpesa\Config;

/**
 * Class MpesaMz
 * @package calvinchiulele\MPesaMz\Services
 * @author Calvin Chiulele <cchiulele@protonmail.com>
 * @since 0.1.0
 */
class MpesaMz
{
    /**
     * @var Transaction
     */
    protected $transaction;

    /**
     * Create a new instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->transaction = new Transaction(Config::loadFromFile(config_path('mpesa-config.php')));
    }

    /**
     * Forwards the calls to transaction
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->transaction, $name], $arguments);
    }
}
