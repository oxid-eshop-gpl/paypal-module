<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the
 * eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted
 * transaction ID.
 *
 * generated from: referred-eligibility_request.json
 */
class EligibilityRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The encrypted transaction ID.
     */
    public $transaction_id;

    /**
     * @var array<EligibilityRequestItem>
     * An array of the items in the disputed transaction.
     */
    public $disputed_items;
}
