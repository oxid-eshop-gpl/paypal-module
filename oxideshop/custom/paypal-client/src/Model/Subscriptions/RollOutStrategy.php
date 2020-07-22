<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The roll-out strategy for a pricing scheme update. After the pricing update, all new subscriptions are based
 * on this pricing scheme and the values in this object determine the behavior for the existing subscriptions.
 *
 * generated from: roll_out_strategy.json
 */
class RollOutStrategy implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $effective_time;

    /** @var string */
    public $process_change_from;
}
