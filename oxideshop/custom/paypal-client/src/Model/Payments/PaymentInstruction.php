<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Any additional payment instructions for PayPal Commerce Platform customers. Enables features for the PayPal
 * Commerce Platform, such as delayed disbursement and collection of a platform fee. Applies during order
 * creation for captured payments or during capture of authorized payments.
 */
class PaymentInstruction implements JsonSerializable
{
    use BaseModel;

    /** @var array<PlatformFee> */
    public $platform_fees;

    /** @var string */
    public $disbursement_mode;
}
