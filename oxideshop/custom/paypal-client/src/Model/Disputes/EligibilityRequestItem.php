<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Information about the items in the transaction.
 *
 * generated from: referred-eligibility_request_item.json
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

    /**
     * @var string
     * The ID of the item.
     *
     * minLength: 1
     * maxLength: 255
     */
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
     * minLength: 1
     * maxLength: 255
     */
    public $category;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in EligibilityRequestItem must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 255, "id in EligibilityRequestItem must have maxlength of 255 $within");
        !isset($this->category) || Assert::minLength($this->category, 1, "category in EligibilityRequestItem must have minlength of 1 $within");
        !isset($this->category) || Assert::maxLength($this->category, 255, "category in EligibilityRequestItem must have maxlength of 255 $within");
    }

    public function __construct()
    {
    }
}
