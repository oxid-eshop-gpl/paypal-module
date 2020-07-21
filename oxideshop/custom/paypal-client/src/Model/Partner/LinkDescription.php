<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The request-related [HATEOAS link](/docs/api/reference/api-responses/#hateoas-links) information.
 */
class LinkDescription implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $href;

    /** @var string */
    public $rel;

    /** @var string */
    public $method;

    /** @var string */
    public $title;

    /** @var string */
    public $mediaType;

    /** @var string */
    public $encType;

    /** @var LinkSchema */
    public $schema;

    /** @var LinkSchema */
    public $targetSchema;
}
