<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The transaction details.
 *
 * generated from: transaction.json
 */
class Transaction extends CaptureStatus implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The PayPal-generated transaction ID.
     *
     * minLength: 3
     * maxLength: 50
     */
    public $id;

    /**
     * @var AmountWithBreakdown
     * The breakdown details for the amount. Includes the gross, tax, fee, and shipping amounts.
     */
    public $amount_with_breakdown;

    /**
     * @var Name
     * The name of the party.
     */
    public $payer_name;

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
    public $payer_email;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->id) || Assert::minLength($this->id, 3, "id in Transaction must have minlength of 3 $within");
        !isset($this->id) || Assert::maxLength($this->id, 50, "id in Transaction must have maxlength of 50 $within");
        !isset($this->amount_with_breakdown) || Assert::notNull($this->amount_with_breakdown->gross_amount, "gross_amount in amount_with_breakdown must not be NULL within Transaction $within");
        !isset($this->amount_with_breakdown) || Assert::notNull($this->amount_with_breakdown->net_amount, "net_amount in amount_with_breakdown must not be NULL within Transaction $within");
        !isset($this->amount_with_breakdown) || Assert::isInstanceOf($this->amount_with_breakdown, AmountWithBreakdown::class, "amount_with_breakdown in Transaction must be instance of AmountWithBreakdown $within");
        !isset($this->amount_with_breakdown) || $this->amount_with_breakdown->validate(Transaction::class);
        !isset($this->payer_name) || Assert::isInstanceOf($this->payer_name, Name::class, "payer_name in Transaction must be instance of Name $within");
        !isset($this->payer_name) || $this->payer_name->validate(Transaction::class);
        !isset($this->payer_email) || Assert::minLength($this->payer_email, 3, "payer_email in Transaction must have minlength of 3 $within");
        !isset($this->payer_email) || Assert::maxLength($this->payer_email, 254, "payer_email in Transaction must have maxlength of 254 $within");
        !isset($this->time) || Assert::minLength($this->time, 20, "time in Transaction must have minlength of 20 $within");
        !isset($this->time) || Assert::maxLength($this->time, 64, "time in Transaction must have maxlength of 64 $within");
    }

    public function __construct()
    {
    }
}
