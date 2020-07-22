<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment card used to fund the payment. Card can be a credit or debit card.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-card_response_with_billing_address.json
 */
class CardResponseWithBillingAddress extends CardResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The card holder's name as it appears on the card.
     *
     * minLength: 2
     * maxLength: 300
     */
    public $name;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $billing_address;

    public function validate()
    {
        assert(!isset($this->name) || strlen($this->name) >= 2);
        assert(!isset($this->name) || strlen($this->name) <= 300);
        assert(isset($this->billing_address));
    }
}
