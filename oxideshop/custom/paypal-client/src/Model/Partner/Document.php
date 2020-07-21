<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

/**
 * The document object.
 */
class Document implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var array */
    public $labels;

    /** @var string */
    public $name;

    /** @var string */
    public $identification_number;

    /** @var string */
    public $issue_date;

    /** @var string */
    public $expiry_date;

    /** @var string */
    public $issuing_country_code;

    /** @var array */
    public $files;

    /** @var array */
    public $links;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
