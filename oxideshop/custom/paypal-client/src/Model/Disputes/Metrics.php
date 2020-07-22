<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The computed metrics for disputes.
 *
 * generated from: response-metrics.json
 */
class Metrics implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<Metric>
     * An array of dimension and measurement metrics for disputes.
     *
     * maxItems: 0
     */
    public $metrics;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->metrics, "metrics in Metrics must not be NULL $within");
         Assert::minCount($this->metrics, 0, "metrics in Metrics must have min. count of 0 $within");
         Assert::isArray($this->metrics, "metrics in Metrics must be array $within");

                                if (isset($this->metrics)){
                                    foreach ($this->metrics as $item) {
                                        $item->validate(Metrics::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
