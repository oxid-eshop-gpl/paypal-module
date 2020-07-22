<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The airline itinerary details.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-airline_itinerary.json
 */
class AirlineItinerary implements JsonSerializable
{
    use BaseModel;

    /**
     * @var AirlineTicket
     * The details for the airline ticket.
     */
    public $ticket;

    /**
     * @var AirlinePassenger
     * The airline passenger details.
     */
    public $passenger;

    /**
     * @var array<FlightLeg>
     * An array of the airline itinerary legs.
     */
    public $flight_leg_details;

    /**
     * @var integer
     * For direct airline integration, numeric code to identify each clearing record message in those cases where
     * multiple clearing messages are allowed per authorized transaction. Applicable to multiple captures against an
     * authorization. In the case of single capture against an authorization, the value should be 1. Also, this value
     * must be less than or equal to the clearing count.
     */
    public $clearing_sequence;

    /**
     * @var integer
     * For direct airline integration, numeric code to identify the total number of multiple sequence clearing record
     * messages associated with a single authorization request. Applicable to multiple captures against an
     * authorization. In the case of single capture against an authorization the value should be 1.
     */
    public $clearing_count;
}
