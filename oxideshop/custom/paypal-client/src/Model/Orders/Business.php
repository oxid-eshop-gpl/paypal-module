<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business information.
 */
class Business extends Party implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $names;

    /** @var string */
    public $type;

    /** @var BusinessCategory */
    public $category;

    /** @var array */
    public $identifications;

    /** @var string */
    public $description;

    /** @var array */
    public $owners;

    /** @var string */
    public $url;

    /** @var CustomerServiceContact */
    public $customer_service_contacts;
}
