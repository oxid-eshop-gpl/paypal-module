<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength($this->type, 1, "type in BusinessIdentification must have minlength of 1 $within");
        !isset($this->type) || Assert::maxLength($this->type, 127, "type in BusinessIdentification must have maxlength of 127 $within");
        !isset($this->identifier) || Assert::minLength($this->identifier, 1, "identifier in BusinessIdentification must have minlength of 1 $within");
        !isset($this->identifier) || Assert::maxLength($this->identifier, 127, "identifier in BusinessIdentification must have maxlength of 127 $within");
        !isset($this->issuer) || Assert::notNull($this->issuer->country_code, "country_code in issuer must not be NULL within BusinessIdentification $within");
        !isset($this->issuer) || Assert::isInstanceOf($this->issuer, DocumentIssuer::class, "issuer in BusinessIdentification must be instance of DocumentIssuer $within");
        !isset($this->issuer) || $this->issuer->validate(BusinessIdentification::class);
        !isset($this->issued_time) || Assert::minLength($this->issued_time, 20, "issued_time in BusinessIdentification must have minlength of 20 $within");
        !isset($this->issued_time) || Assert::maxLength($this->issued_time, 64, "issued_time in BusinessIdentification must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
