<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The documents associated with the business.
 */
class BusinessDocument extends Document implements JsonSerializable
{
    use BaseModel;

    /** A social security number. */
    const TYPE_SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';

    /** The employee identification number. */
    const TYPE_EMPLOYMENT_IDENTIFICATION_NUMBER = 'EMPLOYMENT_IDENTIFICATION_NUMBER';

    /** The tax identification number. */
    const TYPE_TAX_IDENTIFICATION_NUMBER = 'TAX_IDENTIFICATION_NUMBER';

    /** A passport number. */
    const TYPE_PASSPORT_NUMBER = 'PASSPORT_NUMBER';

    /** A pension fund ID. */
    const TYPE_PENSION_FUND_ID = 'PENSION_FUND_ID';

    /** A medical insurance ID. */
    const TYPE_MEDICAL_INSURANCE_ID = 'MEDICAL_INSURANCE_ID';

    /** The identification number issued to Brazilian companies by the Department of Federal Revenue of Brazil. */
    const TYPE_CNPJ = 'CNPJ';

    /** A Brazilian individual's taxpayer registry identification number. */
    const TYPE_CPF = 'CPF';

    /** The Permanent account number issued by the Indian Income Tax Department. */
    const TYPE_PAN = 'PAN';

    /**
     * @var string
     * The type of documents.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_SOCIAL_SECURITY_NUMBER
     * @see TYPE_EMPLOYMENT_IDENTIFICATION_NUMBER
     * @see TYPE_TAX_IDENTIFICATION_NUMBER
     * @see TYPE_PASSPORT_NUMBER
     * @see TYPE_PENSION_FUND_ID
     * @see TYPE_MEDICAL_INSURANCE_ID
     * @see TYPE_CNPJ
     * @see TYPE_CPF
     * @see TYPE_PAN
     */
    public $type;
}
