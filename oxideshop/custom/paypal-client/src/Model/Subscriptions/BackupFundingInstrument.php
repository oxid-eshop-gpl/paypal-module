<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The backup funding instrument to use for payment when the primary instrument fails.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-backup_funding_instrument.json
 */
class BackupFundingInstrument implements JsonSerializable
{
    use BaseModel;

    /**
     * @var CardResponse
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     */
    public $card;
}
