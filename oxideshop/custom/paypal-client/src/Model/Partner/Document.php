<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The document object.
 *
 * generated from: customer_common-v1-schema-account_model-document.json
 */
class Document implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The encrypted identifier for the document.
     */
    public $id;

    /**
     * @var array<string>
     * The document labels. A document could be classfied to multiple categories. For example, a bill document can be
     * classfified as `BILL DOCUMENT` and `UTILITY DOCUMENT`.
     */
    public $labels;

    /**
     * @var string
     * The file name.
     */
    public $name;

    /**
     * @var string
     * The number for the document. It is the ID number if the document is `ID CARD`, the passport number if the
     * document is `PASSPORT`, etc.
     */
    public $identification_number;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $issue_date;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $expiry_date;

    /**
     * @var string
     * The [two-character ISO 3166-1 code](/docs/integration/direct/rest/country-codes/) that identifies the country
     * or region.<blockquote><strong>Note:</strong> The country code for Great Britain is <code>GB</code> and not
     * <code>UK</code> as used in the top-level domain names for that country. Use the `C2` country code for China
     * worldwide for comparable uncontrolled price (CUP) method, bank card, and cross-border
     * transactions.</blockquote>
     */
    public $issuing_country_code;

    /**
     * @var array<FileReference>
     * The files contained in the document. For example, a document could be represented by a front page file and a
     * back page file, etc.
     */
    public $files;

    /**
     * @var array<array>
     * The HATEOAS links.
     */
    public $links;
}
