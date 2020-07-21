<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

/**
 * The backup funding instrument to use for payment when the primary instrument fails.
 */
class BackupFundingInstrument implements \JsonSerializable
{
    /** @var CardResponse */
    public $card;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
