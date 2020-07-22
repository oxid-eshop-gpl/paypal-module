<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

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
     */
    public $id;

    /**
     * @var string
     * The internal PayPal party ID.
     */
    public $party_id;

    /**
     * @var array<PersonName>
     * The name of the person.
     */
    public $names;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     */
    public $citizenship;

    /**
     * @var array<PersonAddressDetail>
     * The list of addresses associated with the person.
     */
    public $addresses;

    /**
     * @var array<PersonPhoneDetail>
     * The list of phone numbers associated with the person.
     */
    public $phones;

    /**
     * @var BirthDetails
     * Date of birth data provided by the user
     */
    public $birth_details;

    /**
     * @var array<PersonDocument>
     * A person's or party's related document data collected from the customer. For example SSN, ITIN, or business
     * registration number collected from the user.
     */
    public $documents;
}