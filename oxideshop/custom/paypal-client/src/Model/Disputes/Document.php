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
     */
    public $name;

    /**
     * @var string
     * The document URI.
     */
    public $url;
}
