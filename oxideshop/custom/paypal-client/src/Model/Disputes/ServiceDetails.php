<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     * @var array<string>
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

    public function validate()
    {
        assert(!isset($this->description) || strlen($this->description) >= 1);
        assert(!isset($this->description) || strlen($this->description) <= 2000);
        assert(!isset($this->service_started) || strlen($this->service_started) >= 1);
        assert(!isset($this->service_started) || strlen($this->service_started) <= 255);
        assert(!isset($this->note) || strlen($this->note) >= 1);
        assert(!isset($this->note) || strlen($this->note) <= 2000);
        assert(!isset($this->purchase_url) || strlen($this->purchase_url) >= 1);
        assert(!isset($this->purchase_url) || strlen($this->purchase_url) <= 2000);
    }
}
