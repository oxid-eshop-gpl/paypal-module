<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The business beneficial owner of the account.
 *
 * generated from: customer_common_overrides-business_beneficial_owner.json
 */
class BusinessBeneficialOwner extends Business implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The percentage, as a fixed-point, signed decimal number. For example, define a 19.99% interest rate as
     * `19.99`.
     */
    public $percentage_of_ownership;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
