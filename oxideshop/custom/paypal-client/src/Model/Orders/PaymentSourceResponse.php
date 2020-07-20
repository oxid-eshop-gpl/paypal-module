<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment source used to fund the payment
 */
class PaymentSourceResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\CardResponse */
	public $card;

	/** @var OxidProfessionalServices\PayPal\Api\Model\PaypalWalletResponse */
	public $paypal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\WalletsResponse */
	public $wallet;

	/** @var OxidProfessionalServices\PayPal\Api\Model\BankResponse */
	public $bank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Alipay */
	public $alipay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Bancontact */
	public $bancontact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Blik */
	public $blik;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Eps */
	public $eps;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Giropay */
	public $giropay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Ideal */
	public $ideal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Multibanco */
	public $multibanco;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Mybank */
	public $mybank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Payu */
	public $payu;

	/** @var OxidProfessionalServices\PayPal\Api\Model\P24 */
	public $p24;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Poli */
	public $poli;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Sofort */
	public $sofort;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Trustly */
	public $trustly;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Trustpay */
	public $trustpay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Verkkopankki */
	public $verkkopankki;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Wechatpay */
	public $wechatpay;
}
