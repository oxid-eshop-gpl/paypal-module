<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Policy that determines whether the fee needs to be retained or returned while moving the money as part of
 * dispute process.
 *
 * generated from: response-fee_policy.json
 */
class FeePolicy implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $transaction_fee;
}
