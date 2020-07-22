<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The name of the person.
 *
 * generated from: customer_common-v1-schema-account_model-person_name.json
 */
class PersonName extends Name implements JsonSerializable
{
    use BaseModel;

    /** Indicates that this name is the legal name of the user. */
    const TYPE_LEGAL = 'LEGAL';

    /**
     * @var string
     * The person's name type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_LEGAL
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->type, "type in PersonName must not be NULL $within");
         Assert::minLength($this->type, 1, "type in PersonName must have minlength of 1 $within");
         Assert::maxLength($this->type, 255, "type in PersonName must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
