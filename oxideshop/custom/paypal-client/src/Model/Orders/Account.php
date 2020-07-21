<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Encapsulates the properties of user account.
 */
class Account implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $account_number;

    /** @var string */
    public $account_id;

    /** @var string */
    public $tier;

    /** @var string */
    public $registration_type;

    /** @var string */
    public $legal_country_code;

    /** @var array */
    public $account_tags;

    /** @var string */
    public $status;

    /** @var string */
    public $pricing_category;

    /** @var string */
    public $legal_entity;

    /** @var string */
    public $time_created;
}
