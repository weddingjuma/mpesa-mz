<?php

namespace calvinchiulele\MPesaMz\tests\Services;

use abdulmueid\mpesa\interfaces\TransactionResponseInterface;
use abdulmueid\mpesa\Transaction;
use calvinchiulele\MPesaMz\Services\MpesaMz;
use PHPUnit\Framework\TestCase;

/**
 *
 * @package calvinchiulele\MPesaMz\tests\Services
 * @author Calvin Chiulele
 * @since 0.1.0
 */
class MpesaMzTest extends TestCase
{
    /**
     * Transaction
     *
     * @var Transaction
     */
    private $transaction;

    /**
     * The amount of the transaction
     *
     * @var float
     */
    private $amount;

    /**
     * The MSISDN of the customer
     *
     * @var string
     */
    private $msisdn;

    /**
     * Setup the test environment
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->transaction = new MpesaMz();
        $this->amount = 1;
        $this->msisdn = ''; // Full MSISDN i.e. 258840000000
    }

    /**
     * Verifies if the payment was performed with successfully
     *
     * @return TransactionResponseInterface
     * @throws \Exception
     */
    public function testPayment(): TransactionResponseInterface
    {
        $payment = $this->transaction->payment(
            $this->msisdn, $this->amount,
            bin2hex(random_bytes(6)),
            bin2hex(random_bytes(6))
        );

        $this->assertInstanceOf(
            \abdulmueid\mpesa\TransactionResponse::class,
            $payment
        );

        $this->assertNotEmpty($payment->getResponse());
        $this->assertNotEmpty($payment->getCode());
        $this->assertNotEmpty($payment->getDescription());
        $this->assertNotEmpty($payment->getTransactionID());
        $this->assertNotEmpty($payment->getConversationID());
        $this->assertEmpty($payment->getTransactionStatus());
        $this->assertStringStartsWith('INS-', $payment->getCode());

        return $payment;
    }

    /**
     * Verifies if the refund was performed with successfully
     *
     * @depends testPayment
     * @param $payment TransactionResponseInterface
     * @return TransactionResponseInterface
     */
    public function testRefund(TransactionResponseInterface $payment): TransactionResponseInterface
    {
        $refund = $this->transaction->refund($payment->getTransactionID(), $this->amount);

        $this->assertInstanceOf(
            \abdulmueid\mpesa\TransactionResponse::class,
            $refund
        );

        $this->assertNotEmpty($refund->getResponse());
        $this->assertNotEmpty($refund->getCode());
        $this->assertNotEmpty($refund->getDescription());
        $this->assertNotEmpty($refund->getTransactionID());
        $this->assertNotEmpty($refund->getConversationID());
        $this->assertEmpty($refund->getTransactionStatus());
        $this->assertStringStartsWith('INS-', $refund->getCode());

        return $refund;
    }

    /**
     * Verifies if the query was performed successfully
     *
     * @depends testRefund
     * @param $refund TransactionResponseInterface
     */
    public function testQuery(TransactionResponseInterface $refund)
    {
        $query = $this->transaction->query($refund->getTransactionID());

        $this->assertInstanceOf(
            \abdulmueid\mpesa\TransactionResponse::class,
            $query
        );

        $this->assertNotEmpty($query->getResponse());
        $this->assertNotEmpty($query->getCode());
        $this->assertNotEmpty($query->getDescription());
        $this->assertEmpty($query->getTransactionID());
        $this->assertEmpty($query->getConversationID());
        $this->assertNotEmpty($query->getTransactionStatus());
        $this->assertStringStartsWith('INS-', $query->getCode());
    }
}
