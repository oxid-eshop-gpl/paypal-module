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
     *
     * minLength: 1
     * maxLength: 30
     */
    public $id;

    /**
     * @var string
     * Address confirmation status like NONE, PENDING, CONFIRMED, FAILED.
     *
     * minLength: 1
     * maxLength: 127
     */
    public $confirmation_status;

    /**
     * @var string
     * What 3rd party or process has determined the current confirmation_status.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $confirmation_authority;

    public function validate()
    {
        assert(!isset($this->id) || strlen($this->id) >= 1);
        assert(!isset($this->id) || strlen($this->id) <= 30);
        assert(!isset($this->confirmation_status) || strlen($this->confirmation_status) >= 1);
        assert(!isset($this->confirmation_status) || strlen($this->confirmation_status) <= 127);
        assert(!isset($this->confirmation_authority) || strlen($this->confirmation_authority) >= 1);
        assert(!isset($this->confirmation_authority) || strlen($this->confirmation_authority) <= 255);
    }
}
