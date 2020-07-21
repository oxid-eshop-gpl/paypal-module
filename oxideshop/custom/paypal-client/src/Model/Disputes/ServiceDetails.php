<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The service details.
 */
class ServiceDetails implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $description;

    /** @var string */
    public $service_started;

    /** @var string */
    public $note;

    /** @var array */
    public $sub_reasons;

    /** @var string */
    public $purchase_url;
}
