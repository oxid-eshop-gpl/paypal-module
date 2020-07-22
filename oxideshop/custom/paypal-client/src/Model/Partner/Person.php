<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * Details of the person or party.
 *
 * generated from: customer_common_overrides-person.json
 */
class Person implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The encrypted party ID.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * @var string
     * The internal PayPal party ID.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $party_id;

    /**
     * @var PersonName[]
     * The name of the person.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 5
     */
    public $names;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     *
     * minLength: 2
     * maxLength: 2
     */
    public $citizenship;

    /**
     * @var PersonAddressDetail[]
     * The list of addresses associated with the person.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 5
     */
    public $addresses;

    /**
     * @var PersonPhoneDetail[]
     * The list of phone numbers associated with the person.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 5
     */
    public $phones;

    /**
     * @var BirthDetails
     * Date of birth data provided by the user
     */
    public $birth_details;

    /**
     * @var PersonDocument[]
     * A person's or party's related document data collected from the customer. For example SSN, ITIN, or business
     * registration number collected from the user.
     *
     * this is mandatory to be set
     * maxItems: 0
     * maxItems: 20
     */
    public $documents;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in Person must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 20, "id in Person must have maxlength of 20 $within");
        !isset($this->party_id) || Assert::minLength($this->party_id, 1, "party_id in Person must have minlength of 1 $within");
        !isset($this->party_id) || Assert::maxLength($this->party_id, 20, "party_id in Person must have maxlength of 20 $within");
        Assert::notNull($this->names, "names in Person must not be NULL $within");
         Assert::minCount($this->names, 0, "names in Person must have min. count of 0 $within");
         Assert::maxCount($this->names, 5, "names in Person must have max. count of 5 $within");
         Assert::isArray($this->names, "names in Person must be array $within");

                                if (isset($this->names)){
                                    foreach ($this->names as $item) {
                                        $item->validate(Person::class);
                                    }
                                }

        !isset($this->citizenship) || Assert::minLength($this->citizenship, 2, "citizenship in Person must have minlength of 2 $within");
        !isset($this->citizenship) || Assert::maxLength($this->citizenship, 2, "citizenship in Person must have maxlength of 2 $within");
        Assert::notNull($this->addresses, "addresses in Person must not be NULL $within");
         Assert::minCount($this->addresses, 0, "addresses in Person must have min. count of 0 $within");
         Assert::maxCount($this->addresses, 5, "addresses in Person must have max. count of 5 $within");
         Assert::isArray($this->addresses, "addresses in Person must be array $within");

                                if (isset($this->addresses)){
                                    foreach ($this->addresses as $item) {
                                        $item->validate(Person::class);
                                    }
                                }

        Assert::notNull($this->phones, "phones in Person must not be NULL $within");
         Assert::minCount($this->phones, 0, "phones in Person must have min. count of 0 $within");
         Assert::maxCount($this->phones, 5, "phones in Person must have max. count of 5 $within");
         Assert::isArray($this->phones, "phones in Person must be array $within");

                                if (isset($this->phones)){
                                    foreach ($this->phones as $item) {
                                        $item->validate(Person::class);
                                    }
                                }

        !isset($this->birth_details) || Assert::isInstanceOf($this->birth_details, BirthDetails::class, "birth_details in Person must be instance of BirthDetails $within");
        !isset($this->birth_details) || $this->birth_details->validate(Person::class);
        Assert::notNull($this->documents, "documents in Person must not be NULL $within");
         Assert::minCount($this->documents, 0, "documents in Person must have min. count of 0 $within");
         Assert::maxCount($this->documents, 20, "documents in Person must have max. count of 20 $within");
         Assert::isArray($this->documents, "documents in Person must be array $within");

                                if (isset($this->documents)){
                                    foreach ($this->documents as $item) {
                                        $item->validate(Person::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
