<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\MerchantV1\PaymentSource;
use Webmozart\Assert\Assert;

/**
 * A payment source that has additional authentication challenges.
 *
 * generated from: extended_payment_source.json
 */
class ExtendedPaymentSource extends PaymentSource implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of contingencies.
     *
     * @var string[] | null
     */
    public $contingencies;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->contingencies) || Assert::isArray(
            $this->contingencies,
            "contingencies in ExtendedPaymentSource must be array $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['contingencies'])) {
            $this->contingencies = [];
            foreach ($data['contingencies'] as $item) {
                $this->contingencies[] = $item;
            }
        }
    }

    public function __construct(array $data = null)
    {
        parent::__construct($data);
        if (isset($data)) { $this->map($data); }
    }
}
