<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The payment source used to fund the payment
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-payment_source_response.json
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->card) || Assert::isInstanceOf($this->card, CardResponse::class, "card in PaymentSourceResponse must be instance of CardResponse $within");
        !isset($this->card) || $this->card->validate(PaymentSourceResponse::class);
        !isset($this->paypal) || Assert::isInstanceOf($this->paypal, PaypalWalletResponse::class, "paypal in PaymentSourceResponse must be instance of PaypalWalletResponse $within");
        !isset($this->paypal) || $this->paypal->validate(PaymentSourceResponse::class);
        !isset($this->wallet) || Assert::isInstanceOf($this->wallet, WalletsResponse::class, "wallet in PaymentSourceResponse must be instance of WalletsResponse $within");
        !isset($this->wallet) || $this->wallet->validate(PaymentSourceResponse::class);
        !isset($this->bank) || Assert::isInstanceOf($this->bank, BankResponse::class, "bank in PaymentSourceResponse must be instance of BankResponse $within");
        !isset($this->bank) || $this->bank->validate(PaymentSourceResponse::class);
        !isset($this->alipay) || Assert::isInstanceOf($this->alipay, Alipay::class, "alipay in PaymentSourceResponse must be instance of Alipay $within");
        !isset($this->alipay) || $this->alipay->validate(PaymentSourceResponse::class);
        !isset($this->bancontact) || Assert::isInstanceOf($this->bancontact, Bancontact::class, "bancontact in PaymentSourceResponse must be instance of Bancontact $within");
        !isset($this->bancontact) || $this->bancontact->validate(PaymentSourceResponse::class);
        !isset($this->blik) || Assert::isInstanceOf($this->blik, Blik::class, "blik in PaymentSourceResponse must be instance of Blik $within");
        !isset($this->blik) || $this->blik->validate(PaymentSourceResponse::class);
        !isset($this->eps) || Assert::isInstanceOf($this->eps, Eps::class, "eps in PaymentSourceResponse must be instance of Eps $within");
        !isset($this->eps) || $this->eps->validate(PaymentSourceResponse::class);
        !isset($this->giropay) || Assert::isInstanceOf($this->giropay, Giropay::class, "giropay in PaymentSourceResponse must be instance of Giropay $within");
        !isset($this->giropay) || $this->giropay->validate(PaymentSourceResponse::class);
        !isset($this->ideal) || Assert::isInstanceOf($this->ideal, Ideal::class, "ideal in PaymentSourceResponse must be instance of Ideal $within");
        !isset($this->ideal) || $this->ideal->validate(PaymentSourceResponse::class);
        !isset($this->multibanco) || Assert::isInstanceOf($this->multibanco, Multibanco::class, "multibanco in PaymentSourceResponse must be instance of Multibanco $within");
        !isset($this->multibanco) || $this->multibanco->validate(PaymentSourceResponse::class);
        !isset($this->mybank) || Assert::isInstanceOf($this->mybank, Mybank::class, "mybank in PaymentSourceResponse must be instance of Mybank $within");
        !isset($this->mybank) || $this->mybank->validate(PaymentSourceResponse::class);
        !isset($this->payu) || Assert::isInstanceOf($this->payu, Payu::class, "payu in PaymentSourceResponse must be instance of Payu $within");
        !isset($this->payu) || $this->payu->validate(PaymentSourceResponse::class);
        !isset($this->p24) || Assert::isInstanceOf($this->p24, PTwoFour::class, "p24 in PaymentSourceResponse must be instance of PTwoFour $within");
        !isset($this->p24) || $this->p24->validate(PaymentSourceResponse::class);
        !isset($this->poli) || Assert::isInstanceOf($this->poli, Poli::class, "poli in PaymentSourceResponse must be instance of Poli $within");
        !isset($this->poli) || $this->poli->validate(PaymentSourceResponse::class);
        !isset($this->sofort) || Assert::isInstanceOf($this->sofort, Sofort::class, "sofort in PaymentSourceResponse must be instance of Sofort $within");
        !isset($this->sofort) || $this->sofort->validate(PaymentSourceResponse::class);
        !isset($this->trustly) || Assert::isInstanceOf($this->trustly, Trustly::class, "trustly in PaymentSourceResponse must be instance of Trustly $within");
        !isset($this->trustly) || $this->trustly->validate(PaymentSourceResponse::class);
        !isset($this->trustpay) || Assert::isInstanceOf($this->trustpay, Trustpay::class, "trustpay in PaymentSourceResponse must be instance of Trustpay $within");
        !isset($this->trustpay) || $this->trustpay->validate(PaymentSourceResponse::class);
        !isset($this->verkkopankki) || Assert::isInstanceOf($this->verkkopankki, Verkkopankki::class, "verkkopankki in PaymentSourceResponse must be instance of Verkkopankki $within");
        !isset($this->verkkopankki) || $this->verkkopankki->validate(PaymentSourceResponse::class);
        !isset($this->wechatpay) || Assert::isInstanceOf($this->wechatpay, Wechatpay::class, "wechatpay in PaymentSourceResponse must be instance of Wechatpay $within");
        !isset($this->wechatpay) || $this->wechatpay->validate(PaymentSourceResponse::class);
    }

    public function __construct()
    {
    }
}
