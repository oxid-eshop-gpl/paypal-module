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
     */
    public $type;
}
