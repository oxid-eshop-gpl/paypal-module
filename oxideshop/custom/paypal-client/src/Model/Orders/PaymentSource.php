<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment source definition.
 */
class PaymentSource
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Card */
	public $card;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Token */
	public $token;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Bank */
	public $bank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PaypalWallet */
	public $paypal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\AlipayRequest */
	public $alipay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\BancontactRequest */
	public $bancontact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\BlikRequest */
	public $blik;

	/** @var OxidProfessionalServices\PayPal\Api\Model\EpsRequest */
	public $eps;

	/** @var OxidProfessionalServices\PayPal\Api\Model\GiropayRequest */
	public $giropay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\IdealRequest */
	public $ideal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\MultibancoRequest */
	public $multibanco;

	/** @var OxidProfessionalServices\PayPal\Api\Model\MybankRequest */
	public $mybank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PayuRequest */
	public $payu;

	/** @var OxidProfessionalServices\PayPal\Api\Model\P24Request */
	public $p24;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PoliRequest */
	public $poli;

	/** @var OxidProfessionalServices\PayPal\Api\Model\SofortRequest */
	public $sofort;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TrustlyRequest */
	public $trustly;

	/** @var OxidProfessionalServices\PayPal\Api\Model\TrustpayRequest */
	public $trustpay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\VerkkopankkiRequest */
	public $verkkopankki;

	/** @var OxidProfessionalServices\PayPal\Api\Model\WechatpayRequest */
	public $wechatpay;
}
