<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * The duplicate transaction details.
 */
class DuplicateTransaction implements \JsonSerializable
{
    /** @var boolean */
    public $received_duplicate;

    /** @var TransactionInfo */
    public $original_transaction;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
