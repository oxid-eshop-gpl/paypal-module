<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Arrays of auto-complete and DidYouMean values. Includes links that enable you to navigate through the response.
 */
class SuggestionResponse implements \JsonSerializable
{
    use BaseModel;

    /** @var array */
    public $suggestions;

    /** @var string */
    public $corrected_search_text;

    /** @var array */
    public $links;
}
