<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The provide supporting information request details.
 *
 * generated from: request-provide_supporting_info.json
 */
class ProvideSupportingInfo implements JsonSerializable
{
    use BaseModel;

    /**
     * The notes that describe the defense.
     *
     * @var string
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->notes, "notes in ProvideSupportingInfo must not be NULL $within");
        Assert::minLength(
            $this->notes,
            1,
            "notes in ProvideSupportingInfo must have minlength of 1 $within"
        );
        Assert::maxLength(
            $this->notes,
            2000,
            "notes in ProvideSupportingInfo must have maxlength of 2000 $within"
        );
    }

    public function __construct()
    {
    }
}
