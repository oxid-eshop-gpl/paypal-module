<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A PayPal-requested or partner action for the dispute.
 *
 * generated from: response-partner_action.json
 */
class PartnerAction implements JsonSerializable
{
    use BaseModel;

    /** The partner must provide the consumer with provisional credit. */
    const NAME_PROVIDE_PROVISIONAL_CREDIT = 'PROVIDE_PROVISIONAL_CREDIT';

    /** The partner denies dispute and must reverse the provisional credit. */
    const NAME_DENY_DISPUTE = 'DENY_DISPUTE';

    /** The partner accepts dispute and must provide permanent provisional credit to the consumer. */
    const NAME_ACCEPT_DISPUTE = 'ACCEPT_DISPUTE';

    /** The partner must write off the dispute. */
    const NAME_WRITE_OFF = 'WRITE_OFF';

    /** The action is pending and awaits partner processing. For this type of action, the partner must update the action's status after they complete the required actions. */
    const STATUS_PENDING = 'PENDING';

    /** The partner has processed the action. */
    const STATUS_COMPLETED = 'COMPLETED';

    /**
     * @var string
     * The ID for the action.
     */
    public $id;

    /**
     * @var string
     * The action name.
     *
     * use one of constants defined in this class to set the value:
     * @see NAME_PROVIDE_PROVISIONAL_CREDIT
     * @see NAME_DENY_DISPUTE
     * @see NAME_ACCEPT_DISPUTE
     * @see NAME_WRITE_OFF
     */
    public $name;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $update_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     */
    public $due_time;

    /**
     * @var string
     * The status of the action.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_PENDING
     * @see STATUS_COMPLETED
     */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;
}
