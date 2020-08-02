<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The extended properties for the dispute. Includes additional information for a dispute category, such as
 * billing disputes, the original transaction ID, correct amount, and so on.
 *
 * generated from: referred-extensions.json
 */
class Extensions2 implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction hold information.
     *
     * @var ExtensionsTwoTransactionHoldInfo | null
     */
    public $transaction_hold_info;

    /**
     * The transaction risk information.
     *
     * @var ExtensionsTwoTransactionRiskInfo | null
     */
    public $transaction_risk_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_hold_info) || Assert::isInstanceOf(
            $this->transaction_hold_info,
            ExtensionsTwoTransactionHoldInfo::class,
            "transaction_hold_info in Extensions2 must be instance of ExtensionsTwoTransactionHoldInfo $within"
        );
        !isset($this->transaction_hold_info) ||  $this->transaction_hold_info->validate(Extensions2::class);
        !isset($this->transaction_risk_info) || Assert::isInstanceOf(
            $this->transaction_risk_info,
            ExtensionsTwoTransactionRiskInfo::class,
            "transaction_risk_info in Extensions2 must be instance of ExtensionsTwoTransactionRiskInfo $within"
        );
        !isset($this->transaction_risk_info) ||  $this->transaction_risk_info->validate(Extensions2::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_hold_info'])) {
            $this->transaction_hold_info = new ExtensionsTwoTransactionHoldInfo($data['transaction_hold_info']);
        }
        if (isset($data['transaction_risk_info'])) {
            $this->transaction_risk_info = new ExtensionsTwoTransactionRiskInfo($data['transaction_risk_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
