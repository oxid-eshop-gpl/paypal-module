<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The documents associated with the person.
 */
class PersonDocument extends Document implements JsonSerializable
{
    use BaseModel;

    const TYPE_SOCIAL_SECURITY_NUMBER = 'SOCIAL_SECURITY_NUMBER';
    const TYPE_EMPLOYMENT_IDENTIFICATION_NUMBER = 'EMPLOYMENT_IDENTIFICATION_NUMBER';
    const TYPE_TAX_IDENTIFICATION_NUMBER = 'TAX_IDENTIFICATION_NUMBER';
    const TYPE_PASSPORT_NUMBER = 'PASSPORT_NUMBER';
    const TYPE_PENSION_FUND_ID = 'PENSION_FUND_ID';
    const TYPE_MEDICAL_INSURANCE_ID = 'MEDICAL_INSURANCE_ID';
    const TYPE_CNPJ = 'CNPJ';
    const TYPE_CPF = 'CPF';
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
