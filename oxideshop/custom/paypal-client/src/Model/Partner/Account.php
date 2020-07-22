<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Common account object to hold the account related details of the customer.
 *
 * generated from: customer_common_overrides-account.json
 */
class Account implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<IndividualOwner>
     * List of owners in the account. There should be only one primary account owner which is mentioned in their
     * role_type.
     */
    public $individual_owners;

    /**
     * @var BusinessEntity
     * The business entity of the account.
     */
    public $business_entity;

    public function validate()
    {
    }
}
