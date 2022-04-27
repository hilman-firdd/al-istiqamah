<?php

namespace Firmantr3\Midtrans;

use Firmantr3\Midtrans\Facade\Midtrans;

/**
 * Read raw post input and parse as JSON. Provide getters for fields in notification object
 *
 * Example:
 *
 * ```php
 *
 *   namespace Firmantr3\Midtrans;
 *
 *   $notif = new Notification();
 *   echo $notif->order_id;
 *   echo $notif->transaction_status;
 * ```
 */
class Notification
{

    const TRANSACTION_STATUS_PENDING = 'pending';
    const TRANSACTION_STATUS_SUCCESS = 'success';
    const TRANSACTION_STATUS_SETTLEMENT = 'settlement';
    const TRANSACTION_STATUS_EXPIRE = 'expire';
    const TRANSACTION_STATUS_CAPTURE = 'capture';
    const TRANSACTION_STATUS_AUTHORIZE = 'authorize';
    const TRANSACTION_STATUS_DENY = 'deny';
    const TRANSACTION_STATUS_CANCEL = 'cancel';
    const TRANSACTION_STATUS_REFUND = 'refund';
    const TRANSACTION_STATUS_PARTIAL_REFUND = 'partial_refund';
    const TRANSACTION_STATUS_CHARGEBACK = 'chargeback';
    const TRANSACTION_STATUS_PARTIAL_CHARGEBACK = 'partial_chargeback';
    const TRANSACTION_STATUS_FAILURE = 'failure';

    /** @var object */
    private $response;

    public function __construct($input_source = "php://input")
    {
        $raw_notification = optional(json_decode(Midtrans::input($input_source), true));
        
        $transactionId = $raw_notification['transaction_id'] ?: $raw_notification['order_id'];
        
        if(!$transactionId) {
            $this->response = null;
            return;
        }
        
        $status_response = Midtrans::status($transactionId);
        $this->response = $status_response;
    }

    public function __get($name)
    {
        if (array_key_exists($name, (array) $this->response)) {
            return $this->response->$name;
        }
    }

    /**
     * Get the value of response
     *
     * @return object
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * alias of getResponse
     *
     * @return object
     */
    public function toObject()
    {
        return $this->getResponse();
    }

    /**
     * Get response in array
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this->response;
    }

    /**
     * toArray alias
     *
     * @return array
     */
    public function all()
    {
        return $this->toArray();
    }

    /**
     * get transaction status
     *
     * @param null|string|array $value
     * @return string|boolean
     */
    public function transactionStatus($value = null)
    {
        return optionalGetValueOrValueIsEqual($this->transaction_status, $value);
    }

    /**
     * Return fraud status
     *
     * @param null|string $value
     * @return string|boolean
     */
    public function fraud($value = null) {
        return optionalGetValueOrValueIsEqual($this->fraud_status, $value);
    }

    /**
     * set on transaction status callback
     *
     * @param string $transactionStatus
     * @param callable $callback
     * @return self
     */
    public function onTransactionStatus($transactionStatus, callable $callback) {
        if($this->transactionStatus($transactionStatus)) {
            ($callback)($this);
        }

        return $this;
    }

    /**
     * Set on fraud status callback
     *
     * @param string $fraudStatus
     * @param callable $callable
     * @return self
     */
    public function onFraudStatus($fraudStatus, callable $callable) {
        if ($this->fraud($fraudStatus)) {
            ($callable)($this);
        }

        return $this;
    }

    /**
     * Set on pending callback
     *
     * @param callable $callable
     * @return self
     */
    public function onPending(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_PENDING, $callable);
    }

    /**
     * Set on success callback
     *
     * @param callable $callable
     * @return self
     */
    public function onSuccess(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_SUCCESS, $callable);
    }

    /**
     * Set on settlement callback
     *
     * @param callable $callable
     * @return self
     */
    public function onSettlement(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_SETTLEMENT, $callable);
    }

    /**
     * Set on expire callback
     *
     * @param callable $callable
     * @return self
     */
    public function onExpire(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_EXPIRE, $callable);
    }

    /**
     * Set on capture callback
     *
     * @param callable $callable
     * @return self
     */
    public function onCapture(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_CAPTURE, $callable);
    }

    /**
     * Set on authorize callback
     *
     * @param callable $callable
     * @return self
     */
    public function onAuthorize(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_AUTHORIZE, $callable);
    }

    /**
     * Set on deny callback
     *
     * @param callable $callable
     * @return self
     */
    public function onDeny(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_DENY, $callable);
    }

    /**
     * Set on cancel callback
     *
     * @param callable $callable
     * @return self
     */
    public function onCancel(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_CANCEL, $callable);
    }

    /**
     * Set on refund callback
     *
     * @param callable $callable
     * @return self
     */
    public function onRefund(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_REFUND, $callable);
    }

    /**
     * Set on partial refund callback
     *
     * @param callable $callable
     * @return self
     */
    public function onPartialRefund(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_PARTIAL_REFUND, $callable);
    }

    /**
     * Set on chargeback callback
     *
     * @param callable $callable
     * @return self
     */
    public function onChargeback(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_CHARGEBACK, $callable);
    }

    /**
     * Set on partial chargeback callback
     *
     * @param callable $callable
     * @return self
     */
    public function onPartialChargeback(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_PARTIAL_CHARGEBACK, $callable);
    }

    /**
     * Set on failure callback
     *
     * @param callable $callable
     * @return self
     */
    public function onFailure(callable $callable)
    {
        return $this->onTransactionStatus(self::TRANSACTION_STATUS_FAILURE, $callable);
    }

}
