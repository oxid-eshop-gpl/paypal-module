<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment source used to fund the payment
 */
class PaymentSourceResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * @var CardResponse
     * The payment card to use to fund a payment. Card can be a credit or debit card.
     */
    public $card;

    /**
     * @var PaypalWalletResponse
     * The Paypal Wallet response.
     */
    public $paypal;

    /**
     * @var WalletsResponse
     * The customer's wallet used to fund the transaction.
     */
    public $wallet;

    /**
     * @var BankResponse
     * The bank source used to fund the payment
     */
    public $bank;

    /**
     * @var Alipay
     * Information used to pay using Alipay.
     */
    public $alipay;

    /**
     * @var Bancontact
     * Information used to pay Bancontact.
     */
    public $bancontact;

    /**
     * @var Blik
     * Information used to pay using BLIK
     */
    public $blik;

    /**
     * @var Eps
     * Information used to pay using eps.
     */
    public $eps;

    /**
     * @var Giropay
     * Information needed to pay using giropay.
     */
    public $giropay;

    /**
     * @var Ideal
     * Information used to pay using iDEAL.
     */
    public $ideal;

    /**
     * @var Multibanco
     * Information used to pay using Multibanco.
     */
    public $multibanco;

    /**
     * @var Mybank
     * Information used to pay using MyBank.
     */
    public $mybank;

    /**
     * @var Payu
     * Information needed to pay using PayU.
     */
    public $payu;

    /**
     * @var PTwoFour
     * Information used to pay using P24(Przelewy24)
     */
    public $p24;

    /**
     * @var Poli
     * Information used to pay using POLi.
     */
    public $poli;

    /**
     * @var Sofort
     * Information used to pay using Sofort.
     */
    public $sofort;

    /**
     * @var Trustly
     * Information needed to pay using Trustly.
     */
    public $trustly;

    /**
     * @var Trustpay
     * Information used to pay using TrustPay.
     */
    public $trustpay;

    /**
     * @var Verkkopankki
     * Information used to pay using Verkkopankki (Finnish Online Banking).
     */
    public $verkkopankki;

    /**
     * @var Wechatpay
     * Information needed to pay using WeChat Pay.
     */
    public $wechatpay;
}
