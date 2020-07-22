<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A request by a merchant to accept a customer's merchandise claim.
 *
 * generated from: request-accept_claim.json
 */
class AcceptClaim implements JsonSerializable
{
    use BaseModel;

    /** Merchant is accepting customer's claim as they could not ship the item back to the customer */
    const ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM = 'DID_NOT_SHIP_ITEM';

    /** Merchant is accepting customer's claim as it is taking too long for merchant to fulfil the order */
    const ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING = 'TOO_TIME_CONSUMING';

    /** Merchant is accepting customer's claim as the item is lost in mail or transit */
    const ACCEPT_CLAIM_REASON_LOST_IN_MAIL = 'LOST_IN_MAIL';

    /** Merchant is accepting customer's claim as the merchant is not able to find sufficient evidence to win this dispute */
    const ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN = 'NOT_ABLE_TO_WIN';

    /** Merchant is accepting customer’s claims to follow their internal company policy */
    const ACCEPT_CLAIM_REASON_COMPANY_POLICY = 'COMPANY_POLICY';

    /** This is the default value merchant can use if none of the above reasons apply */
    const ACCEPT_CLAIM_REASON_REASON_NOT_SET = 'REASON_NOT_SET';

    /**
     * @var string
     * The merchant's notes about the claim. PayPal can, but the customer cannot, view these notes.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * @var string
     * The merchant's reason for acceptance of the customer's claim.
     *
     * use one of constants defined in this class to set the value:
     * @see ACCEPT_CLAIM_REASON_DID_NOT_SHIP_ITEM
     * @see ACCEPT_CLAIM_REASON_TOO_TIME_CONSUMING
     * @see ACCEPT_CLAIM_REASON_LOST_IN_MAIL
     * @see ACCEPT_CLAIM_REASON_NOT_ABLE_TO_WIN
     * @see ACCEPT_CLAIM_REASON_COMPANY_POLICY
     * @see ACCEPT_CLAIM_REASON_REASON_NOT_SET
     * minLength: 1
     * maxLength: 255
     */
    public $accept_claim_reason;

    /**
     * @var string
     * The merchant-provided ID of the invoice for the refund. This optional value is used to map the refund to an
     * invoice ID in the merchant's system.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $return_shipping_address;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $refund_amount;
}
