<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The service details.
 *
 * generated from: response-service_details.json
 */
class ServiceDetails implements JsonSerializable
{
    use BaseModel;

    /** The service was started. */
    const SERVICE_STARTED_YES = 'YES';

    /** The service was not started. */
    const SERVICE_STARTED_NO = 'NO';

    /** The service was cancelled. */
    const SERVICE_STARTED_CANCELLED = 'CANCELLED';

    /**
     * @var string
     * The service description.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $description;

    /**
     * @var string
     * Indicates whether the service was started or cancelled.
     *
     * use one of constants defined in this class to set the value:
     * @see SERVICE_STARTED_YES
     * @see SERVICE_STARTED_NO
     * @see SERVICE_STARTED_CANCELLED
     * minLength: 1
     * maxLength: 255
     */
    public $service_started;

    /**
     * @var string
     * The customer specified note about the service usage.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * @var string[]
     * An array of sub-reasons for the service issue.
     */
    public $sub_reasons;

    /**
     * @var string
     * The URL of the merchant or marketplace site where the customer purchased the service.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $purchase_url;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->description) || Assert::minLength($this->description, 1, "description in ServiceDetails must have minlength of 1 $within");
        !isset($this->description) || Assert::maxLength($this->description, 2000, "description in ServiceDetails must have maxlength of 2000 $within");
        !isset($this->service_started) || Assert::minLength($this->service_started, 1, "service_started in ServiceDetails must have minlength of 1 $within");
        !isset($this->service_started) || Assert::maxLength($this->service_started, 255, "service_started in ServiceDetails must have maxlength of 255 $within");
        !isset($this->note) || Assert::minLength($this->note, 1, "note in ServiceDetails must have minlength of 1 $within");
        !isset($this->note) || Assert::maxLength($this->note, 2000, "note in ServiceDetails must have maxlength of 2000 $within");
        !isset($this->sub_reasons) || Assert::isArray($this->sub_reasons, "sub_reasons in ServiceDetails must be array $within");
        !isset($this->purchase_url) || Assert::minLength($this->purchase_url, 1, "purchase_url in ServiceDetails must have minlength of 1 $within");
        !isset($this->purchase_url) || Assert::maxLength($this->purchase_url, 2000, "purchase_url in ServiceDetails must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
