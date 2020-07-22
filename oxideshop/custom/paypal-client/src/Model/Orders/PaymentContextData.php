<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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

    /** @var array<Facilitator> */
    public $facilitators;

    /** @var array<PaymentUnit> */
    public $payment_units;
}
