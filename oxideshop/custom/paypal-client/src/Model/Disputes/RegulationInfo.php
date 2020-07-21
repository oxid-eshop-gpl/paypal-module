<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the regulation under which the transaction is covered.
 */
class RegulationInfo implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $regulation_covered;

    /** @var string */
    public $resolution_sla;
}
