<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Information about the items in the transaction.
 */
class EligibilityRequestItem implements JsonSerializable
{
    use BaseModel;

    const CATEGORY_COMPUTERS = 'COMPUTERS';
    const CATEGORY_HOME = 'HOME';
    const CATEGORY_JEWELRY = 'JEWELRY';
    const CATEGORY_ANTIQUES = 'ANTIQUES';
    const CATEGORY_ENTERTAINMENT = 'ENTERTAINMENT';
    const CATEGORY_OTHER_TANGIBLES = 'OTHER_TANGIBLES';
    const CATEGORY_TRAVEL = 'TRAVEL';
    const CATEGORY_SERVICE = 'SERVICE';
    const CATEGORY_VIRTUAL_GOODS = 'VIRTUAL_GOODS';
    const CATEGORY_OTHER_INTANGIBLES = 'OTHER_INTANGIBLES';
    const CATEGORY_TICKETS = 'TICKETS';

    /** @var string */
    public $id;

    /**
     * @var string
     * The category of the item in dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CATEGORY_COMPUTERS
     * @see CATEGORY_HOME
     * @see CATEGORY_JEWELRY
     * @see CATEGORY_ANTIQUES
     * @see CATEGORY_ENTERTAINMENT
     * @see CATEGORY_OTHER_TANGIBLES
     * @see CATEGORY_TRAVEL
     * @see CATEGORY_SERVICE
     * @see CATEGORY_VIRTUAL_GOODS
     * @see CATEGORY_OTHER_INTANGIBLES
     * @see CATEGORY_TICKETS
     */
    public $category;
}
