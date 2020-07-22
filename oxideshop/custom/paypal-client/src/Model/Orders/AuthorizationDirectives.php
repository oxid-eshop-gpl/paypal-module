<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Auth directives for the transaction.
 *
 * generated from: model-authorization_directives.json
 */
class AuthorizationDirectives implements JsonSerializable
{
    use BaseModel;

    /** @var integer */
    public $honor_time_offset;

    /** @var integer */
    public $expiry_time_offset;

    /** @var boolean */
    public $allow_multiple_captures;

    /**
     * @var AuthTolerance
     * Auth-Capture Tolerance details.
     */
    public $tolerance;
}
