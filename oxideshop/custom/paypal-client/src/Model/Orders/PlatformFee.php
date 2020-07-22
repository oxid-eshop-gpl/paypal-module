<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The platform or partner fee, commission, or brokerage fee that is associated with the transaction. Not a
 * separate or isolated transaction leg from the external perspective. The platform fee is limited in scope and
 * is always associated with the original payment for the purchase unit.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-platform_fee.json
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->amount) || Assert::notNull($this->amount->currency_code, "currency_code in amount must not be NULL within PlatformFee $within");
        !isset($this->amount) || Assert::notNull($this->amount->value, "value in amount must not be NULL within PlatformFee $within");
        !isset($this->amount) || Assert::isInstanceOf($this->amount, Money::class, "amount in PlatformFee must be instance of Money $within");
        !isset($this->amount) || $this->amount->validate(PlatformFee::class);
        !isset($this->payee) || Assert::isInstanceOf($this->payee, PayeeBase::class, "payee in PlatformFee must be instance of PayeeBase $within");
        !isset($this->payee) || $this->payee->validate(PlatformFee::class);
    }

    public function __construct()
    {
    }
}
