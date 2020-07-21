<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The payment source used to fund the payment
 */
class PaymentSourceResponse implements \JsonSerializable
{
	/** @var CardResponse */
	public $card;

	/** @var PaypalWalletResponse */
	public $paypal;

	/** @var WalletsResponse */
	public $wallet;

	/** @var BankResponse */
	public $bank;

	/** @var Alipay */
	public $alipay;

	/** @var Bancontact */
	public $bancontact;

	/** @var Blik */
	public $blik;

	/** @var Eps */
	public $eps;

	/** @var Giropay */
	public $giropay;

	/** @var Ideal */
	public $ideal;

	/** @var Multibanco */
	public $multibanco;

	/** @var Mybank */
	public $mybank;

	/** @var Payu */
	public $payu;

	/** @var PTwoFour */
	public $p24;

	/** @var Poli */
	public $poli;

	/** @var Sofort */
	public $sofort;

	/** @var Trustly */
	public $trustly;

	/** @var Trustpay */
	public $trustpay;

	/** @var Verkkopankki */
	public $verkkopankki;

	/** @var Wechatpay */
	public $wechatpay;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
