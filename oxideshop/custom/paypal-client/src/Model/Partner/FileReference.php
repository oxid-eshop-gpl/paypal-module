<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in FileReference must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 255, "id in FileReference must have maxlength of 255 $within");
        !isset($this->reference_url) || Assert::minLength($this->reference_url, 1, "reference_url in FileReference must have minlength of 1 $within");
        !isset($this->reference_url) || Assert::maxLength($this->reference_url, 2000, "reference_url in FileReference must have maxlength of 2000 $within");
        !isset($this->create_time) || Assert::minLength($this->create_time, 20, "create_time in FileReference must have minlength of 20 $within");
        !isset($this->create_time) || Assert::maxLength($this->create_time, 64, "create_time in FileReference must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
