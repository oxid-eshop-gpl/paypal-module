<?php

namespace OxidProfessionalServices\PayPal\Api\Model\TransactionSearch;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The Balance information.
 *
 * generated from: balance_detail.json
 */
class BalanceDetail implements JsonSerializable
{
    use BaseModel;

    /**
     * Optional field representing if the currency is primary currency or not.
     *
     * @var boolean | null
     */
    public $primary;

    public $currency;

    public $total_balance;

    public $available_balance;

    public $withheld_balance;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
    }

    private function map(array $data)
    {
        if (isset($data['primary'])) {
            $this->primary = $data['primary'];
        }

        if (isset($data['currency'])) {
            $this->currency = $data['currency'];
        }

        if (isset($data['total_balance'])) {
            $stdClass = new \stdClass();
            $stdClass->currency_code = $data['total_balance']['currency_code'];
            $stdClass->value = $data['total_balance']['value'];
            $this->total_balance = $stdClass;
        }

        if (isset($data['available_balance'])) {
            $stdClass = new \stdClass();
            $stdClass->currency_code = $data['available_balance']['currency_code'];
            $stdClass->value = $data['available_balance']['value'];
            $this->available_balance = $stdClass;
        }

        if (isset($data['withheld_balance'])) {
            $stdClass = new \stdClass();
            $stdClass->currency_code = $data['withheld_balance']['currency_code'];
            $stdClass->value = $data['withheld_balance']['value'];
            $this->withheld_balance = $stdClass;
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
