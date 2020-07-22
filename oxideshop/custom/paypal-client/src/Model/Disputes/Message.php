<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A customer- or merchant-posted message for the dispute.
 *
 * generated from: response-message.json
 */
class Message implements JsonSerializable
{
    use BaseModel;

    /** The customer posted the message. */
    const POSTED_BY_BUYER = 'BUYER';

    /** The merchant posted the message. */
    const POSTED_BY_SELLER = 'SELLER';

    /** The arbiter of the dispute posted the message. */
    const POSTED_BY_ARBITER = 'ARBITER';

    /**
     * @var string
     * Indicates whether the customer, merchant, or dispute arbiter posted the message.
     *
     * use one of constants defined in this class to set the value:
     * @see POSTED_BY_BUYER
     * @see POSTED_BY_SELLER
     * @see POSTED_BY_ARBITER
     * minLength: 1
     * maxLength: 255
     */
    public $posted_by;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $time_posted;

    /**
     * @var string
     * The message text.
     *
     * maxLength: 2000
     */
    public $content;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->posted_by) || Assert::minLength($this->posted_by, 1, "posted_by in Message must have minlength of 1 $within");
        !isset($this->posted_by) || Assert::maxLength($this->posted_by, 255, "posted_by in Message must have maxlength of 255 $within");
        !isset($this->time_posted) || Assert::minLength($this->time_posted, 20, "time_posted in Message must have minlength of 20 $within");
        !isset($this->time_posted) || Assert::maxLength($this->time_posted, 64, "time_posted in Message must have maxlength of 64 $within");
        !isset($this->content) || Assert::maxLength($this->content, 2000, "content in Message must have maxlength of 2000 $within");
    }

    public function __construct()
    {
    }
}
