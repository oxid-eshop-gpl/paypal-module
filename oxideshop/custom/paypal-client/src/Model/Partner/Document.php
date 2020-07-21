<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The document object.
 */
class Document implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var array */
    public $labels;

    /** @var string */
    public $name;

    /** @var string */
    public $identification_number;

    /** @var string */
    public $issue_date;

    /** @var string */
    public $expiry_date;

    /** @var string */
    public $issuing_country_code;

    /** @var array<FileReference> */
    public $files;

    /** @var array<array> */
    public $links;
}
