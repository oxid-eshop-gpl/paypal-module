<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 *
 * generated from: order_application_context.json
 */
class OrderApplicationContext implements JsonSerializable
{
    use BaseModel;

    /** When the customer clicks <strong>PayPal Checkout</strong>, the customer is redirected to a page to log in to PayPal and approve the payment. */
    const LANDING_PAGE_LOGIN = 'LOGIN';

    /** When the customer clicks <strong>PayPal Checkout</strong>, the customer is redirected to a page to enter credit or debit card and other relevant billing information required to complete the purchase. */
    const LANDING_PAGE_BILLING = 'BILLING';

    /** When the customer clicks <strong>PayPal Checkout</strong>, the customer is redirected to either a page to log in to PayPal and approve the payment or to a page to enter credit or debit card and other relevant billing information required to complete the purchase, depending on their previous interaction with PayPal. */
    const LANDING_PAGE_NO_PREFERENCE = 'NO_PREFERENCE';

    /** Use the customer-provided shipping address on the PayPal site. */
    const SHIPPING_PREFERENCE_GET_FROM_FILE = 'GET_FROM_FILE';

    /** Redact the shipping address from the PayPal site. Recommended for digital goods. */
    const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';

    /** Use the merchant-provided address. The customer cannot change this address on the PayPal site. */
    const SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS = 'SET_PROVIDED_ADDRESS';

    /** After you redirect the customer to the PayPal payment page, a <strong>Continue</strong> button appears. Use this option when the final amount is not known when the checkout flow is initiated and you want to redirect the customer to the merchant page without processing the payment. */
    const USER_ACTION_CONTINUE = 'CONTINUE';

    /** After you redirect the customer to the PayPal payment page, a <strong>Pay Now</strong> button appears. Use this option when the final amount is known when the checkout is initiated and you want to process the payment immediately when the customer clicks <strong>Pay Now</strong>. */
    const USER_ACTION_PAY_NOW = 'PAY_NOW';

    /**
     * @var string
     * The label that overrides the business name in the PayPal account on the PayPal site.
     */
    public $brand_name;

    /**
     * @var string
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     */
    public $locale;

    /**
     * @var string
     * The type of landing page to show on the PayPal site for customer checkout.
     *
     * use one of constants defined in this class to set the value:
     * @see LANDING_PAGE_LOGIN
     * @see LANDING_PAGE_BILLING
     * @see LANDING_PAGE_NO_PREFERENCE
     */
    public $landing_page;

    /**
     * @var string
     * The shipping preference:<ul><li>Displays the shipping address to the customer.</li><li>Enables the customer to
     * choose an address on the PayPal site.</li><li>Restricts the customer from changing the address during the
     * payment-approval process.</li></ul>
     *
     * use one of constants defined in this class to set the value:
     * @see SHIPPING_PREFERENCE_GET_FROM_FILE
     * @see SHIPPING_PREFERENCE_NO_SHIPPING
     * @see SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS
     */
    public $shipping_preference;

    /**
     * @var string
     * Configures a <strong>Continue</strong> or <strong>Pay Now</strong> checkout flow.
     *
     * use one of constants defined in this class to set the value:
     * @see USER_ACTION_CONTINUE
     * @see USER_ACTION_PAY_NOW
     */
    public $user_action;

    /**
     * @var PaymentMethod
     * The customer and merchant payment preferences.
     */
    public $payment_method;

    /**
     * @var string
     * The URL where the customer is redirected after the customer approves the payment.
     */
    public $return_url;

    /**
     * @var string
     * The URL where the customer is redirected after the customer cancels the payment.
     */
    public $cancel_url;

    /**
     * @var string
     * The internal client-generated token.
     */
    public $payment_token;

    /**
     * @var ClientConfiguration
     * Client configuration that captures the product flows and specific experiences that a user completes a paypal
     * transaction.
     */
    public $client_configuration;

    /**
     * @var boolean
     * Signals to vault the payment source upon successful validation.
     */
    public $vault;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $preferred_payment_source;
}