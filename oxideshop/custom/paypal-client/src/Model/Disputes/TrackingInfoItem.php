<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tracking information item.
 *
 * generated from: referred-tracking_info_item.json
 */
class TrackingInfoItem implements JsonSerializable
{
    use BaseModel;

    /** The tracking information is invalid. */
    const TRACKING_STATUS_INVALID = 'INVALID';

    /** The tracking information is not available. */
    const TRACKING_STATUS_NO_TRACKING = 'NO_TRACKING';

    /** The disputed item is in transit. */
    const TRACKING_STATUS_IN_TRANSIT = 'IN_TRANSIT';

    /** The disputed item is lost. */
    const TRACKING_STATUS_LOST = 'LOST';

    /** The disputed item was delivered to the customer. */
    const TRACKING_STATUS_DELIVERED = 'DELIVERED';

    /**
     * @var string
     * The name of the carrier for the shipment of the transaction for this dispute.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $carrier_name;

    /**
     * @var string
     * The URL to track the item shipment.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $tracking_url;

    /**
     * @var string
     * The tracking number for the dispute-related transaction shipment.
     *
     * minLength: 1
     * maxLength: 255
     */
    public $tracking_number;

    /**
     * @var string
     * Each Tracking info sent to PP should be mapped to tracking status.
     *
     * use one of constants defined in this class to set the value:
     * @see TRACKING_STATUS_INVALID
     * @see TRACKING_STATUS_NO_TRACKING
     * @see TRACKING_STATUS_IN_TRANSIT
     * @see TRACKING_STATUS_LOST
     * @see TRACKING_STATUS_DELIVERED
     * minLength: 1
     * maxLength: 255
     */
    public $tracking_status;

    /**
     * @var string
     * Any notes about the tracking information.
     *
     * minLength: 1
     * maxLength: 2000
     */
    public $note;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $posted_time;

    public function validate()
    {
        assert(!isset($this->carrier_name) || strlen($this->carrier_name) >= 1);
        assert(!isset($this->carrier_name) || strlen($this->carrier_name) <= 2000);
        assert(!isset($this->tracking_url) || strlen($this->tracking_url) >= 1);
        assert(!isset($this->tracking_url) || strlen($this->tracking_url) <= 2000);
        assert(!isset($this->tracking_number) || strlen($this->tracking_number) >= 1);
        assert(!isset($this->tracking_number) || strlen($this->tracking_number) <= 255);
        assert(!isset($this->tracking_status) || strlen($this->tracking_status) >= 1);
        assert(!isset($this->tracking_status) || strlen($this->tracking_status) <= 255);
        assert(!isset($this->note) || strlen($this->note) >= 1);
        assert(!isset($this->note) || strlen($this->note) <= 2000);
        assert(!isset($this->posted_time) || strlen($this->posted_time) >= 20);
        assert(!isset($this->posted_time) || strlen($this->posted_time) <= 64);
    }
}
