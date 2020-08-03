<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The customer and merchant payment preferences.
 *
 * generated from: merchant.CommonComponentsSpecification-v1-schema-payment_method.json
 */
class PaymentMethod implements JsonSerializable
{
    use BaseModel;

    /** PayPal Credit. */
    public const PAYER_SELECTED_PAYPAL_CREDIT = 'PAYPAL_CREDIT';

    /** PayPal. */
    public const PAYER_SELECTED_PAYPAL = 'PAYPAL';

    /** Accepts any type of payment from the customer. */
    public const PAYEE_PREFERRED_UNRESTRICTED = 'UNRESTRICTED';

    /** Accepts only immediate payment from the customer. For example, credit card, PayPal balance, or instant ACH. Ensures that at the time of capture, the payment does not have the `pending` status. */
    public const PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED = 'IMMEDIATE_PAYMENT_REQUIRED';

    /** If the payments is an e-commerce payment initiated by the customer. Customer typically enters payment information (e.g. card number, approves payment within the PayPal Checkout flow) and such information that has not been previously stored on file. */
    public const CATEGORY_CUSTOMER_PRESENT_SINGLE_PURCHASE = 'CUSTOMER_PRESENT_SINGLE_PURCHASE';

    /** Subsequent recurring payments (e.g. subscriptions with a fixed amount on a predefined schedule when customer is not present. */
    public const CATEGORY_CUSTOMER_NOT_PRESENT_RECURRING = 'CUSTOMER_NOT_PRESENT_RECURRING';

    /** The first payment initiated by the customer which is expected to be followed by a series of subsequent recurring payments transactions (e.g. subscriptions with a fixed amount on a predefined schedule when customer is not present. This is typically used for scenarios where customer stores credentials and makes a purchase on a given date and also set’s up a subscription. */
    public const CATEGORY_CUSTOMER_PRESENT_RECURRING_FIRST = 'CUSTOMER_PRESENT_RECURRING_FIRST';

    /** Also known as (card-on-file) transactions. Payment details are stored to enable checkout with one-click, or simply to streamline the checkout process. For card transaction customers typically do not enter a CVC number as part of the Checkout process. */
    public const CATEGORY_CUSTOMER_PRESENT_UNSCHEDULED = 'CUSTOMER_PRESENT_UNSCHEDULED';

    /** Unscheduled payments that are not recurring on a predefined schedule (e.g. balance top-up). */
    public const CATEGORY_CUSTOMER_NOT_PRESENT_UNSCHEDULED = 'CUSTOMER_NOT_PRESENT_UNSCHEDULED';

    /** Payments that are initiated by the customer via the merchant by mail or telephone. */
    public const CATEGORY_MAIL_ORDER_TELEPHONE_ORDER = 'MAIL_ORDER_TELEPHONE_ORDER';

    /**
     * The customer-selected payment method on the merchant site.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYER_SELECTED_PAYPAL_CREDIT
     * @see PAYER_SELECTED_PAYPAL
     * @var string | null
     * minLength: 1
     */
    public $payer_selected = 'PAYPAL';

    /**
     * The merchant-preferred payment sources.
     *
     * use one of constants defined in this class to set the value:
     * @see PAYEE_PREFERRED_UNRESTRICTED
     * @see PAYEE_PREFERRED_IMMEDIATE_PAYMENT_REQUIRED
     * @var string | null
     * minLength: 1
     */
    public $payee_preferred = 'UNRESTRICTED';

    /**
     * Provides context (e.g. frequency of payment (Single, Recurring) along with whether (Customer is Present, Not
     * Present) for the payment being processed. For Card and PayPal Vaulted/Billing Agreement transactions, this
     * helps specify the appropriate indicators to the networks (e.g. Mastercard, Visa) which ensures compliance as
     * well as ensure a better auth-rate. For bank processing, indicates to clearing house whether the transaction is
     * recurring or not depending on the option chosen.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_CUSTOMER_PRESENT_SINGLE_PURCHASE
     * @see CATEGORY_CUSTOMER_NOT_PRESENT_RECURRING
     * @see CATEGORY_CUSTOMER_PRESENT_RECURRING_FIRST
     * @see CATEGORY_CUSTOMER_PRESENT_UNSCHEDULED
     * @see CATEGORY_CUSTOMER_NOT_PRESENT_UNSCHEDULED
     * @see CATEGORY_MAIL_ORDER_TELEPHONE_ORDER
     * @var string | null
     * minLength: 3
     * maxLength: 255
     */
    public $category = 'CUSTOMER_PRESENT_SINGLE_PURCHASE';

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->payer_selected) || Assert::minLength(
            $this->payer_selected,
            1,
            "payer_selected in PaymentMethod must have minlength of 1 $within"
        );
        !isset($this->payee_preferred) || Assert::minLength(
            $this->payee_preferred,
            1,
            "payee_preferred in PaymentMethod must have minlength of 1 $within"
        );
        !isset($this->category) || Assert::minLength(
            $this->category,
            3,
            "category in PaymentMethod must have minlength of 3 $within"
        );
        !isset($this->category) || Assert::maxLength(
            $this->category,
            255,
            "category in PaymentMethod must have maxlength of 255 $within"
        );
    }

    private function map(array $data)
    {
        if (isset($data['payer_selected'])) {
            $this->payer_selected = $data['payer_selected'];
        }
        if (isset($data['payee_preferred'])) {
            $this->payee_preferred = $data['payee_preferred'];
        }
        if (isset($data['category'])) {
            $this->category = $data['category'];
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) {
            $this->map($data);
        }
    }
}
