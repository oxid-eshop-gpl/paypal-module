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
class Extensions implements JsonSerializable
{
    use BaseModel;

    /**
     * The transaction hold information.
     *
     * @var ExtensionsTransactionHoldInfo | null
     */
    public $transaction_hold_info;

    /**
     * The transaction risk information.
     *
     * @var ExtensionsTransactionRiskInfo | null
     */
    public $transaction_risk_info;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->transaction_hold_info) || Assert::isInstanceOf(
            $this->transaction_hold_info,
            ExtensionsTransactionHoldInfo::class,
            "transaction_hold_info in Extensions must be instance of ExtensionsTransactionHoldInfo $within"
        );
        !isset($this->transaction_hold_info) ||  $this->transaction_hold_info->validate(Extensions::class);
        !isset($this->transaction_risk_info) || Assert::isInstanceOf(
            $this->transaction_risk_info,
            ExtensionsTransactionRiskInfo::class,
            "transaction_risk_info in Extensions must be instance of ExtensionsTransactionRiskInfo $within"
        );
        !isset($this->transaction_risk_info) ||  $this->transaction_risk_info->validate(Extensions::class);
    }

    private function map(array $data)
    {
        if (isset($data['transaction_hold_info'])) {
            $this->transaction_hold_info = new ExtensionsTransactionHoldInfo($data['transaction_hold_info']);
        }
        if (isset($data['transaction_risk_info'])) {
            $this->transaction_risk_info = new ExtensionsTransactionRiskInfo($data['transaction_risk_info']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
