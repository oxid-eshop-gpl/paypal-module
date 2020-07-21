<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * Details of the person or party.
 */
class Person implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $id;

    /** @var string */
    public $party_id;

    /** @var array<PersonName> */
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

    /** @var array<PersonAddressDetail> */
    public $addresses;

    /** @var array<PersonPhoneDetail> */
    public $phones;

    /**
     * @var BirthDetails
     * Date of birth data provided by the user
     */
    public $birth_details;

    /** @var array<PersonDocument> */
    public $documents;
}
