<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * A merchant request to acknowledge receipt of the disputed item that the customer returned.
 *
 * generated from: request-acknowledge_return_item.json
 */
class AcknowledgeReturnItem implements JsonSerializable
{
    use BaseModel;

    /**
     * The merchant provided notes. PayPal can but the consumer cannot view these notes.
     *
     * @var string | null
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->note) || Assert::minLength(
            $this->note,
            1,
            "note in AcknowledgeReturnItem must have minlength of 1 $within"
        );
        !isset($this->note) || Assert::maxLength(
            $this->note,
            2000,
            "note in AcknowledgeReturnItem must have maxlength of 2000 $within"
        );
    }

    public function __construct()
    {
    }
}
