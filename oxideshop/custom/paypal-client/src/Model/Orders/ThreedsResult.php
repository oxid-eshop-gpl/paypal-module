<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional 3D Secure authentication data.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-3ds_result.json
 */
class ThreedsResult extends AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /** Mastercard non-3-D Secure transaction. */
    const ECI_FLAG_MASTERCARD_NON_3D_SECURE_TRANSACTION = 'MASTERCARD_NON_3D_SECURE_TRANSACTION';

    /** Mastercard attempted authentication transaction. */
    const ECI_FLAG_MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION';

    /** Mastercard fully authenticated transaction. */
    const ECI_FLAG_MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION = 'MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB fully authenticated transaction. */
    const ECI_FLAG_FULLY_AUTHENTICATED_TRANSACTION = 'FULLY_AUTHENTICATED_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB attempted authentication transaction. */
    const ECI_FLAG_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'ATTEMPTED_AUTHENTICATION_TRANSACTION';

    /** VISA, AMEX, JCB, DINERS CLUB non-3-D Secure transaction. */
    const ECI_FLAG_NON_3D_SECURE_TRANSACTION = 'NON_3D_SECURE_TRANSACTION';

    /** Non-SecureCode transaction, bypassed by the merchant. */
    const UCAF_INDICATOR_NON_SECURECODE_TRANSACTION = 'NON_SECURECODE_TRANSACTION';

    /** Merchant-Only SecureCode transaction. */
    const UCAF_INDICATOR_MERCHANT_ONLY_SECURECODE_TRANSACTION = 'MERCHANT_ONLY_SECURECODE_TRANSACTION';

    /** Fully authenticated SecureCode. */
    const UCAF_INDICATOR_FULLY_AUTHENTICATED_SECURECODE = 'FULLY_AUTHENTICATED_SECURECODE';

    /** Card Brand Amex. */
    const CARD_BRAND_AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';

    /** Card Brand DISCOVER. */
    const CARD_BRAND_DISCOVER = 'DISCOVER';

    /** Card Brand JCB. */
    const CARD_BRAND_JCB = 'JCB';

    /** Card Brand MAESTRO. */
    const CARD_BRAND_MAESTRO = 'MAESTRO';

    /** Card Brand MASTERCARD. */
    const CARD_BRAND_MASTERCARD = 'MASTERCARD';

    /** Card Brand SOLO. */
    const CARD_BRAND_SOLO = 'SOLO';

    /** Card Brand VISA. */
    const CARD_BRAND_VISA = 'VISA';

    /** Card Brand ELECTRON. */
    const CARD_BRAND_ELECTRON = 'ELECTRON';

    /** Card Brand ELO. */
    const CARD_BRAND_ELO = 'ELO';

    /** Yes. The bank is participating in 3-D Secure protocol and will return the ACSUrl. */
    const ENROLLED_Y = 'Y';

    /** No. The bank is not participating in 3-D Secure protocol. */
    const ENROLLED_N = 'N';

    /** Unavailable. The DS or ACS is not available for authentication at the time of the request. */
    const ENROLLED_U = 'U';

    /** Bypass. The merchant authentication rule is triggered to bypass authentication. */
    const ENROLLED_B = 'B';

    /** Successful authentication. */
    const PARES_STATUS_Y = 'Y';

    /** Failed authentication / account not verified / transaction denied. */
    const PARES_STATUS_N = 'N';

    /** Unable to complete authentication. */
    const PARES_STATUS_U = 'U';

    /** Successful attempts transaction. */
    const PARES_STATUS_A = 'A';

    /** Challenge required for authentication. */
    const PARES_STATUS_C = 'C';

    /** Authentication rejected (merchant must not submit for authorization). */
    const PARES_STATUS_R = 'R';

    /** Challenge required; decoupled authentication confirmed. */
    const PARES_STATUS_D = 'D';

    /** Informational only; 3DS requestor challenge preference acknowledged. */
    const PARES_STATUS_I = 'I';

    /** Indicates fixed password. */
    const AUTHENTICATION_TYPE_STATIC = 'STATIC';

    /** Indicates one-time password. Could be single-step or multi-step. */
    const AUTHENTICATION_TYPE_DYNAMIC = 'DYNAMIC';

    /** Indicates biometric over the phone. */
    const AUTHENTICATION_TYPE_OUT_OF_BAND = 'OUT_OF_BAND';

    /** Indicates decoupled authentication. */
    const AUTHENTICATION_TYPE_DECOUPLED = 'DECOUPLED';

    /** Indicates that the signature of the PARes has been validated successfully and the message contents can be trusted. */
    const SIGNATURE_VERIFICATION_STATUS_YES = 'YES';

    /** Indicates that the PARes could not be validated. */
    const SIGNATURE_VERIFICATION_STATUS_NO = 'NO';

    /** Refers to the Visa CAVV generation specification that includes a unique identifier built into the value. */
    const CAVV_ALGORITHM_CVV_WITH_ATN = 'CVV_WITH_ATN';

    /** Refers to Secure Payment Algorithm used to generate Mastercard's Accountholder Authentication Value (AAV). */
    const CAVV_ALGORITHM_MASTERCARD_SPA_ALGORITHM = 'MASTERCARD_SPA_ALGORITHM';

    /**
     * @var string
     * Electronic Commerce Indicator (ECI). The ECI value is part of the 2 data elements that indicate the
     * transaction was processed electronically. This should be passed on the authorization transaction to the
     * Gateway/Processor.
     *
     * use one of constants defined in this class to set the value:
     * @see ECI_FLAG_MASTERCARD_NON_3D_SECURE_TRANSACTION
     * @see ECI_FLAG_MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION
     * @see ECI_FLAG_MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION
     * @see ECI_FLAG_FULLY_AUTHENTICATED_TRANSACTION
     * @see ECI_FLAG_ATTEMPTED_AUTHENTICATION_TRANSACTION
     * @see ECI_FLAG_NON_3D_SECURE_TRANSACTION
     */
    public $eci_flag;

    /**
     * @var string
     * Universal Cardholder Authentication Field (UCAF) Indicator value provided by the issuer.
     *
     * use one of constants defined in this class to set the value:
     * @see UCAF_INDICATOR_NON_SECURECODE_TRANSACTION
     * @see UCAF_INDICATOR_MERCHANT_ONLY_SECURECODE_TRANSACTION
     * @see UCAF_INDICATOR_FULLY_AUTHENTICATED_SECURECODE
     */
    public $ucaf_indicator;

    /**
     * @var string
     * Card brand that the transaction was processed for authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see CARD_BRAND_AMERICAN_EXPRESS
     * @see CARD_BRAND_DISCOVER
     * @see CARD_BRAND_JCB
     * @see CARD_BRAND_MAESTRO
     * @see CARD_BRAND_MASTERCARD
     * @see CARD_BRAND_SOLO
     * @see CARD_BRAND_VISA
     * @see CARD_BRAND_ELECTRON
     * @see CARD_BRAND_ELO
     */
    public $card_brand;

    /**
     * @var string
     * This is the cardholder authentication value. The CAVV is unique to the cardholder and to the transaction that
     * was authenticated.
     */
    public $cavv;

    /**
     * @var string
     * Transaction identifier resulting from authentication processing.
     */
    public $xid;

    /**
     * @var string
     * Status of Authentication eligibility.
     *
     * use one of constants defined in this class to set the value:
     * @see ENROLLED_Y
     * @see ENROLLED_N
     * @see ENROLLED_U
     * @see ENROLLED_B
     */
    public $enrolled;

    /**
     * @var string
     * Transactions status result identifier. The outcome of the issuer's authentication.
     *
     * use one of constants defined in this class to set the value:
     * @see PARES_STATUS_Y
     * @see PARES_STATUS_N
     * @see PARES_STATUS_U
     * @see PARES_STATUS_A
     * @see PARES_STATUS_C
     * @see PARES_STATUS_R
     * @see PARES_STATUS_D
     * @see PARES_STATUS_I
     */
    public $pares_status;

    /**
     * @var string
     * The merchant name that was sent in the authentication request.
     */
    public $merchant_name;

    /**
     * @var string
     * The 3DS version that was used to process the transaction.
     */
    public $three_ds_version;

    /**
     * @var string
     * Unique transaction identifier assigned by the Directory Server (DS) to identify a single transaction.
     */
    public $directory_server_transaction_id;

    /**
     * @var string
     * Indicates the type of authentication that was used to challenge the card holder.
     *
     * use one of constants defined in this class to set the value:
     * @see AUTHENTICATION_TYPE_STATIC
     * @see AUTHENTICATION_TYPE_DYNAMIC
     * @see AUTHENTICATION_TYPE_OUT_OF_BAND
     * @see AUTHENTICATION_TYPE_DECOUPLED
     */
    public $authentication_type;

    /**
     * @var string
     * Unique transaction identifier assigned by the Access Control Server (ACS) to identify a single transaction.
     */
    public $access_control_server_transaction_id;

    /**
     * @var string
     * Transaction signature status identifier.
     *
     * use one of constants defined in this class to set the value:
     * @see SIGNATURE_VERIFICATION_STATUS_YES
     * @see SIGNATURE_VERIFICATION_STATUS_NO
     */
    public $signature_verification_status;

    /**
     * @var string
     * The PayPal acquiring MID to be used for authorization.
     */
    public $paypal_acquiring_mid;

    /**
     * @var string
     * The PayPal acquiring BIN to be used for authorization.
     */
    public $paypal_acquiring_bin;

    /**
     * @var string
     * Indicates the algorithm used to generate the CAVV/AAV value.
     *
     * use one of constants defined in this class to set the value:
     * @see CAVV_ALGORITHM_CVV_WITH_ATN
     * @see CAVV_ALGORITHM_MASTERCARD_SPA_ALGORITHM
     */
    public $cavv_algorithm;

    /**
     * @var string
     * Unique transaction identifier assigned by the 3DS Server to identify a single transaction.
     */
    public $three_ds_server_transaction_id;
}
