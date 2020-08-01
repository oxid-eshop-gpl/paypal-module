<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Financial instruments attached to this account.
 *
 * generated from: referral_data-financial_instruments.json
 */
class FinancialInstruments implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of banks attached to this managed account.
     *
     * @var Bank[]
     * maxItems: 0
     * maxItems: 5
     */
    public $banks;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->banks, "banks in FinancialInstruments must not be NULL $within");
        Assert::minCount(
            $this->banks,
            0,
            "banks in FinancialInstruments must have min. count of 0 $within"
        );
        Assert::maxCount(
            $this->banks,
            5,
            "banks in FinancialInstruments must have max. count of 5 $within"
        );
        Assert::isArray(
            $this->banks,
            "banks in FinancialInstruments must be array $within"
        );
        if (isset($this->banks)) {
            foreach ($this->banks as $item) {
                $item->validate(FinancialInstruments::class);
            }
        }
    }

    private function map(array $data)
    {
        if (isset($data['banks'])) {
            $this->banks = [];
            foreach ($data['banks'] as $item) {
                $this->banks[] = new Bank($item);
            }
        }
    }

    public function __construct(array $data = null)
    {
        $this->banks = [];
        if (isset($data)) {
            $this->map($data);
        }
    }
}
