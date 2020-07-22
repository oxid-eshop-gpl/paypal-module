<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    public function validate()
    {
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 2000);
        assert(!isset($this->url) || strlen($this->url) >= 1);
        assert(!isset($this->url) || strlen($this->url) <= 2000);
    }
}
