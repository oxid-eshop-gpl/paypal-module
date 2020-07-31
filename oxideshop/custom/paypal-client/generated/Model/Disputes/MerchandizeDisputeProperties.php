<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use OxidProfessionalServices\PayPal\Api\Model\CommonV3\AddressPortable;
use Webmozart\Assert\Assert;

/**
 * The customer-provided merchandise issue details for the dispute.
 *
 * generated from: response-merchandize_dispute_properties.json
 */
class MerchandizeDisputeProperties implements JsonSerializable
{
    use BaseModel;

    /** The product has an issue. */
    public const ISSUE_TYPE_PRODUCT = 'PRODUCT';

    /** The service has an issue. */
    public const ISSUE_TYPE_SERVICE = 'SERVICE';

    /**
     * The issue type.
     *
     * use one of constants defined in this class to set the value:
     * @see ISSUE_TYPE_PRODUCT
     * @see ISSUE_TYPE_SERVICE
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $issue_type;

    /**
     * The product information.
     *
     * @var ProductDetails | null
     */
    public $product_details;

    /**
     * The service details.
     *
     * @var ServiceDetails | null
     */
    public $service_details;

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
        !isset($this->issue_type) || Assert::minLength(
            $this->issue_type,
            1,
            "issue_type in MerchandizeDisputeProperties must have minlength of 1 $within"
        );
        !isset($this->issue_type) || Assert::maxLength(
            $this->issue_type,
            255,
            "issue_type in MerchandizeDisputeProperties must have maxlength of 255 $within"
        );
        !isset($this->product_details) || Assert::isInstanceOf(
            $this->product_details,
            ProductDetails::class,
            "product_details in MerchandizeDisputeProperties must be instance of ProductDetails $within"
        );
        !isset($this->product_details) ||  $this->product_details->validate(MerchandizeDisputeProperties::class);
        !isset($this->service_details) || Assert::isInstanceOf(
            $this->service_details,
            ServiceDetails::class,
            "service_details in MerchandizeDisputeProperties must be instance of ServiceDetails $within"
        );
        !isset($this->service_details) ||  $this->service_details->validate(MerchandizeDisputeProperties::class);
        !isset($this->return_shipping_address) || Assert::isInstanceOf(
            $this->return_shipping_address,
            AddressPortable::class,
            "return_shipping_address in MerchandizeDisputeProperties must be instance of AddressPortable $within"
        );
        !isset($this->return_shipping_address) ||  $this->return_shipping_address->validate(MerchandizeDisputeProperties::class);
    }

    private function map(array $data)
    {
        if (isset($data['issue_type'])) {
            $this->issue_type = $data['issue_type'];
        }
        if (isset($data['product_details'])) {
            $this->product_details = new ProductDetails($data['product_details']);
        }
        if (isset($data['service_details'])) {
            $this->service_details = new ServiceDetails($data['service_details']);
        }
        if (isset($data['return_shipping_address'])) {
            $this->return_shipping_address = new AddressPortable($data['return_shipping_address']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
