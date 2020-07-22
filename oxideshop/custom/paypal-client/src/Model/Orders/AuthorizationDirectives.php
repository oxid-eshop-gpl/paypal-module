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

    /**
     * @var integer
     * Honor period offset. This is the offset period (in seconds) starting from time of authorization after which
     * held funds (if any) will be released automatically.
     */
    public $honor_time_offset;

    /**
     * @var integer
     * Expiry period offset. This is the offset period (in seconds) starting from time of authorization after which
     * authorization is voided automatically.
     */
    public $expiry_time_offset;

    /**
     * @var boolean
     * Indicates if multiple captures can be allowed on an Authorization.
     */
    public $allow_multiple_captures;

    /**
     * @var AuthTolerance
     * Auth-Capture Tolerance details.
     */
    public $tolerance;

    public function validate()
    {
    }
}
