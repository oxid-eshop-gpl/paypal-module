<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The merchant-proposed offer for a dispute.
 *
 * generated from: response-offer.json
 */
class Offer implements JsonSerializable
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
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $buyer_requested_amount;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $seller_offered_amount;

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

    /**
     * @var array<OfferHistory>
     * An array of history information for an offer.
     */
    public $history;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->buyer_requested_amount) || Assert::notNull($this->buyer_requested_amount->currency_code, "currency_code in buyer_requested_amount must not be NULL within Offer $within");
        !isset($this->buyer_requested_amount) || Assert::notNull($this->buyer_requested_amount->value, "value in buyer_requested_amount must not be NULL within Offer $within");
        !isset($this->buyer_requested_amount) || Assert::isInstanceOf($this->buyer_requested_amount, Money::class, "buyer_requested_amount in Offer must be instance of Money $within");
        !isset($this->buyer_requested_amount) || $this->buyer_requested_amount->validate(Offer::class);
        !isset($this->seller_offered_amount) || Assert::notNull($this->seller_offered_amount->currency_code, "currency_code in seller_offered_amount must not be NULL within Offer $within");
        !isset($this->seller_offered_amount) || Assert::notNull($this->seller_offered_amount->value, "value in seller_offered_amount must not be NULL within Offer $within");
        !isset($this->seller_offered_amount) || Assert::isInstanceOf($this->seller_offered_amount, Money::class, "seller_offered_amount in Offer must be instance of Money $within");
        !isset($this->seller_offered_amount) || $this->seller_offered_amount->validate(Offer::class);
        !isset($this->offer_type) || Assert::minLength($this->offer_type, 1, "offer_type in Offer must have minlength of 1 $within");
        !isset($this->offer_type) || Assert::maxLength($this->offer_type, 255, "offer_type in Offer must have maxlength of 255 $within");
        !isset($this->history) || Assert::isArray($this->history, "history in Offer must be array $within");

                                if (isset($this->history)){
                                    foreach ($this->history as $item) {
                                        $item->validate(Offer::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
