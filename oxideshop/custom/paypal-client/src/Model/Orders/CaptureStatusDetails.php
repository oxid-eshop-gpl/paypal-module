<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the captured payment status.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-capture_status_details.json
 */
class CaptureStatusDetails implements JsonSerializable
{
    use BaseModel;

    /** The payer initiated a dispute for this captured payment with PayPal. */
    const REASON_BUYER_COMPLAINT = 'BUYER_COMPLAINT';

    /** The captured funds were reversed in response to the payer disputing this captured payment with the issuer of the financial instrument used to pay for this captured payment. */
    const REASON_CHARGEBACK = 'CHARGEBACK';

    /** The payer paid by an eCheck that has not yet cleared. */
    const REASON_ECHECK = 'ECHECK';

    /** Visit your online account. In your **Account Overview**, accept and deny this payment. */
    const REASON_INTERNATIONAL_WITHDRAWAL = 'INTERNATIONAL_WITHDRAWAL';

    /** No additional specific reason can be provided. For more information about this captured payment, visit your account online or contact PayPal. */
    const REASON_OTHER = 'OTHER';

    /** The captured payment is pending manual review. */
    const REASON_PENDING_REVIEW = 'PENDING_REVIEW';

    /** The payee has not yet set up appropriate receiving preferences for their account. For more information about how to accept or deny this payment, visit your account online. This reason is typically offered in scenarios such as when the currency of the captured payment is different from the primary holding currency of the payee. */
    const REASON_RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION = 'RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION';

    /** The captured funds were refunded. */
    const REASON_REFUNDED = 'REFUNDED';

    /** The payer must send the funds for this captured payment. This code generally appears for manual EFTs. */
    const REASON_TRANSACTION_APPROVED_AWAITING_FUNDING = 'TRANSACTION_APPROVED_AWAITING_FUNDING';

    /** The payee does not have a PayPal account. */
    const REASON_UNILATERAL = 'UNILATERAL';

    /** The payee's PayPal account is not verified. */
    const REASON_VERIFICATION_REQUIRED = 'VERIFICATION_REQUIRED';

    /**
     * @var string
     * The reason why the captured payment status is `PENDING` or `DENIED`.
     *
     * use one of constants defined in this class to set the value:
     * @see REASON_BUYER_COMPLAINT
     * @see REASON_CHARGEBACK
     * @see REASON_ECHECK
     * @see REASON_INTERNATIONAL_WITHDRAWAL
     * @see REASON_OTHER
     * @see REASON_PENDING_REVIEW
     * @see REASON_RECEIVING_PREFERENCE_MANDATES_MANUAL_ACTION
     * @see REASON_REFUNDED
     * @see REASON_TRANSACTION_APPROVED_AWAITING_FUNDING
     * @see REASON_UNILATERAL
     * @see REASON_VERIFICATION_REQUIRED
     */
    public $reason;
}