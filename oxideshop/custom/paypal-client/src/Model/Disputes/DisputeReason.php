<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The reason for the item-level dispute. For information about the required information for each dispute reason and associated evidence type, see <a href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
 */
class DisputeReason implements \JsonSerializable
{
    use BaseModel;
}
