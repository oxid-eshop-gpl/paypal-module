<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

/**
 * Arrays of auto-complete and DidYouMean values. Includes links that enable you to navigate through the response.
 */
class DisputeSearchSuggestionResponse
{
	/** @var array */
	public $suggestions;

	/** @var string */
	public $corrected_search_text;

	/** @var array */
	public $links;
}
