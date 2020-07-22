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
     */
    public $type;

    /**
     * @var string
     * The number or value of the identifier.
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
     */
    public $issued_time;
}
