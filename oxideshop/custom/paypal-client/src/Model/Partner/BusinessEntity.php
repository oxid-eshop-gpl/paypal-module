<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business entity of the account.
 *
 * generated from: customer_common_overrides-business_entity.json
 */
class BusinessEntity extends Business implements JsonSerializable
{
    use BaseModel;

    /**
     * @var BeneficialOwners
     * Beneficial owners of the entity.
     */
    public $beneficial_owners;

    /**
     * @var array<OfficeBearer>
     * List of Directors present as part of the business entity.
     */
    public $office_bearers;

    /**
     * @var CurrencyRange
     * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
     */
    public $annual_sales_volume_range;

    /**
     * @var CurrencyRange
     * The currency range, from the minimum inclusive amount to the maximum inclusive amount.
     */
    public $average_monthly_volume_range;

    /**
     * @var string
     * The business goals description. For example, a mission statement.
     *
     * minLength: 1
     * maxLength: 256
     */
    public $business_description;
}
