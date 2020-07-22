<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The platform or partner fee, commission, or brokerage fee that is associated with the transaction. Not a
 * separate or isolated transaction leg from the external perspective. The platform fee is limited in scope and
 * is always associated with the original payment for the purchase unit.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-platform_fee.json
 */
class PlatformFee implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    /**
     * @var PayeeBase
     * The details for the merchant who receives the funds and fulfills the order. The merchant is also known as the
     * payee.
     */
    public $payee;
}
