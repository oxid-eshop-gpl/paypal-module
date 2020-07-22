<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The file reference. Can be a file in PayPal MediaServ, PayPal DMS, or another custom store.
 *
 * generated from: customer_common-v1-schema-common_components-v4-schema-json-openapi-2.0-file_reference.json
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

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /** @var string */
    public $size;
}
