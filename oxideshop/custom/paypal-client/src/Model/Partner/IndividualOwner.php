<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The individual owner of the account.
 *
 * generated from: customer_common_overrides-individual_owner.json
 */
class IndividualOwner extends Person implements JsonSerializable
{
    use BaseModel;

    /** Primary account holder. */
    public const TYPE_PRIMARY = 'PRIMARY';

    /**
     * Role of the person party played in the account.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_PRIMARY
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->type) || Assert::minLength(
            $this->type,
            1,
            "type in IndividualOwner must have minlength of 1 $within"
        );
        !isset($this->type) || Assert::maxLength(
            $this->type,
            255,
            "type in IndividualOwner must have maxlength of 255 $within"
        );
    }

    public function __construct()
    {
    }
}
