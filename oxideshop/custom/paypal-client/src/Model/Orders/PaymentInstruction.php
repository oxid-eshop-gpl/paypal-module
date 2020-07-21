<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

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

    const DISBURSEMENT_MODE_INSTANT = 'INSTANT';
    const DISBURSEMENT_MODE_DELAYED = 'DELAYED';

    /** @var array<PlatformFee> */
    public $platform_fees;

    /**
     * @var string
     * The funds that are held on behalf of the merchant.
     */
    public $disbursement_mode;
}
