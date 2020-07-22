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
     * @var string
     * The notes that describe the defense.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $notes;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->notes) || Assert::minLength($this->notes, 1, "notes in ProvideSupportingInfo must have minlength of 1 $within");
        !isset($this->notes) || Assert::maxLength($this->notes, 2000, "notes in ProvideSupportingInfo must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
