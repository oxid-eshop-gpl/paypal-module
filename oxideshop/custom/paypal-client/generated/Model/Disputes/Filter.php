<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A set of filters that you can use to filter the disputes in the response.
 *
 * generated from: request-filter.json
 */
class Filter implements JsonSerializable
{
    use BaseModel;

    /**
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * @var string | null
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * Filters the disputes in the response by the full name of a counter party.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    /**
     * Filters the disputes in the response by one or more reasons. Use a comma to separate multiple reasons. The
     * response lists disputes that belong to any of the specified reasons.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $reasons;

    /**
     * Filters the disputes in the response by one or more statuses. Use a comma to separate multiple statuses. The
     * response lists disputes with any of the specified statuses.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $statuses;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time_before;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $create_time_after;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time_before;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $update_time_after;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_date_before;

    /**
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * @var string | null
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_date_after;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount_gte;

    /**
     * The currency and amount for a financial transaction, such as a balance or payment due.
     *
     * @var Money | null
     */
    public $dispute_amount_lte;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->email) || Assert::minLength(
            $this->email,
            3,
            "email in Filter must have minlength of 3 $within"
        );
        !isset($this->email) || Assert::maxLength(
            $this->email,
            254,
            "email in Filter must have maxlength of 254 $within"
        );
        !isset($this->name) || Assert::minLength(
            $this->name,
            1,
            "name in Filter must have minlength of 1 $within"
        );
        !isset($this->name) || Assert::maxLength(
            $this->name,
            2000,
            "name in Filter must have maxlength of 2000 $within"
        );
        !isset($this->reasons) || Assert::minLength(
            $this->reasons,
            1,
            "reasons in Filter must have minlength of 1 $within"
        );
        !isset($this->reasons) || Assert::maxLength(
            $this->reasons,
            2000,
            "reasons in Filter must have maxlength of 2000 $within"
        );
        !isset($this->statuses) || Assert::minLength(
            $this->statuses,
            1,
            "statuses in Filter must have minlength of 1 $within"
        );
        !isset($this->statuses) || Assert::maxLength(
            $this->statuses,
            2000,
            "statuses in Filter must have maxlength of 2000 $within"
        );
        !isset($this->create_time_before) || Assert::minLength(
            $this->create_time_before,
            20,
            "create_time_before in Filter must have minlength of 20 $within"
        );
        !isset($this->create_time_before) || Assert::maxLength(
            $this->create_time_before,
            64,
            "create_time_before in Filter must have maxlength of 64 $within"
        );
        !isset($this->create_time_after) || Assert::minLength(
            $this->create_time_after,
            20,
            "create_time_after in Filter must have minlength of 20 $within"
        );
        !isset($this->create_time_after) || Assert::maxLength(
            $this->create_time_after,
            64,
            "create_time_after in Filter must have maxlength of 64 $within"
        );
        !isset($this->update_time_before) || Assert::minLength(
            $this->update_time_before,
            20,
            "update_time_before in Filter must have minlength of 20 $within"
        );
        !isset($this->update_time_before) || Assert::maxLength(
            $this->update_time_before,
            64,
            "update_time_before in Filter must have maxlength of 64 $within"
        );
        !isset($this->update_time_after) || Assert::minLength(
            $this->update_time_after,
            20,
            "update_time_after in Filter must have minlength of 20 $within"
        );
        !isset($this->update_time_after) || Assert::maxLength(
            $this->update_time_after,
            64,
            "update_time_after in Filter must have maxlength of 64 $within"
        );
        !isset($this->response_due_date_before) || Assert::minLength(
            $this->response_due_date_before,
            20,
            "response_due_date_before in Filter must have minlength of 20 $within"
        );
        !isset($this->response_due_date_before) || Assert::maxLength(
            $this->response_due_date_before,
            64,
            "response_due_date_before in Filter must have maxlength of 64 $within"
        );
        !isset($this->response_due_date_after) || Assert::minLength(
            $this->response_due_date_after,
            20,
            "response_due_date_after in Filter must have minlength of 20 $within"
        );
        !isset($this->response_due_date_after) || Assert::maxLength(
            $this->response_due_date_after,
            64,
            "response_due_date_after in Filter must have maxlength of 64 $within"
        );
        !isset($this->dispute_amount_gte) || Assert::isInstanceOf(
            $this->dispute_amount_gte,
            Money::class,
            "dispute_amount_gte in Filter must be instance of Money $within"
        );
        !isset($this->dispute_amount_gte) ||  $this->dispute_amount_gte->validate(Filter::class);
        !isset($this->dispute_amount_lte) || Assert::isInstanceOf(
            $this->dispute_amount_lte,
            Money::class,
            "dispute_amount_lte in Filter must be instance of Money $within"
        );
        !isset($this->dispute_amount_lte) ||  $this->dispute_amount_lte->validate(Filter::class);
    }

    public function __construct()
    {
    }
}
