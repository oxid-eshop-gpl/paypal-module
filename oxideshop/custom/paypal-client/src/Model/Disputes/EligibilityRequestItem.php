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
     */
    public $category;
}
