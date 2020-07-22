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

    /**
     * @var string
     * The ID of the referenced file.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var string
     * The reference URL for the file.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $reference_url;

    /**
     * @var string
     * The [Internet Assigned Numbers Authority (IANA) media type of the
     * file](https://www.iana.org/assignments/media-types/media-types.xhtml).
     */
    public $content_type;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The size of the file, in bytes.
     */
    public $size;
}
