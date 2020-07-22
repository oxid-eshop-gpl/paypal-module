<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tax ID of the customer. The customer is also known as the payer. Both `tax_id` and `tax_id_type` are
 * required.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-tax_info.json
 */
class TaxInfo implements JsonSerializable
{
    use BaseModel;

    /** The individual tax ID type. */
    const TAX_ID_TYPE_BR_CPF = 'BR_CPF';

    /** The business tax ID type. */
    const TAX_ID_TYPE_BR_CNPJ = 'BR_CNPJ';

    /**
     * @var string
     * The customer's tax ID. Supported for the PayPal payment method only. Typically, the tax ID is 11 characters
     * long for individuals and 14 characters long for businesses.
     *
     * maxLength: 14
     */
    public $tax_id;

    /**
     * @var string
     * The customer's tax ID type. Supported for the PayPal payment method only.
     *
     * use one of constants defined in this class to set the value:
     * @see TAX_ID_TYPE_BR_CPF
     * @see TAX_ID_TYPE_BR_CNPJ
     */
    public $tax_id_type;

    public function validate()
    {
        assert(!isset($this->tax_id) || strlen($this->tax_id) <= 14);
    }
}
