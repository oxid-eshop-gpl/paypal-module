<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * A set of filters that you can use to filter the disputes in the response.
 *
 * generated from: request-filter.json
 */
class Filter implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The internationalized email address.<blockquote><strong>Note:</strong> Up to 64 characters are allowed before
     * and 255 characters are allowed after the <code>@</code> sign. However, the generally accepted maximum length
     * for an email address is 254 characters. The pattern verifies that an unquoted <code>@</code> sign
     * exists.</blockquote>
     *
     * minLength: 3
     * maxLength: 254
     */
    public $email;

    /**
     * @var string
     * Filters the disputes in the response by the full name of a counter party.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $name;

    /**
     * @var string
     * Filters the disputes in the response by one or more reasons. Use a comma to separate multiple reasons. The
     * response lists disputes that belong to any of the specified reasons.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $reasons;

    /**
     * @var string
     * Filters the disputes in the response by one or more statuses. Use a comma to separate multiple statuses. The
     * response lists disputes with any of the specified statuses.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $statuses;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time_before;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $create_time_after;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time_before;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $update_time_after;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_date_before;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $response_due_date_after;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount_gte;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $dispute_amount_lte;

    public function validate()
    {
        assert(!isset($this->email) || strlen($this->email) >= 3);
        assert(!isset($this->email) || strlen($this->email) <= 254);
        assert(!isset($this->name) || strlen($this->name) >= 1);
        assert(!isset($this->name) || strlen($this->name) <= 2000);
        assert(!isset($this->reasons) || strlen($this->reasons) >= 1);
        assert(!isset($this->reasons) || strlen($this->reasons) <= 2000);
        assert(!isset($this->statuses) || strlen($this->statuses) >= 1);
        assert(!isset($this->statuses) || strlen($this->statuses) <= 2000);
        assert(!isset($this->create_time_before) || strlen($this->create_time_before) >= 20);
        assert(!isset($this->create_time_before) || strlen($this->create_time_before) <= 64);
        assert(!isset($this->create_time_after) || strlen($this->create_time_after) >= 20);
        assert(!isset($this->create_time_after) || strlen($this->create_time_after) <= 64);
        assert(!isset($this->update_time_before) || strlen($this->update_time_before) >= 20);
        assert(!isset($this->update_time_before) || strlen($this->update_time_before) <= 64);
        assert(!isset($this->update_time_after) || strlen($this->update_time_after) >= 20);
        assert(!isset($this->update_time_after) || strlen($this->update_time_after) <= 64);
        assert(!isset($this->response_due_date_before) || strlen($this->response_due_date_before) >= 20);
        assert(!isset($this->response_due_date_before) || strlen($this->response_due_date_before) <= 64);
        assert(!isset($this->response_due_date_after) || strlen($this->response_due_date_after) >= 20);
        assert(!isset($this->response_due_date_after) || strlen($this->response_due_date_after) <= 64);
        assert(isset($this->dispute_amount_gte));
        assert(isset($this->dispute_amount_lte));
    }
}
