<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Arrays of auto-complete and DidYouMean values. Includes links that enable you to navigate through the
 * response.
 *
 * generated from: response-suggestion_response.json
 */
class SuggestionResponse implements JsonSerializable
{
    use BaseModel;

    /**
     * An array of auto complete values for the given search_text if present.
     *
     * @var string[]
     * maxItems: 1
     * maxItems: 10
     */
    public $suggestions;

    /**
     * The possible DidYouMean value if there are no suggestions for given search_text.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $corrected_search_text;

    /**
     * An array of request-related [HATEOAS links](/docs/api/hateoas-links/).
     *
     * @var LinkDescription[]
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->suggestions, "suggestions in SuggestionResponse must not be NULL $within");
        Assert::minCount(
            $this->suggestions,
            1,
            "suggestions in SuggestionResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->suggestions,
            10,
            "suggestions in SuggestionResponse must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->suggestions,
            "suggestions in SuggestionResponse must be array $within"
        );
        !isset($this->corrected_search_text) || Assert::minLength(
            $this->corrected_search_text,
            1,
            "corrected_search_text in SuggestionResponse must have minlength of 1 $within"
        );
        !isset($this->corrected_search_text) || Assert::maxLength(
            $this->corrected_search_text,
            255,
            "corrected_search_text in SuggestionResponse must have maxlength of 255 $within"
        );
        Assert::notNull($this->links, "links in SuggestionResponse must not be NULL $within");
        Assert::minCount(
            $this->links,
            1,
            "links in SuggestionResponse must have min. count of 1 $within"
        );
        Assert::maxCount(
            $this->links,
            10,
            "links in SuggestionResponse must have max. count of 10 $within"
        );
        Assert::isArray(
            $this->links,
            "links in SuggestionResponse must be array $within"
        );

        if (isset($this->links)) {
            foreach ($this->links as $item) {
                $item->validate(SuggestionResponse::class);
            }
        }
    }

    public function __construct()
    {
        $this->suggestions = [];
        $this->links = [];
    }
}
