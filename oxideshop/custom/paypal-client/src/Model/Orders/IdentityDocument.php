<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The identity document.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v4-schema-json-openapi-2.0-identity_document.json
 */
class IdentityDocument implements JsonSerializable
{
    use BaseModel;

    /** Social security number. */
    const TYPE_SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';

    /** Individual tax identification number. */
    const TYPE_INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER = 'INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER';

    /** National identification number, such as CPF or AADHAR. */
    const TYPE_NATIONAL_IDENTIFICATION_NUMBER = 'NATIONAL_IDENTIFICATION_NUMBER';

    /** The tax identification number, such as PAN CARD. */
    const TYPE_TAX_IDENTIFICATION_NUMBER = 'TAX_IDENTIFICATION_NUMBER';

    /** The passport number. */
    const TYPE_PASSPORT_NUMBER = 'PASSPORT_NUMBER';

    /** Last 4 digits of the social security number. */
    const TYPE_SSN4 = 'SSN4';

    /**
     * @var string
     * The identity document type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SOCIAL_SECURITY_NUMBER
     * @see TYPE_INDIVIDUAL_TAXPAYER_IDENTIFICATION_NUMBER
     * @see TYPE_NATIONAL_IDENTIFICATION_NUMBER
     * @see TYPE_TAX_IDENTIFICATION_NUMBER
     * @see TYPE_PASSPORT_NUMBER
     * @see TYPE_SSN4
     */
    public $type;

    /**
     * @var DocumentIssuer
     * The document-issuing authority information.
     */
    public $issuer;

    /**
     * @var string
     * The document number, such as the passport number.
     */
    public $id_number;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $issued_date;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $expiration_date;
}
