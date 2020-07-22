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
     */
    public $service_started;

    /**
     * @var string
     * The customer specified note about the service usage.
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
     */
    public $purchase_url;
}
