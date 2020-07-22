<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->tolerance) || Assert::isInstanceOf($this->tolerance, AuthTolerance::class, "tolerance in AuthorizationDirectives must be instance of AuthTolerance $within");
        !isset($this->tolerance) || $this->tolerance->validate(AuthorizationDirectives::class);
    }

    public function __construct()
    {
    }
}
