<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted transaction ID.
 */
class EligibilityRequest implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $transaction_id;

    /** @var array */
    public $disputed_items;
}
