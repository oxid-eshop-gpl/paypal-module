<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\AddressPortable;
use Webmozart\Assert\Assert;

/**
 * A merchant or customer request to provide evidence for a dispute.
 *
 * generated from: request-evidences.json
 */
class Evidences implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of evidences for the dispute.
     *
     * @var Evidence[]
     * maxItems: 0
     */
    public $evidences;

    /**
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     *
     * @var AddressPortable | null
     */
    public $return_shipping_address;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->evidences, "evidences in Evidences must not be NULL $within");
        Assert::minCount(
            $this->evidences,
            0,
            "evidences in Evidences must have min. count of 0 $within"
        );
        Assert::isArray(
            $this->evidences,
            "evidences in Evidences must be array $within"
        );
        if (isset($this->evidences)) {
            foreach ($this->evidences as $item) {
                $item->validate(Evidences::class);
            }
        }
        !isset($this->return_shipping_address) || Assert::isInstanceOf(
            $this->return_shipping_address,
            AddressPortable::class,
            "return_shipping_address in Evidences must be instance of AddressPortable $within"
        );
        !isset($this->return_shipping_address) ||  $this->return_shipping_address->validate(Evidences::class);
    }

    private function map(array $data)
    {
        if (isset($data['evidences'])) {
            $this->evidences = [];
            foreach ($data['evidences'] as $item) {
                $this->evidences[] = new Evidence($item);
            }
        }
        if (isset($data['return_shipping_address'])) {
            $this->return_shipping_address = new AddressPortable($data['return_shipping_address']);
        }
    }

    public function __construct(array $data = null)
    {
        $this->evidences = [];
        if (isset($data)) { $this->map($data); }
    }
}
