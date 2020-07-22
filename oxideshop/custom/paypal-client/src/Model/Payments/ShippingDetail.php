<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The shipping details.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-shipping_detail.json
 */
class ShippingDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Name
     * The name of the party.
     */
    public $name;

    /**
     * @var array<ShippingOption>
     * An array of shipping options that the payee or merchant offers to the payer to ship or pick up their items.
     *
     * maxItems: 10
     */
    public $options;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf($this->name, Name::class, "name in ShippingDetail must be instance of Name $within");
        !isset($this->name) || $this->name->validate(ShippingDetail::class);
        !isset($this->options) || Assert::maxCount($this->options, 10, "options in ShippingDetail must have max. count of 10 $within");
        !isset($this->options) || Assert::isArray($this->options, "options in ShippingDetail must be array $within");

                                if (isset($this->options)){
                                    foreach ($this->options as $item) {
                                        $item->validate(ShippingDetail::class);
                                    }
                                }

        !isset($this->address) || Assert::isInstanceOf($this->address, AddressPortable::class, "address in ShippingDetail must be instance of AddressPortable $within");
        !isset($this->address) || $this->address->validate(ShippingDetail::class);
    }

    public function __construct()
    {
    }
}
