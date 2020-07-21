<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The payment source definition.
 */
class PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * @var Card
     * The payment card to use to fund a payment. Can be a credit or debit card.
     */
    public $card;

    /**
     * @var Token
     * The tokenized payment source to fund a payment.
     */
    public $token;

    /**
     * @var Bank
     * The bank source used to fund the payment
     */
    public $bank;

    /**
     * @var PaypalWallet
     * A resource that identies that a paypal wallet is used for payment.
     */
    public $paypal;

    /**
     * @var AlipayRequest
     * Information needed to pay using Alipay
     */
    public $alipay;

    /**
     * @var BancontactRequest
     * Information needed to pay using Bancontact.
     */
    public $bancontact;

    /**
     * @var BlikRequest
     * Information needed to pay using BLIK.
     */
    public $blik;

    /**
     * @var EpsRequest
     * Information needed to pay using eps.
     */
    public $eps;

    /**
     * @var GiropayRequest
     * Information needed to pay using giropay.
     */
    public $giropay;

    /**
     * @var IdealRequest
     * Information needed to pay using iDEAL.
     */
    public $ideal;

    /**
     * @var MultibancoRequest
     * Information needed to pay using Multibanco.
     */
    public $multibanco;

    /**
     * @var MybankRequest
     * Information needed to pay using MyBank.
     */
    public $mybank;

    /**
     * @var PayuRequest
     * Information needed to pay using PayU.
     */
    public $payu;

    /**
     * @var PTwoFourRequest
     * Information needed to pay using P24 (Przelewy24).
     */
    public $p24;

    /**
     * @var PoliRequest
     * Information needed to pay using POLi.
     */
    public $poli;

    /**
     * @var SofortRequest
     * Information needed to pay using Sofort.
     */
    public $sofort;

    /**
     * @var TrustlyRequest
     * Information needed to pay using Trustly.
     */
    public $trustly;

    /**
     * @var TrustpayRequest
     * Information needed to pay using TrustPay.
     */
    public $trustpay;

    /**
     * @var VerkkopankkiRequest
     * Information needed to pay using Verkkopankki (Finnish Online Banking).
     */
    public $verkkopankki;

    /**
     * @var WechatpayRequest
     * Information needed to pay using WeChat Pay.
     */
    public $wechatpay;
}
