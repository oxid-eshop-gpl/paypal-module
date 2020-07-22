<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * For a new case, lists the eligible and ineligible dispute reasons. For an existing dispute, lists the eligible
 * and ineligible dispute reasons; the eligible reasons are the ones that the customer can use to update the
 * dispute. To check the eligibility of case creation, specify the encrypted transaction ID. To check the
 * eligibility of dispute reason modification, specify the dispute ID.
 *
 * generated from: request-eligibility.json
 */
class Eligibility implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The encrypted transaction ID. The response lists the eligible and ineligible dispute reasons.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $encrypted_transaction_id;

    /**
     * @var string
     * The ID of the dispute. The response lists the eligible and ineligible dispute reasons. The customer can use
     * the eligible reasons to update the dispute.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $dispute_id;

    /**
     * @var string
     * Customer provided description of the issue.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $buyer_note;
}
