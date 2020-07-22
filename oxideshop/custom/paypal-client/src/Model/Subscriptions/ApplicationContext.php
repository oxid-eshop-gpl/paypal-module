<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The application context, which customizes the payer experience during the subscription approval process with
 * PayPal.
 *
 * generated from: application_context.json
 */
class ApplicationContext implements JsonSerializable
{
    use BaseModel;

    /** Get the customer-provided shipping address on the PayPal site. */
    const SHIPPING_PREFERENCE_GET_FROM_FILE = 'GET_FROM_FILE';

    /** Redacts the shipping address from the PayPal site. Recommended for digital goods. */
    const SHIPPING_PREFERENCE_NO_SHIPPING = 'NO_SHIPPING';

    /** Get the merchant-provided address. The customer cannot change this address on the PayPal site. If merchant does not pass an address, customer can choose the address on PayPal pages. */
    const SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS = 'SET_PROVIDED_ADDRESS';

    /** After you redirect the customer to the PayPal subscription consent page, a <strong>Continue</strong> button appears. Use this option when you want to control the activation of the subscription and do not want PayPal to activate the subscription. */
    const USER_ACTION_CONTINUE = 'CONTINUE';

    /** After you redirect the customer to the PayPal subscription consent page, a <strong>Subscribe Now</strong> button appears. Use this option when you want PayPal to activate the subscription. */
    const USER_ACTION_SUBSCRIBE_NOW = 'SUBSCRIBE_NOW';

    /**
     * @var string
     * The label that overrides the business name in the PayPal account on the PayPal site.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $brand_name;

    /**
     * @var string
     * The [language tag](https://tools.ietf.org/html/bcp47#section-2) for the language in which to localize the
     * error-related strings, such as messages, issues, and suggested actions. The tag is made up of the [ISO 639-2
     * language code](https://www.loc.gov/standards/iso639-2/php/code_list.php), the optional [ISO-15924 script
     * tag](https://www.unicode.org/iso15924/codelists.html), and the [ISO-3166 alpha-2 country
     * code](/docs/integration/direct/rest/country-codes/).
     *
     * minLength: 2
     * maxLength: 10
     */
    public $locale;

    /**
     * @var string
     * The location from which the shipping address is derived.
     *
     * use one of constants defined in this class to set the value:
     * @see SHIPPING_PREFERENCE_GET_FROM_FILE
     * @see SHIPPING_PREFERENCE_NO_SHIPPING
     * @see SHIPPING_PREFERENCE_SET_PROVIDED_ADDRESS
     * minLength: 1
     * maxLength: 24
     */
    public $shipping_preference;

    /**
     * @var string
     * Configures the label name to `Continue` or `Subscribe Now` for subscription consent experience.
     *
     * use one of constants defined in this class to set the value:
     * @see USER_ACTION_CONTINUE
     * @see USER_ACTION_SUBSCRIBE_NOW
     * minLength: 1
     * maxLength: 24
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
     *
     * minLength: 10
     * maxLength: 4000
     */
    public $return_url;

    /**
     * @var string
     * The URL where the customer is redirected after the customer cancels the payment.
     *
     * minLength: 10
     * maxLength: 4000
     */
    public $cancel_url;
}
