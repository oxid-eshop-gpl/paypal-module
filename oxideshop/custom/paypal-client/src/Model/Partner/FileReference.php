<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The file reference. Can be a file in PayPal MediaServ, PayPal DMS, or another custom store.
 */
class FileReference implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $reference_url;

    /** @var string */
    public $content_type;

    /** @var string */
    public $create_time;

    /** @var string */
    public $size;
}
