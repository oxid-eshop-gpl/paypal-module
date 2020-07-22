<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The information about the account-related activities.
 *
 * generated from: response-account_activity.json
 */
class AccountActivity implements JsonSerializable
{
    use BaseModel;

    /** The account change occurred to an email. */
    const ENTITY_TYPE_EMAIL = 'EMAIL';

    /** The account change occurred to a phone number. */
    const ENTITY_TYPE_PHONE = 'PHONE';

    /** The account change occurred to an address. */
    const ENTITY_TYPE_ADDRESS = 'ADDRESS';

    /** The account change occurred to the account itself. */
    const ENTITY_TYPE_ACCOUNT = 'ACCOUNT';

    /** The account change occurred to a funding instrument. */
    const ENTITY_TYPE_FUNDING_INSTRUMENT = 'FUNDING_INSTRUMENT';

    /** The account change was other. */
    const ENTITY_TYPE_OTHER = 'OTHER';

    /** The account change occurred to a device. */
    const ENTITY_TYPE_DEVICE = 'DEVICE';

    /** The account change occurred to a credit card. */
    const ENTITY_SUBTYPE_CREDIT_CARD = 'CREDIT_CARD';

    /** The account change occurred to a bank account. */
    const ENTITY_SUBTYPE_BANK_ACCOUNT = 'BANK_ACCOUNT';

    /** The account change occurred to a debit card. */
    const ENTITY_SUBTYPE_DEBIT_CARD = 'DEBIT_CARD';

    /** The account change occurred to customer credit. */
    const ENTITY_SUBTYPE_BUYER_CREDIT = 'BUYER_CREDIT';

    /** The account change occurred to PayPal Smart Connect. */
    const ENTITY_SUBTYPE_PAYPAL_SMART_CONNECT = 'PAYPAL_SMART_CONNECT';

    /** The account change occurred to an ebay card. */
    const ENTITY_SUBTYPE_EBAY_CARD = 'EBAY_CARD';

    /** The account change occurred to a Plus card. */
    const ENTITY_SUBTYPE_PLUS_CARD = 'PLUS_CARD';

    /** The account change occurred to working capital. */
    const ENTITY_SUBTYPE_WORKING_CAPITAL = 'WORKING_CAPITAL';

    /** The account change occurred to revolving credit. */
    const ENTITY_SUBTYPE_REVOLVING_CREDIT = 'REVOLVING_CREDIT';

    /** The account change occurred to close-ended credit. */
    const ENTITY_SUBTYPE_CLOSE_ENDED_CREDIT = 'CLOSE_ENDED_CREDIT';

    /** The entity was added. */
    const ACTION_PERFORMED_ADDED = 'ADDED';

    /** The entity was removed. */
    const ACTION_PERFORMED_REMOVED = 'REMOVED';

    /** The entity was marked as primary. */
    const ACTION_PERFORMED_MARKED_PRIMARY = 'MARKED_PRIMARY';

    /** The entity was edited. */
    const ACTION_PERFORMED_EDITED = 'EDITED';

    /** The entity was upgraded. */
    const ACTION_PERFORMED_UPGRADED = 'UPGRADED';

    /** The entity was downgraded. */
    const ACTION_PERFORMED_DOWNGRADED = 'DOWNGRADED';

    /** The entity was stolen or lost. */
    const ACTION_PERFORMED_STOLEN_OR_LOST = 'STOLEN_OR_LOST';

    /** The entity was closed. */
    const ACTION_PERFORMED_CLOSED = 'CLOSED';

    /** The entity was deactivated. */
    const ACTION_PERFORMED_DEACTIVATED = 'DEACTIVATED';

    /** The entity was reactivated. */
    const ACTION_PERFORMED_REACTIVATED = 'REACTIVATED';

    /** The entity was reopened. */
    const ACTION_PERFORMED_REOPENED = 'REOPENED';

    /**
     * @var string
     * The ID of the activity log entry.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $id;

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
     * The entity type on which the activity was completed.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_TYPE_EMAIL
     * @see ENTITY_TYPE_PHONE
     * @see ENTITY_TYPE_ADDRESS
     * @see ENTITY_TYPE_ACCOUNT
     * @see ENTITY_TYPE_FUNDING_INSTRUMENT
     * @see ENTITY_TYPE_OTHER
     * @see ENTITY_TYPE_DEVICE
     * minLength: 1
     * maxLength: 255
     */
    public $entity_type;

    /**
     * @var string
     * The entity subtype on which the activity was completed. For example, `CREDIT_CARD` is a subtype of
     * `FUNDING_INSTRUMENT`, `PAYPAL_SMART_CONNECT` is subtype of `CREDIT_LINE`, and so on.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_SUBTYPE_CREDIT_CARD
     * @see ENTITY_SUBTYPE_BANK_ACCOUNT
     * @see ENTITY_SUBTYPE_DEBIT_CARD
     * @see ENTITY_SUBTYPE_BUYER_CREDIT
     * @see ENTITY_SUBTYPE_PAYPAL_SMART_CONNECT
     * @see ENTITY_SUBTYPE_EBAY_CARD
     * @see ENTITY_SUBTYPE_PLUS_CARD
     * @see ENTITY_SUBTYPE_WORKING_CAPITAL
     * @see ENTITY_SUBTYPE_REVOLVING_CREDIT
     * @see ENTITY_SUBTYPE_CLOSE_ENDED_CREDIT
     * minLength: 1
     * maxLength: 255
     */
    public $entity_subtype;

    /**
     * @var string
     * The action that was completed on the entity type.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_PERFORMED_ADDED
     * @see ACTION_PERFORMED_REMOVED
     * @see ACTION_PERFORMED_MARKED_PRIMARY
     * @see ACTION_PERFORMED_EDITED
     * @see ACTION_PERFORMED_UPGRADED
     * @see ACTION_PERFORMED_DOWNGRADED
     * @see ACTION_PERFORMED_STOLEN_OR_LOST
     * @see ACTION_PERFORMED_CLOSED
     * @see ACTION_PERFORMED_DEACTIVATED
     * @see ACTION_PERFORMED_REACTIVATED
     * @see ACTION_PERFORMED_REOPENED
     * minLength: 1
     * maxLength: 255
     */
    public $action_performed;

    /**
     * @var string
     * The entity ID of the reported item. For example, the card ID.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $entity_id;

    /**
     * @var ActivityEntityInfo
     * The date and time of the last known transaction or when other entity-related information was updated, in
     * [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     */
    public $activity_entity_info;

    /**
     * @var array<ReversalAction>
     * An array of system actions that reversed the impact of the unauthorized event. Includes the system-defined
     * details of the reversal action.
     */
    public $reversal_actions;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 255);
        assert(!isset($this->create_time) || strlen($this->create_time) >= 20);
        assert(!isset($this->create_time) || strlen($this->create_time) <= 64);
        assert(!isset($this->entity_type) || strlen($this->entity_type) >= 1);
        assert(!isset($this->entity_type) || strlen($this->entity_type) <= 255);
        assert(!isset($this->entity_subtype) || strlen($this->entity_subtype) >= 1);
        assert(!isset($this->entity_subtype) || strlen($this->entity_subtype) <= 255);
        assert(!isset($this->action_performed) || strlen($this->action_performed) >= 1);
        assert(!isset($this->action_performed) || strlen($this->action_performed) <= 255);
        assert(!isset($this->entity_id) || strlen($this->entity_id) >= 1);
        assert(!isset($this->entity_id) || strlen($this->entity_id) <= 255);
    }
}
