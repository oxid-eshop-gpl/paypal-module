<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * An array of disputes. Includes links that enable you to navigate through the response.
 */
class DisputeSearch implements \JsonSerializable
{
    /** @var array */
    public $items;

    /** @var integer */
    public $total_items;

    /** @var integer */
    public $total_pages;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
