<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as billing disputes, the original transaction ID, and the correct amount.
 */
class Extensions implements \JsonSerializable
{
    use BaseModel;

    /** @var boolean */
    public $merchant_contacted;

    /** @var string */
    public $merchant_contacted_outcome;

    /** @var string */
    public $merchant_contacted_time;

    /** @var string */
    public $merchant_contacted_mode;

    /** @var string */
    public $buyer_contacted_time;

    /** @var BillingDisputesProperties */
    public $billing_dispute_properties;

    /** @var UnauthorizedDisputeProperties */
    public $unauthorized_dispute_properties;

    /** @var MerchandizeDisputeProperties */
    public $merchandize_dispute_properties;

    /** @var ExternalCaseProperties */
    public $external_case_properties;
}
