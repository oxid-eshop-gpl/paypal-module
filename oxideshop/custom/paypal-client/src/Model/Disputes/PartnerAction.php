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
     *
     * minLength: 1
     * maxLength: 255
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
     * minLength: 1
     * maxLength: 255
     */
    public $name;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $due_time;

    /**
     * @var string
     * The status of the action.
     *
     * use one of constants defined in this class to set the value:
     * @see STATUS_PENDING
     * @see STATUS_COMPLETED
     * minLength: 1
     * maxLength: 255
     */
    public $status;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $amount;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 255);
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 255);
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
        assert(!isset($this->update_time) || strlen($this->update_time) >= 20);
        assert(!isset($this->update_time) || strlen($this->update_time) <= 64);
        assert(!isset($this->due_time) || strlen($this->due_time) >= 20);
        assert(!isset($this->due_time) || strlen($this->due_time) <= 64);
        assert(!isset($this->status) || strlen($this->status) >= 1);
        assert(!isset($this->status) || strlen($this->status) <= 255);
        assert(isset($this->amount));
    }
}
