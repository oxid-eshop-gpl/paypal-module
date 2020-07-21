<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The service details.
 */
class ServiceDetails implements \JsonSerializable
{
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

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
