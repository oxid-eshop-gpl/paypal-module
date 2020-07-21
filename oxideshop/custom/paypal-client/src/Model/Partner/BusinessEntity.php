<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business entity of the account.
 */
class BusinessEntity extends Business implements JsonSerializable
{
    use BaseModel;

    /** @var BeneficialOwners */
    public $beneficial_owners;

    /** @var array<OfficeBearer> */
    public $office_bearers;

    /** @var CurrencyRange */
    public $annual_sales_volume_range;

    /** @var CurrencyRange */
    public $average_monthly_volume_range;

    /** @var string */
    public $business_description;
}
