<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The risk assessment for a customer or merchant account or transaction.
 */
class RiskAssessment implements JsonSerializable
{
    use BaseModel;

    /** @var integer */
    public $score;

    /** @var array */
    public $reasons;
}
