<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

/**
 * Basic vault instruction specification that can be extended by specific payment sources that supports vaulting.
 */
class VaultInstructionBase implements \JsonSerializable
{
    /** @var string */
    public $confirm_payment_token;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
