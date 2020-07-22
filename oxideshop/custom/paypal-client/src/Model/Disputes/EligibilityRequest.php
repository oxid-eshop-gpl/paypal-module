<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * For a new third-party case, lists the eligible and ineligible dispute reasons. The customer can use the
 * eligible reasons to create a dispute. To check the eligibility of case creation, specify the encrypted
 * transaction ID.
 *
 * generated from: referred-eligibility_request.json
 */
class EligibilityRequest implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The encrypted transaction ID.
     *
     * this is mandatory to be set
     * minLength: 1
     * maxLength: 255
     */
    public $transaction_id;

    /**
     * @var array<EligibilityRequestItem>
     * An array of the items in the disputed transaction.
     */
    public $disputed_items;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->transaction_id, "transaction_id in EligibilityRequest must not be NULL $within");
         Assert::minLength($this->transaction_id, 1, "transaction_id in EligibilityRequest must have minlength of 1 $within");
         Assert::maxLength($this->transaction_id, 255, "transaction_id in EligibilityRequest must have maxlength of 255 $within");
        !isset($this->disputed_items) || Assert::isArray($this->disputed_items, "disputed_items in EligibilityRequest must be array $within");

                                if (isset($this->disputed_items)){
                                    foreach ($this->disputed_items as $item) {
                                        $item->validate(EligibilityRequest::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
