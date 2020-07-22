<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in ReferenceDispute must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 255, "id in ReferenceDispute must have maxlength of 255 $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in ReferenceDispute must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in ReferenceDispute must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
