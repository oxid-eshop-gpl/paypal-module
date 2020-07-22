<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Customer care contact information.
 *
 * generated from: model-customer_service_contact.json
 */
class CustomerServiceContact implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * Customer service email addresses.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $emails;

    /**
     * @var array<PhoneInfo>
     * Details of customer service phone numbers.
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 100
     */
    public $phones;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->emails, "emails in CustomerServiceContact must not be NULL $within");
         Assert::minCount($this->emails, 1, "emails in CustomerServiceContact must have min. count of 1 $within");
         Assert::maxCount($this->emails, 100, "emails in CustomerServiceContact must have max. count of 100 $within");
         Assert::isArray($this->emails, "emails in CustomerServiceContact must be array $within");
        Assert::notNull($this->phones, "phones in CustomerServiceContact must not be NULL $within");
         Assert::minCount($this->phones, 1, "phones in CustomerServiceContact must have min. count of 1 $within");
         Assert::maxCount($this->phones, 100, "phones in CustomerServiceContact must have max. count of 100 $within");
         Assert::isArray($this->phones, "phones in CustomerServiceContact must be array $within");

                                if (isset($this->phones)){
                                    foreach ($this->phones as $item) {
                                        $item->validate(CustomerServiceContact::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
