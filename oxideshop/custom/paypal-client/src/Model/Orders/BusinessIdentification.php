<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Business identification details.
 *
 * generated from: model-business_identification.json
 */
class BusinessIdentification implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The type of identification number. Eg: TAX_IDENTIFICATION_NUMBER, BUSINESS_REGISTRATION_NUMBER.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $type;

    /**
     * @var string
     * The number or value of the identifier.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $identifier;

    /**
     * @var DocumentIssuer
     * The document-issuing authority information.
     */
    public $issuer;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $issued_time;

    public function validate()
    {
        assert(!isset($this->type) || strlen($this->type) >= 1);
        assert(!isset($this->type) || strlen($this->type) <= 127);
        assert(!isset($this->identifier) || strlen($this->identifier) >= 1);
        assert(!isset($this->identifier) || strlen($this->identifier) <= 127);
        assert(isset($this->issuer));
        assert(!isset($this->issued_time) || strlen($this->issued_time) >= 20);
        assert(!isset($this->issued_time) || strlen($this->issued_time) <= 64);
    }
}
