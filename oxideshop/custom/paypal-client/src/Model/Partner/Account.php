<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Common account object to hold the account related details of the customer.
 */
class Account implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $individual_owners;

    /** @var BusinessEntity */
    public $business_entity;
}
