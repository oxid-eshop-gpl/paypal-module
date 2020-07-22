<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Payment context data required for processing payments for an order.
 *
 * generated from: model-payment_context_data.json
 */
class PaymentContextData implements JsonSerializable
{
    use BaseModel;

    /** The merchant intends to capture payment immediately after the customer makes a payment. */
    const INTENT_CAPTURE = 'CAPTURE';

    /** The merchant intends to authorize a payment and place funds on hold after the customer makes a payment. Authorized payments are guaranteed for up to three days but are available to capture for up to 29 days. After the three-day honor period, the original authorized payment expires and you must re-authorize the payment. You must make a separate request to capture payments on demand. This intent is not supported when you have more than one `purchase_unit` within your order. */
    const INTENT_AUTHORIZE = 'AUTHORIZE';

    /**
     * @var string
     * The intent to either capture payment immediately or authorize a payment for an order after order creation.
     *
     * use one of constants defined in this class to set the value:
     * @see INTENT_CAPTURE
     * @see INTENT_AUTHORIZE
     */
    public $intent;

    /**
     * @var OrderApplicationContext
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     */
    public $application_context;

    /**
     * @var array<Facilitator>
     * List of facilitators involved in the payment[s].
     *
     * maxItems: 1
     * maxItems: 10
     */
    public $facilitators;

    /**
     * @var array<PaymentUnit>
     * List of payment contract data.
     *
     * maxItems: 1
     * maxItems: 100
     */
    public $payment_units;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->application_context) || Assert::isInstanceOf($this->application_context, OrderApplicationContext::class, "application_context in PaymentContextData must be instance of OrderApplicationContext $within");
        !isset($this->application_context) || $this->application_context->validate(PaymentContextData::class);
        Assert::notNull($this->facilitators, "facilitators in PaymentContextData must not be NULL $within");
         Assert::minCount($this->facilitators, 1, "facilitators in PaymentContextData must have min. count of 1 $within");
         Assert::maxCount($this->facilitators, 10, "facilitators in PaymentContextData must have max. count of 10 $within");
         Assert::isArray($this->facilitators, "facilitators in PaymentContextData must be array $within");

                                if (isset($this->facilitators)){
                                    foreach ($this->facilitators as $item) {
                                        $item->validate(PaymentContextData::class);
                                    }
                                }

        Assert::notNull($this->payment_units, "payment_units in PaymentContextData must not be NULL $within");
         Assert::minCount($this->payment_units, 1, "payment_units in PaymentContextData must have min. count of 1 $within");
         Assert::maxCount($this->payment_units, 100, "payment_units in PaymentContextData must have max. count of 100 $within");
         Assert::isArray($this->payment_units, "payment_units in PaymentContextData must be array $within");

                                if (isset($this->payment_units)){
                                    foreach ($this->payment_units as $item) {
                                        $item->validate(PaymentContextData::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
