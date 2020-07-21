<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * The payment source definition.
 */
class PaymentSource implements \JsonSerializable
{
    /** @var Card */
    public $card;

    /** @var Token */
    public $token;

    /** @var Bank */
    public $bank;

    /** @var PaypalWallet */
    public $paypal;

    /** @var AlipayRequest */
    public $alipay;

    /** @var BancontactRequest */
    public $bancontact;

    /** @var BlikRequest */
    public $blik;

    /** @var EpsRequest */
    public $eps;

    /** @var GiropayRequest */
    public $giropay;

    /** @var IdealRequest */
    public $ideal;

    /** @var MultibancoRequest */
    public $multibanco;

    /** @var MybankRequest */
    public $mybank;

    /** @var PayuRequest */
    public $payu;

    /** @var PTwoFourRequest */
    public $p24;

    /** @var PoliRequest */
    public $poli;

    /** @var SofortRequest */
    public $sofort;

    /** @var TrustlyRequest */
    public $trustly;

    /** @var TrustpayRequest */
    public $trustpay;

    /** @var VerkkopankkiRequest */
    public $verkkopankki;

    /** @var WechatpayRequest */
    public $wechatpay;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
