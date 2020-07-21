<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional 3D Secure authentication data.
 */
class ThreedsResult extends AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    const ECI_FLAG_MASTERCARD_NON_3D_SECURE_TRANSACTION = 'MASTERCARD_NON_3D_SECURE_TRANSACTION';
    const ECI_FLAG_MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'MASTERCARD_ATTEMPTED_AUTHENTICATION_TRANSACTION';
    const ECI_FLAG_MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION = 'MASTERCARD_FULLY_AUTHENTICATED_TRANSACTION';
    const ECI_FLAG_FULLY_AUTHENTICATED_TRANSACTION = 'FULLY_AUTHENTICATED_TRANSACTION';
    const ECI_FLAG_ATTEMPTED_AUTHENTICATION_TRANSACTION = 'ATTEMPTED_AUTHENTICATION_TRANSACTION';
    const ECI_FLAG_NON_3D_SECURE_TRANSACTION = 'NON_3D_SECURE_TRANSACTION';
    const UCAF_INDICATOR_NON_SECURECODE_TRANSACTION = 'NON_SECURECODE_TRANSACTION';
    const UCAF_INDICATOR_MERCHANT_ONLY_SECURECODE_TRANSACTION = 'MERCHANT_ONLY_SECURECODE_TRANSACTION';
    const UCAF_INDICATOR_FULLY_AUTHENTICATED_SECURECODE = 'FULLY_AUTHENTICATED_SECURECODE';
    const CARD_BRAND_AMERICAN_EXPRESS = 'AMERICAN_EXPRESS';
    const CARD_BRAND_DISCOVER = 'DISCOVER';
    const CARD_BRAND_JCB = 'JCB';
    const CARD_BRAND_MAESTRO = 'MAESTRO';
    const CARD_BRAND_MASTERCARD = 'MASTERCARD';
    const CARD_BRAND_SOLO = 'SOLO';
    const CARD_BRAND_VISA = 'VISA';
    const CARD_BRAND_ELECTRON = 'ELECTRON';
    const CARD_BRAND_ELO = 'ELO';
    const ENROLLED_Y = 'Y';
    const ENROLLED_N = 'N';
    const ENROLLED_U = 'U';
    const ENROLLED_B = 'B';
    const PARES_STATUS_Y = 'Y';
    const PARES_STATUS_N = 'N';
    const PARES_STATUS_U = 'U';
    const PARES_STATUS_A = 'A';
    const PARES_STATUS_C = 'C';
    const PARES_STATUS_R = 'R';
    const PARES_STATUS_D = 'D';
    const PARES_STATUS_I = 'I';
    const AUTHENTICATION_TYPE_STATIC = 'STATIC';
    const AUTHENTICATION_TYPE_DYNAMIC = 'DYNAMIC';
    const AUTHENTICATION_TYPE_OUT_OF_BAND = 'OUT_OF_BAND';
    const AUTHENTICATION_TYPE_DECOUPLED = 'DECOUPLED';
    const SIGNATURE_VERIFICATION_STATUS_YES = 'YES';
    const SIGNATURE_VERIFICATION_STATUS_NO = 'NO';
    const CAVV_ALGORITHM_CVV_WITH_ATN = 'CVV_WITH_ATN';
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

    /** @var string */
    public $cavv;

    /** @var string */
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

    /** @var string */
    public $merchant_name;

    /** @var string */
    public $three_ds_version;

    /** @var string */
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

    /** @var string */
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

    /** @var string */
    public $paypal_acquiring_mid;

    /** @var string */
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

    /** @var string */
    public $three_ds_server_transaction_id;
}
