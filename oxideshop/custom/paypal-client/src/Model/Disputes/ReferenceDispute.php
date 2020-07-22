<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details about the partner dispute.
 *
 * generated from: referred-reference_dispute.json
 */
class ReferenceDispute implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The dispute ID of the partner dispute for which a PayPal dispute is created.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 255);
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
    }
}
