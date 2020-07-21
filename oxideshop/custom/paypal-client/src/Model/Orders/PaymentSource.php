<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment source definition.
 */
class PaymentSource
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Card */
	public $card;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Token */
	public $token;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Bank */
	public $bank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PaypalWallet */
	public $paypal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\AlipayRequest */
	public $alipay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\BancontactRequest */
	public $bancontact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\BlikRequest */
	public $blik;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\EpsRequest */
	public $eps;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\GiropayRequest */
	public $giropay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\IdealRequest */
	public $ideal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\MultibancoRequest */
	public $multibanco;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\MybankRequest */
	public $mybank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PayuRequest */
	public $payu;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\P24Request */
	public $p24;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PoliRequest */
	public $poli;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\SofortRequest */
	public $sofort;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\TrustlyRequest */
	public $trustly;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\TrustpayRequest */
	public $trustpay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\VerkkopankkiRequest */
	public $verkkopankki;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\WechatpayRequest */
	public $wechatpay;
}
