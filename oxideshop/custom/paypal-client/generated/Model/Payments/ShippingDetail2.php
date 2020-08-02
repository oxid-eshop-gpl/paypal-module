<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\CommonV3AddressPortable;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\CommonV3Name;
use Webmozart\Assert\Assert;

/**
 * The shipping details.
 *
 * generated from:
 * customized_x_unsupported_8164_MerchantCommonComponentsSpecification-v1-schema-shipping_detail.json
 */
class ShippingDetail2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The name of the party.
     *
     * @var CommonV3Name | null
     */
    public $name;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var CommonV3AddressPortable | null
     */
    public $address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::isInstanceOf(
            $this->name,
            CommonV3Name::class,
            "name in ShippingDetail2 must be instance of CommonV3Name $within"
        );
        !isset($this->name) ||  $this->name->validate(ShippingDetail2::class);
        !isset($this->address) || Assert::isInstanceOf(
            $this->address,
            CommonV3AddressPortable::class,
            "address in ShippingDetail2 must be instance of CommonV3AddressPortable $within"
        );
        !isset($this->address) ||  $this->address->validate(ShippingDetail2::class);
    }

    private function map(array $data)
    {
        if (isset($data['name'])) {
            $this->name = new CommonV3Name($data['name']);
        }
        if (isset($data['address'])) {
            $this->address = new CommonV3AddressPortable($data['address']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
