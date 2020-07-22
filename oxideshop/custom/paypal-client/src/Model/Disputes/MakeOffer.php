<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A merchant request to make an offer to resolve a dispute.
 *
 * generated from: request-make_offer.json
 */
class MakeOffer implements JsonSerializable
{
    use BaseModel;

    /** The merchant must refund the customer without any item replacement or return. This offer type is valid in the chargeback phase and occurs when a merchant is willing to refund the dispute amount without any further action from customer. Omit the <code>refund_amount</code> and <code>return_shipping_address</code> parameters from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const OFFER_TYPE_REFUND = 'REFUND';

    /** The customer must return the item to the merchant and then merchant will refund the money. This offer type is valid in the chargeback phase and occurs when a merchant is willing to refund the dispute amount and requires the customer to return the item. Include the <code>return_shipping_address</code> parameter in but omit the <code>refund_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_accept-claim">accept claim</a> call. */
    const OFFER_TYPE_REFUND_WITH_RETURN = 'REFUND_WITH_RETURN';

    /** The merchant must do a refund and then send a replacement item to the customer. This offer type is valid in the inquiry phase when a merchant is willing to refund a specific amount and send the replacement item. Include the <code>offer_amount</code> parameter in the <a href="/docs/api/customer-disputes/v1/#disputes-actions_make-offer">make offer to resolve dispute</a> call. */
    const OFFER_TYPE_REFUND_WITH_REPLACEMENT = 'REFUND_WITH_REPLACEMENT';

    /** The merchant must send a replacement item to the customer with no additional refunds. This offer type is valid in the inquiry phase when a merchant is willing to replace the item without any refund. Omit the <code>offer_amount</code> parameter from the <a href="/docs/api/customer-disputes/v1/#disputes-actions_make-offer">make offer to resolve dispute</a> call. */
    const OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND = 'REPLACEMENT_WITHOUT_REFUND';

    /**
     * @var string
     * The merchant's notes about the offer. PayPal can, but the customer cannot, view these notes.
     *
     * minLength: 1
     * maxLength: 2000
     */
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

    /**
     * @var string
     * The merchant-provided ID of the invoice for the refund. This optional value maps the refund to an invoice ID
     * in the merchant's system.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $invoice_id;

    /**
     * @var string
     * The merchant-proposed offer type for the dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see OFFER_TYPE_REFUND
     * @see OFFER_TYPE_REFUND_WITH_RETURN
     * @see OFFER_TYPE_REFUND_WITH_REPLACEMENT
     * @see OFFER_TYPE_REPLACEMENT_WITHOUT_REFUND
     * minLength: 1
     * maxLength: 255
     */
    public $offer_type;

    public function validate()
    {
        assert(!isset($this->note) || strlen($this->note) >= 1);
        assert(!isset($this->note) || strlen($this->note) <= 2000);
        assert(isset($this->offer_amount));
        assert(isset($this->return_shipping_address));
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) >= 1);
        assert(!isset($this->invoice_id) || strlen($this->invoice_id) <= 127);
        assert(!isset($this->offer_type) || strlen($this->offer_type) >= 1);
        assert(!isset($this->offer_type) || strlen($this->offer_type) <= 255);
    }
}
