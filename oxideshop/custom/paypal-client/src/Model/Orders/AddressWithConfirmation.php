<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Address and confirmation details.
 *
 * generated from: model-address_with_confirmation.json
 */
class AddressWithConfirmation extends AddressName implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * Unique address identifier.
     */
    public $id;

    /**
     * @var string
     * Address confirmation status like NONE, PENDING, CONFIRMED, FAILED.
     */
    public $confirmation_status;

    /**
     * @var string
     * What 3rd party or process has determined the current confirmation_status.
     */
    public $confirmation_authority;
}
