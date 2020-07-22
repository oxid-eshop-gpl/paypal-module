<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant- or customer-submitted supporting information.
 *
 * generated from: response-supporting_info.json
 */
class SupportingInfo implements JsonSerializable
{
    use BaseModel;

    /** Information was submitted by the customer. */
    const SOURCE_SUBMITTED_BY_BUYER = 'SUBMITTED_BY_BUYER';

    /** Information was submitted by the merchant. */
    const SOURCE_SUBMITTED_BY_SELLER = 'SUBMITTED_BY_SELLER';

    /** Information was submitted by the partner. */
    const SOURCE_SUBMITTED_BY_PARTNER = 'SUBMITTED_BY_PARTNER';

    /**
     * @var string
     * Any supporting notes.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    /**
     * @var array<Document>
     * An array of metadata for the documents which were uploaded as supporting information for the dispute.
     */
    public $documents;

    /**
     * @var string
     * The source of the Information.
     *
     * use one of constants defined in this class to set the value:
     * @see SOURCE_SUBMITTED_BY_BUYER
     * @see SOURCE_SUBMITTED_BY_SELLER
     * @see SOURCE_SUBMITTED_BY_PARTNER
     * minLength: 1
     * maxLength: 255
     */
    public $source;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $provided_time;

    public function validate()
    {
        assert(!isset($this->notes) || strlen($this->notes) >= 1);
        assert(!isset($this->notes) || strlen($this->notes) <= 2000);
        assert(!isset($this->source) || strlen($this->source) >= 1);
        assert(!isset($this->source) || strlen($this->source) <= 255);
        assert(!isset($this->provided_time) || strlen($this->provided_time) >= 20);
        assert(!isset($this->provided_time) || strlen($this->provided_time) <= 64);
    }
}
