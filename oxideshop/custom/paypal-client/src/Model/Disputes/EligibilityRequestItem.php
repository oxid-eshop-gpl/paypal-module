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

    /** Computer or related accessories. */
    const CATEGORY_COMPUTERS = 'COMPUTERS';

    /** Home appliances. */
    const CATEGORY_HOME = 'HOME';

    /** Decorative items, ornaments, and so on. */
    const CATEGORY_JEWELRY = 'JEWELRY';

    /** Antiques and collectible items. */
    const CATEGORY_ANTIQUES = 'ANTIQUES';

    /** Entertainment goods, such as video games, DVDs, and so on. */
    const CATEGORY_ENTERTAINMENT = 'ENTERTAINMENT';

    /** Other material goods. */
    const CATEGORY_OTHER_TANGIBLES = 'OTHER_TANGIBLES';

    /** Travel items and travel needs. */
    const CATEGORY_TRAVEL = 'TRAVEL';

    /** Services, such as installation, repair, and so on. */
    const CATEGORY_SERVICE = 'SERVICE';

    /** Non-physical objects, such as online games. */
    const CATEGORY_VIRTUAL_GOODS = 'VIRTUAL_GOODS';

    /** Other intangible goods. */
    const CATEGORY_OTHER_INTANGIBLES = 'OTHER_INTANGIBLES';

    /** Tickets for events, such as sports, concerts, and so on. */
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
