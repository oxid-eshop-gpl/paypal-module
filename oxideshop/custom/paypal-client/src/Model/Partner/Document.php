<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * minLength: 1
     * maxLength: 20
     */
    public $id;

    /**
     * @var array<string>
     * The document labels. A document could be classfied to multiple categories. For example, a bill document can be
     * classfified as `BILL DOCUMENT` and `UTILITY DOCUMENT`.
     *
     * maxItems: 1
     * maxItems: 50
     */
    public $labels;

    /**
     * @var string
     * The file name.
     *
     * minLength: 1
     * maxLength: 100
     */
    public $name;

    /**
     * @var string
     * The number for the document. It is the ID number if the document is `ID CARD`, the passport number if the
     * document is `PASSPORT`, etc.
     *
     * minLength: 1
     * maxLength: 100
     */
    public $identification_number;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * minLength: 10
     * maxLength: 10
     */
    public $issue_date;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     *
     * minLength: 10
     * maxLength: 10
     */
    public $expiry_date;

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
    public $issuing_country_code;

    /**
     * @var array<FileReference>
     * The files contained in the document. For example, a document could be represented by a front page file and a
     * back page file, etc.
     *
     * maxItems: 1
     * maxItems: 50
     */
    public $files;

    /**
     * @var array<array>
     * The HATEOAS links.
     *
     * maxItems: 1
     * maxItems: 10
     */
    public $links;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 1, "id in Document must have minlength of 1 $within");
        !isset($this->id) || Assert::maxLength($this->id, 20, "id in Document must have maxlength of 20 $within");
        Assert::notNull($this->labels, "labels in Document must not be NULL $within");
         Assert::minCount($this->labels, 1, "labels in Document must have min. count of 1 $within");
         Assert::maxCount($this->labels, 50, "labels in Document must have max. count of 50 $within");
         Assert::isArray($this->labels, "labels in Document must be array $within");
        !isset($this->name) || Assert::minLength($this->name, 1, "name in Document must have minlength of 1 $within");
        !isset($this->name) || Assert::maxLength($this->name, 100, "name in Document must have maxlength of 100 $within");
        !isset($this->identification_number) || Assert::minLength($this->identification_number, 1, "identification_number in Document must have minlength of 1 $within");
        !isset($this->identification_number) || Assert::maxLength($this->identification_number, 100, "identification_number in Document must have maxlength of 100 $within");
        !isset($this->issue_date) || Assert::minLength($this->issue_date, 10, "issue_date in Document must have minlength of 10 $within");
        !isset($this->issue_date) || Assert::maxLength($this->issue_date, 10, "issue_date in Document must have maxlength of 10 $within");
        !isset($this->expiry_date) || Assert::minLength($this->expiry_date, 10, "expiry_date in Document must have minlength of 10 $within");
        !isset($this->expiry_date) || Assert::maxLength($this->expiry_date, 10, "expiry_date in Document must have maxlength of 10 $within");
        !isset($this->issuing_country_code) || Assert::minLength($this->issuing_country_code, 2, "issuing_country_code in Document must have minlength of 2 $within");
        !isset($this->issuing_country_code) || Assert::maxLength($this->issuing_country_code, 2, "issuing_country_code in Document must have maxlength of 2 $within");
        Assert::notNull($this->files, "files in Document must not be NULL $within");
         Assert::minCount($this->files, 1, "files in Document must have min. count of 1 $within");
         Assert::maxCount($this->files, 50, "files in Document must have max. count of 50 $within");
         Assert::isArray($this->files, "files in Document must be array $within");

                                if (isset($this->files)){
                                    foreach ($this->files as $item) {
                                        $item->validate(Document::class);
                                    }
                                }

        Assert::notNull($this->links, "links in Document must not be NULL $within");
         Assert::minCount($this->links, 1, "links in Document must have min. count of 1 $within");
         Assert::maxCount($this->links, 10, "links in Document must have max. count of 10 $within");
         Assert::isArray($this->links, "links in Document must be array $within");
    }

    public function __construct()
    {
    }
}
