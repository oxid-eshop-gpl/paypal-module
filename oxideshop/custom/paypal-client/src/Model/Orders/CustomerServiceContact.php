<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customer care contact information.
 *
 * generated from: model-customer_service_contact.json
 */
class CustomerServiceContact implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * Customer service email addresses.
     */
    public $emails;

    /**
     * @var array<PhoneInfo>
     * Details of customer service phone numbers.
     */
    public $phones;

    public function validate()
    {
    }
}
