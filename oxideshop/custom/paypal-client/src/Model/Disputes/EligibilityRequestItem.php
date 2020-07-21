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

    /** @var string */
    public $id;

    /**
     * @var string
     * The category of the item in dispute.
     */
    public $category;
}
