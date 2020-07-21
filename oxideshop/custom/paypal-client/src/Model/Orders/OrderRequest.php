<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The order request details.
 */
class OrderRequest implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $intent;

    /** @var string */
    public $processing_instruction;

    /** @var Payer */
    public $payer;

    /** @var array<PurchaseUnitRequest> */
    public $purchase_units;

    /** @var PaymentSource */
    public $payment_source;

    /** @var OrderApplicationContext */
    public $application_context;
}
