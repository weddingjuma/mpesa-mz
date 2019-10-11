<?php

namespace CalvinChiulele\MPesaMz\Services;

use abdulmueid\mpesa\Config;
use abdulmueid\mpesa\interfaces\TransactionResponseInterface;
use abdulmueid\mpesa\Transaction;

/**
 * This class is responsible to forward requests to Transaction
 *
 * @author Calvin Chiulele <cchiulele@protonmail.com>
 * @since 0.1.0
 * @see Transaction
 */
class MpesaMz
{
    /**
     * Class that defines all the M-Pesa API transactions
     *
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
        $this->transaction = new Transaction(
            Config::loadFromFile(config_path('mpesa-config.php')));
    }

    /**
     * Forwards the calls to transaction
     *
     * @param string $name
     * @param array $arguments
     *
     * @return TransactionResponseInterface
     */
    public function __call(string $name, array $arguments): TransactionResponseInterface
    {
        return call_user_func_array([$this->transaction, $name], $arguments);
    }
}
