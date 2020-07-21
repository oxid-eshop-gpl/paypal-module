<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The order details.
 */
class Order extends ActivityTimestamps implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var PaymentSourceResponse */
    public $payment_source;

    /** @var string */
    public $intent;

    /** @var Payer */
    public $payer;

    /** @var string */
    public $expiration_time;

    /** @var array */
    public $purchase_units;

    /** @var string */
    public $status;

    /** @var array */
    public $links;

    /** @var CreditFinancingOffer */
    public $credit_financing_offer;
}
