<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

/**
 * Arrays of auto-complete and DidYouMean values. Includes links that enable you to navigate through the response.
 */
class SuggestionResponse implements \JsonSerializable
{
	/** @var array */
	public $suggestions;

	/** @var string */
	public $corrected_search_text;

	/** @var array */
	public $links;


	public function jsonSerialize()
	{
		return array_filter((array) $this);
	}
}
