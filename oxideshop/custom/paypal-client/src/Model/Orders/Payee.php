<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The merchant who receives the funds and fulfills the order. The merchant is also known as the payee.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payee.json
 */
class Payee extends PayeeBase implements JsonSerializable
{
    use BaseModel;

    /**
     * The merchant information. The merchant is also known as the payee. Appears to the customer in checkout,
     * transactions, email receipts, and transaction history.
     *
     * @var PayeeDisplayable | null
     */
    public $display_data;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->display_data) || Assert::isInstanceOf(
            $this->display_data,
            PayeeDisplayable::class,
            "display_data in Payee must be instance of PayeeDisplayable $within"
        );
        !isset($this->display_data) ||  $this->display_data->validate(Payee::class);
    }

    public function __construct()
    {
    }
}
