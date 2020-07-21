<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Customizes the payer experience during the approval process for the payment with
 * PayPal.<blockquote><strong>Note:</strong> Partners and Marketplaces might configure <code>brand_name</code>
 * and <code>shipping_preference</code> during partner account setup, which overrides the request
 * values.</blockquote>
 */
class OrderApplicationContext implements JsonSerializable
{
    use BaseModel;

    /** @var string */
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

    /** @var string */
    public $landing_page;

    /** @var string */
    public $shipping_preference;

    /** @var string */
    public $user_action;

    /**
     * @var PaymentMethod
     * The customer and merchant payment preferences.
     */
    public $payment_method;

    /** @var string */
    public $return_url;

    /** @var string */
    public $cancel_url;

    /** @var string */
    public $payment_token;

    /**
     * @var ClientConfiguration
     * Client configuration that captures the product flows and specific experiences that a user completes a paypal
     * transaction.
     */
    public $client_configuration;

    /** @var boolean */
    public $vault;

    /**
     * @var PaymentSource
     * The payment source definition.
     */
    public $preferred_payment_source;
}
