<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Additional 3D Secure authentication data.
 */
class ThreedsResult extends AuthenticationResultType implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Electronic Commerce Indicator (ECI). The ECI value is part of the 2 data elements that indicate the
     * transaction was processed electronically. This should be passed on the authorization transaction to the
     * Gateway/Processor.
     */
    public $eci_flag;

    /**
     * @var string
     * Universal Cardholder Authentication Field (UCAF) Indicator value provided by the issuer.
     */
    public $ucaf_indicator;

    /**
     * @var string
     * Card brand that the transaction was processed for authentication.
     */
    public $card_brand;

    /** @var string */
    public $cavv;

    /** @var string */
    public $xid;

    /**
     * @var string
     * Status of Authentication eligibility.
     */
    public $enrolled;

    /**
     * @var string
     * Transactions status result identifier. The outcome of the issuer's authentication.
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
     */
    public $authentication_type;

    /** @var string */
    public $access_control_server_transaction_id;

    /**
     * @var string
     * Transaction signature status identifier.
     */
    public $signature_verification_status;

    /** @var string */
    public $paypal_acquiring_mid;

    /** @var string */
    public $paypal_acquiring_bin;

    /**
     * @var string
     * Indicates the algorithm used to generate the CAVV/AAV value.
     */
    public $cavv_algorithm;

    /** @var string */
    public $three_ds_server_transaction_id;
}
