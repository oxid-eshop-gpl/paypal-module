<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * ODFI acts as the interface between the Federal Reserve or ACH network and the originator of the transaction.
 */
class OdfiDetails implements \JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $standard_entry_class_code;
}
