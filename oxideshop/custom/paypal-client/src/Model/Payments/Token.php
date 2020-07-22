<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tokenized payment source to fund a payment.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-token.json
 */
class Token implements JsonSerializable
{
    use BaseModel;

    /** A secure, one-time-use reference to a payment source, such as payment card or PayPal account. */
    const TYPE_NONCE = 'NONCE';

    /** The payment method token, which is a reference to a transactional payment source. Typically stored on the merchant's server. */
    const TYPE_PAYMENT_METHOD_TOKEN = 'PAYMENT_METHOD_TOKEN';

    /** The PayPal billing agreement ID. References an approved recurring payment for goods or services. */
    const TYPE_BILLING_AGREEMENT = 'BILLING_AGREEMENT';

    /** The PayPal funding option ID. Represents a payment plan identifier computed based on buyer wallet, seller account and transaction currency. */
    const TYPE_FUNDING_OPTION_ID = 'FUNDING_OPTION_ID';

    /** This input is primarily aimed at providing backward compatibility to approved merchants that have previously integrated with [DoReferenceTransaction](https://developer.paypal.com/docs/classic/api/merchant/DoReferenceTransaction-API-Operation-NVP/?mark=DoReferenceTransaction). The use is analogous to the use of [ReferenceID](https://developer.paypal.com/docs/classic/api/merchant/DoReferenceTransaction-API-Operation-NVP/?mark=REFERENCEID) field within the DoReferenceTransaction API. The value is typically a valid transaction ID from a previous purchase, such as a card charge using the DoDirectPayment API. Transaction IDs are valid for 4 years from the transaction date. */
    const TYPE_PAYPAL_TRANSACTION_ID = 'PAYPAL_TRANSACTION_ID';

    /** This input is primarily aimed at providing backward compatibility to approved merchants that have previously integrated with [PayFlow SubmitReferenceTransactions](https://developer.paypal.com/docs/classic/payflow/integration-guide/submit-transactions/?mark=Reference%20Transactions#submit-reference-transactions---tokenization). The [PNREF](https://developer.paypal.com/docs/classic/payflow/integration-guide/transaction-responses/?mark=pnref#pnref) is a unique transaction identification number issued by PayPal. The `PNREF` is returned in a transaction response indicating that your transaction was received by PayPal. `PNREF` is valid for 15 months from the transaction date. */
    const TYPE_PNREF = 'PNREF';

    /** This id is the authorization id from previously successful authorization call.  It is used to authorize additional amount over the previously authorized amount stored in the systems, if the requested amount is higher.  In the case that authorization id is no longer valid (e.g. voided or used), it would return an error.  For expired authorization id, it would do a fresh authorization. */
    const TYPE_AUTHORIZATION_ID = 'AUTHORIZATION_ID';

    /**
     * @var string
     * The PayPal-generated ID for the token.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

    /**
     * @var string
     * The tokenization method that generated the ID.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_NONCE
     * @see TYPE_PAYMENT_METHOD_TOKEN
     * @see TYPE_BILLING_AGREEMENT
     * @see TYPE_FUNDING_OPTION_ID
     * @see TYPE_PAYPAL_TRANSACTION_ID
     * @see TYPE_PNREF
     * @see TYPE_AUTHORIZATION_ID
     * minLength: 1
     * maxLength: 255
     */
    public $type;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 255);
        assert(!isset($this->type) || strlen($this->type) >= 1);
        assert(!isset($this->type) || strlen($this->type) <= 255);
    }
}
