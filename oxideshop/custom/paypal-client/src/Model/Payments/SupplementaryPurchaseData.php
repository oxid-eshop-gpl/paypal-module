<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The capture identification-related fields. Includes the invoice ID, custom ID, note to payer, and soft
 * descriptor.
 *
 * generated from: supplementary_purchase_data.json
 */
class SupplementaryPurchaseData implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $invoice_id;

    /** @var string */
    public $custom_id;

    /** @var string */
    public $note_to_payer;

    /** @var string */
    public $soft_descriptor;
}
