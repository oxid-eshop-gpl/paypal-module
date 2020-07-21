<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant request to make an offer to resolve a dispute.
 */
class MakeOffer implements JsonSerializable
{
    use BaseModel;

    const OFFER_TYPE_REFUND = 'REFUND';
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /** @var string */
    public $note;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $offer_amount;

    /**
     * @var AddressPortable
     * The portable international postal address. Maps to
     * [AddressValidationMetadata](https://github.com/googlei18n/libaddressinput/wiki/AddressValidationMetadata) and
     * HTML 5.1 [Autofilling form controls: the autocomplete
     * attribute](https://www.w3.org/TR/html51/sec-forms.html#autofilling-form-controls-the-autocomplete-attribute).
     */
    public $return_shipping_address;

    /** @var string */
    public $invoice_id;

    /**
     * @var string
     * The merchant-proposed offer type for the dispute.
     */
    public $offer_type;
}
