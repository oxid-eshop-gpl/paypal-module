<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The level of protection offered as defined by [PayPal Seller Protection for
 * Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-seller_protection.json
 */
class SellerProtection implements JsonSerializable
{
    use BaseModel;

    /** Your PayPal balance remains intact if the customer claims that they did not receive an item or the account holder claims that they did not authorize the payment. */
    const STATUS_ELIGIBLE = 'ELIGIBLE';

    /** Your PayPal balance remains intact if the customer claims that they did not receive an item. */
    const STATUS_PARTIALLY_ELIGIBLE = 'PARTIALLY_ELIGIBLE';

    /** This transaction is not eligible for seller protection. */
    const STATUS_NOT_ELIGIBLE = 'NOT_ELIGIBLE';

    /**
     * @var string
     * Indicates whether the transaction is eligible for seller protection. For information, see [PayPal Seller
     * Protection for Merchants](https://www.paypal.com/us/webapps/mpp/security/seller-protection).
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_ELIGIBLE
     * @see STATUS_PARTIALLY_ELIGIBLE
     * @see STATUS_NOT_ELIGIBLE
     */
    public $status;

    /**
     * @var array<string>
     * An array of conditions that are covered for the transaction.
     */
    public $dispute_categories;
}
