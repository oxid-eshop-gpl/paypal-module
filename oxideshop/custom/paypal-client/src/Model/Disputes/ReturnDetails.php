<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The return details for the product.
 *
 * generated from: response-return_details.json
 */
class ReturnDetails implements JsonSerializable
{
    use BaseModel;

    /** The customer shipped the product back to the merchant. */
    const MODE_SHIPPED = 'SHIPPED';

    /** The customer returned the item to the merchant in person. */
    const MODE_IN_PERSON = 'IN_PERSON';

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $return_time;

    /**
     * @var string
     * The method that the customer used to return the product.
     *
     * use one of constants defined in this class to set the value:
     * @see MODE_SHIPPED
     * @see MODE_IN_PERSON
     * minLength: 1
     * maxLength: 255
     */
    public $mode;

    /**
     * @var boolean
     * Indicates whether customer has the return receipt.
     */
    public $receipt;

    /**
     * @var string
     * The confirmation number for the item return.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $return_confirmation_number;

    /**
     * @var boolean
     * If `true`, indicates that the item was returned but the seller refused to accept the return and if `false`,
     * indicates the item was not attempted to return.
     */
    public $returned;
}
