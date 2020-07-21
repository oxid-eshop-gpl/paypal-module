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

    /** The funds are released to the merchant immediately. */
    const DISBURSEMENT_MODE_INSTANT = 'INSTANT';

    /** The funds are held for a finite number of days. The actual duration depends on the region and type of integration. You can release the funds through a referenced payout. Otherwise, the funds disbursed automatically after the specified duration. */
    const DISBURSEMENT_MODE_DELAYED = 'DELAYED';

    /** @var array<PlatformFee> */
    public $platform_fees;

    /**
     * @var string
     * The funds that are held on behalf of the merchant.
     *
     * use one of constants defined in this class to set the value:
     * @see DISBURSEMENT_MODE_INSTANT
     * @see DISBURSEMENT_MODE_DELAYED
     */
    public $disbursement_mode;
}
