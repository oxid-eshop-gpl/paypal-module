<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The order request details.
 */
class OrderRequest implements JsonSerializable
{
    use BaseModel;

    /** The merchant intends to capture payment immediately after the customer makes a payment. */
    const INTENT_CAPTURE = 'CAPTURE';

    /** The merchant intends to authorize a payment and place funds on hold after the customer makes a payment. Authorized payments are guaranteed for up to three days but are available to capture for up to 29 days. After the three-day honor period, the original authorized payment expires and you must re-authorize the payment. You must make a separate request to capture payments on demand. This intent is not supported when you have more than one `purchase_unit` within your order. */
    const INTENT_AUTHORIZE = 'AUTHORIZE';

    /** The API caller saves the order for future payment processing by making an explicit <code>v2/checkout/orders/id/save</code> call after the payer approves the order. */
    const PROCESSING_INSTRUCTION_ORDER_SAVED_EXPLICITLY = 'ORDER_SAVED_EXPLICITLY';

    /** PayPal implicitly saves the order on behalf of the API caller after the payer approves the order. Note that this option is not currently supported. */
    const PROCESSING_INSTRUCTION_ORDER_SAVED_ON_BUYER_APPROVAL = 'ORDER_SAVED_ON_BUYER_APPROVAL';

    /** The API caller intends to authorize <code>v2/checkout/orders/id/authorize</code> or capture <code>v2/checkout/orders/id/capture</code> after the payer approves the order. */
    const PROCESSING_INSTRUCTION_NO_INSTRUCTION = 'NO_INSTRUCTION';

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
     * @var string
     * The instruction to process an order.
     *
     * use one of constants defined in this class to set the value:
     * @see PROCESSING_INSTRUCTION_ORDER_SAVED_EXPLICITLY
     * @see PROCESSING_INSTRUCTION_ORDER_SAVED_ON_BUYER_APPROVAL
     * @see PROCESSING_INSTRUCTION_NO_INSTRUCTION
     */
    public $processing_instruction;

    /**
     * @var Payer
     * The customer who approves and pays for the order. The customer is also known as the payer.
     */
    public $payer;

    /** @var array<PurchaseUnitRequest> */
    public $purchase_units;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $payment_source;

    /**
     * @var OrderApplicationContext
     * Customizes the payer experience during the approval process for the payment with
     * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
     * and <code>shipping_preference</code> during partner account setup, which overrides the request
     * values.</blockquote>
     */
    public $application_context;
}
