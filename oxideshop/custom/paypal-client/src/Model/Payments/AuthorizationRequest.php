<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Authorizes either a portion or the full amount of a saved order.
 */
class AuthorizationRequest implements \JsonSerializable
{
    /** @var string */
    public $order_id;

    /** @var PaymentSource */
    public $payment_source;

    /** @var AmountWithBreakdown */
    public $amount;

    /** @var Payee */
    public $payee;

    /** @var string */
    public $description;

    /** @var string */
    public $custom_id;

    /** @var string */
    public $invoice_id;

    /** @var array */
    public $items;

    /** @var ShippingDetail */
    public $shipping;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
