<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * An uploaded document as a binary object that supports a dispute.
 *
 * generated from: response-document.json
 */
class Document implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The document name.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    /**
     * @var string
     * The document URI.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->name) || Assert::minLength($this->name, 1, "name in Document must have minlength of 1 $within");
        !isset($this->name) || Assert::maxLength($this->name, 2000, "name in Document must have maxlength of 2000 $within");
        !isset($this->url) || Assert::minLength($this->url, 1, "url in Document must have minlength of 1 $within");
        !isset($this->url) || Assert::maxLength($this->url, 2000, "url in Document must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
