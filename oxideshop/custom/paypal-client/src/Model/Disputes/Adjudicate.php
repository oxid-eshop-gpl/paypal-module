<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request to settle a dispute in either the customer's or merchant's favor.
 *
 * generated from: request-adjudicate.json
 */
class Adjudicate implements JsonSerializable
{
    use BaseModel;

    /** Resolves the case in the customer's favor. Outcome is set to <code>RESOLVED_BUYER_FAVOR</code>. */
    const ADJUDICATION_OUTCOME_BUYER_FAVOR = 'BUYER_FAVOR';

    /** Resolves the case in the merchant's favor. Outcome is set to <code>RESOLVED_SELLER_FAVOR</code>. */
    const ADJUDICATION_OUTCOME_SELLER_FAVOR = 'SELLER_FAVOR';

    /**
     * @var string
     * The outcome of the adjudication.
     *
     * use one of constants defined in this class to set the value:
     * @see ADJUDICATION_OUTCOME_BUYER_FAVOR
     * @see ADJUDICATION_OUTCOME_SELLER_FAVOR
     * minLength: 1
     * maxLength: 255
     */
    public $adjudication_outcome;
}
