<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * this is mandatory to be set
     * maxItems: 1
     * maxItems: 12
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->ticket) || Assert::isInstanceOf($this->ticket, AirlineTicket::class, "ticket in AirlineItinerary must be instance of AirlineTicket $within");
        !isset($this->ticket) || $this->ticket->validate(AirlineItinerary::class);
        !isset($this->passenger) || Assert::isInstanceOf($this->passenger, AirlinePassenger::class, "passenger in AirlineItinerary must be instance of AirlinePassenger $within");
        !isset($this->passenger) || $this->passenger->validate(AirlineItinerary::class);
        Assert::notNull($this->flight_leg_details, "flight_leg_details in AirlineItinerary must not be NULL $within");
         Assert::minCount($this->flight_leg_details, 1, "flight_leg_details in AirlineItinerary must have min. count of 1 $within");
         Assert::maxCount($this->flight_leg_details, 12, "flight_leg_details in AirlineItinerary must have max. count of 12 $within");
         Assert::isArray($this->flight_leg_details, "flight_leg_details in AirlineItinerary must be array $within");

                                if (isset($this->flight_leg_details)){
                                    foreach ($this->flight_leg_details as $item) {
                                        $item->validate(AirlineItinerary::class);
                                    }
                                }
    }

    public function __construct()
    {
    }
}
