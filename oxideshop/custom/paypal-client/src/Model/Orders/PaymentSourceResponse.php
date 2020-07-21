<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment source used to fund the payment
 */
class PaymentSourceResponse
{
	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\CardResponse */
	public $card;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PaypalWalletResponse */
	public $paypal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\WalletsResponse */
	public $wallet;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\BankResponse */
	public $bank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Alipay */
	public $alipay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Bancontact */
	public $bancontact;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Blik */
	public $blik;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Eps */
	public $eps;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Giropay */
	public $giropay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Ideal */
	public $ideal;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Multibanco */
	public $multibanco;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Mybank */
	public $mybank;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Payu */
	public $payu;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\P24 */
	public $p24;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Poli */
	public $poli;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Sofort */
	public $sofort;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Trustly */
	public $trustly;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Trustpay */
	public $trustpay;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Verkkopankki */
	public $verkkopankki;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\Wechatpay */
	public $wechatpay;
}
