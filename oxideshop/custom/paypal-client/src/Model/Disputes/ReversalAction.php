<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The system action that reverses the impact of the unauthorized event. Includes the system-defined details of
 * the reversal action.
 *
 * generated from: response-reversal_action.json
 */
class ReversalAction implements JsonSerializable
{
    use BaseModel;

    /** An email address. */
    const ENTITY_TYPE_EMAIL = 'EMAIL';

    /** A phone numbr. */
    const ENTITY_TYPE_PHONE = 'PHONE';

    /** An address. */
    const ENTITY_TYPE_ADDRESS = 'ADDRESS';

    /** An account. */
    const ENTITY_TYPE_ACCOUNT = 'ACCOUNT';

    /** A funding instrument. */
    const ENTITY_TYPE_FUNDING_INSTRUMENT = 'FUNDING_INSTRUMENT';

    /** A credit card. */
    const ENTITY_SUBTYPE_CREDIT_CARD = 'CREDIT_CARD';

    /** A bank account. */
    const ENTITY_SUBTYPE_BANK_ACCOUNT = 'BANK_ACCOUNT';

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

    /**
     * @var string
     * The ID of the entity that was changed as part of the reversal action.
     */
    public $id;

    /**
     * @var string
     * The ID of the activity log entry that was created for the reversal action that was carried out by the system.
     */
    public $original_activity_id;

    /**
     * @var string
     * The entity type on which some activity is completed.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_TYPE_EMAIL
     * @see ENTITY_TYPE_PHONE
     * @see ENTITY_TYPE_ADDRESS
     * @see ENTITY_TYPE_ACCOUNT
     * @see ENTITY_TYPE_FUNDING_INSTRUMENT
     */
    public $entity_type;

    /**
     * @var string
     * The entity subtype on which the activity is completed. For example, `CREDIT_CARD` is a subtype of
     * `FUNDING_INSTRUMENT`, `PAYPAL_SMART_CONNECT` is a subtype of `CREDIT_LINE`, and so on.
     *
     * use one of constants defined in this class to set the value:
     * @see ENTITY_SUBTYPE_CREDIT_CARD
     * @see ENTITY_SUBTYPE_BANK_ACCOUNT
     */
    public $entity_subtype;

    /**
     * @var string
     * The action completed on the entity type.
     *
     * use one of constants defined in this class to set the value:
     * @see ACTION_PERFORMED_ADDED
     * @see ACTION_PERFORMED_REMOVED
     * @see ACTION_PERFORMED_MARKED_PRIMARY
     * @see ACTION_PERFORMED_EDITED
     * @see ACTION_PERFORMED_UPGRADED
     * @see ACTION_PERFORMED_DOWNGRADED
     */
    public $action_performed;

    /**
     * @var string
     * The status.
     */
    public $status;
}
