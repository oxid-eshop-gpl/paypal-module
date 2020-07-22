<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The bank account ID. An ID with `ROUTING_NUMBER_1` is required.
 *
 * generated from: referral_data-identifier.json
 */
class Identifier implements JsonSerializable
{
    use BaseModel;

    /** The bank code. */
    const TYPE_BANK_CODE = 'BANK_CODE';

    /** The BI code. */
    const TYPE_BI_CODE = 'BI_CODE';

    /** Branch code. */
    const TYPE_BRANCH_CODE = 'BRANCH_CODE';

    /** The bank routing number. */
    const TYPE_ROUTING_NUMBER_1 = 'ROUTING_NUMBER_1';

    /** The bank routing number. */
    const TYPE_ROUTING_NUMBER_2 = 'ROUTING_NUMBER_2';

    /** The bank routing number. */
    const TYPE_ROUTING_NUMBER_3 = 'ROUTING_NUMBER_3';

    /** The bank swift code. */
    const TYPE_SWIFT_CODE = 'SWIFT_CODE';

    /** Swift code. */
    const TYPE_INTERMEDIARY_SWIFT_CODE = 'INTERMEDIARY_SWIFT_CODE';

    /** BBAN. */
    const TYPE_BBAN = 'BBAN';

    /** BBAN enrypted. */
    const TYPE_BBAN_ENCRYPTED = 'BBAN_ENCRYPTED';

    /** BBAN HMAC. */
    const TYPE_BBAN_HMAC = 'BBAN_HMAC';

    /** Aggregator Yodlee. */
    const TYPE_AGGREGATOR_YODLEE = 'AGGREGATOR_YODLEE';

    /**
     * @var string
     * The bank account ID type.
     *
     * use one of constants defined in this class to set the value:
     * @see TYPE_BANK_CODE
     * @see TYPE_BI_CODE
     * @see TYPE_BRANCH_CODE
     * @see TYPE_ROUTING_NUMBER_1
     * @see TYPE_ROUTING_NUMBER_2
     * @see TYPE_ROUTING_NUMBER_3
     * @see TYPE_SWIFT_CODE
     * @see TYPE_BRANCH_CODE
     * @see TYPE_INTERMEDIARY_SWIFT_CODE
     * @see TYPE_BBAN
     * @see TYPE_BBAN_ENCRYPTED
     * @see TYPE_BBAN_HMAC
     * @see TYPE_AGGREGATOR_YODLEE
     * minLength: 1
     * maxLength: 125
     */
    public $type;

    /**
     * @var string
     * The value of account identifier.
     *
     * minLength: 1
     * maxLength: 125
     */
    public $value;
}
