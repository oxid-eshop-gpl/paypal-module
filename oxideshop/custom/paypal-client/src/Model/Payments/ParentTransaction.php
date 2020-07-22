<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information about the parent transaction.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-parent_transaction.json
 */
class ParentTransaction implements JsonSerializable
{
    use BaseModel;

    /** The parent transaction is an authorization. */
    const TYPE_AUTHORIZATION = 'AUTHORIZATION';

    /** The parent transaction is an order. */
    const TYPE_ORDER = 'ORDER';

    /**
     * @var string
     * The PayPal-generated ID for Authorization or Order this transaction is capturing.
     */
    public $id;

    /**
     * @var string
     * The payment type the parent transaction.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_AUTHORIZATION
     * @see TYPE_ORDER
     */
    public $type;
}
