<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Shipping details for transaction.
 *
 * generated from: model-shipping_details.json
 */
class ShippingDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AddressWithConfirmation
     * Address and confirmation details.
     */
    public $shipping_address;

    /**
     * @var array<ShippingOption>
     * An array of shipping options that the payee or merchant offers to the payer to ship or pick up their items.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 10
     */
    public $options;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->shipping_address) || Assert::isInstanceOf($this->shipping_address, AddressWithConfirmation::class, "shipping_address in ShippingDetails must be instance of AddressWithConfirmation $within");
        !isset($this->shipping_address) || $this->shipping_address->validate(ShippingDetails::class);
        Assert::notNull($this->options, "options in ShippingDetails must not be NULL $within");
         Assert::minCount($this->options, 1, "options in ShippingDetails must have min. count of 1 $within");
         Assert::maxCount($this->options, 10, "options in ShippingDetails must have max. count of 10 $within");
         Assert::isArray($this->options, "options in ShippingDetails must be array $within");

                                if (isset($this->options)){
                                    foreach ($this->options as $item) {
                                        $item->validate(ShippingDetails::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
