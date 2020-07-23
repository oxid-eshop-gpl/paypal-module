<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Indicates the form of authentication used on the financial instrument.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-authentication_result_type.json
 */
class AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /** The card was authenticated using 3D Secure (3DS) authentication scheme. */
    public const TYPE_THREE_DS_AUTHENTICATION = 'THREE_DS_AUTHENTICATION';

    /**
     * The type of authentication used on the financial instrument.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_THREE_DS_AUTHENTICATION
     * @var string | null
     */
    public $type;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    public function __construct()
    {
    }
}
