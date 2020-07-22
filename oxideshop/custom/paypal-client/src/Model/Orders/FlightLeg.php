<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The details of the flight leg.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-flight_leg.json
 */
class FlightLeg implements JsonSerializable
{
    use BaseModel;

    /** Stopover allowed. */
    const STOPOVER_CODE_O = 'O';

    /** Stopover not allowed. */
    const STOPOVER_CODE_X = 'X';

    /**
     * @var string
     * The flight number of the current leg.
     *
     * minLength: 1
     * maxLength: 5
     */
    public $flight_code;

    /**
     * @var integer
     * The flight number of the current leg.
     */
    public $flight_number;

    /**
     * @var string
     * The IATA two-letter accounting code that identifies the carrier.
     *
     * minLength: 2
     * maxLength: 2
     */
    public $carrier_code;

    /**
     * @var string
     * The service class to which the airline ticket applies.
     *
     * minLength: 1
     * maxLength: 1
     */
    public $service_class;

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
    public $departure_date;

    /**
     * @var string
     * The time, in the hh:mm 24 Hr format.
     *
     * minLength: 5
     * maxLength: 5
     */
    public $departure_time;

    /**
     * @var string
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
     *
     * minLength: 3
     * maxLength: 4
     */
    public $departure_airport;

    /**
     * @var string
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
     *
     * minLength: 3
     * maxLength: 4
     */
    public $arrival_airport;

    /**
     * @var string
     * The one-letter code that indicates whether the passenger is entitled to make a stopover.
     *
     * use one of constants defined in this class to set the value:
     * @see STOPOVER_CODE_O
     * @see STOPOVER_CODE_X
     */
    public $stopover_code;

    /**
     * @var string
     * The code used by airline to identify a fare type and enable airline staff and travel agents to find the rules
     * for this ticket.
     *
     * minLength: 1
     * maxLength: 15
     */
    public $fare_basis_code;

    /**
     * @var string
     * The time, in the hh:mm 24 Hr format.
     *
     * minLength: 5
     * maxLength: 5
     */
    public $arrival_time;

    /**
     * @var string
     * A ticket in conjunction  with  another ticket, which together make up a single contract of carriage.
     *
     * minLength: 1
     * maxLength: 16
     */
    public $conjunction_ticket_number;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fare;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $tax;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $fee;

    /**
     * @var string
     * An endorsement or restriction on the ticket. An endorsement can be an agency-added notation or a mandatory
     * government required notation, such as a value-added tax. A restriction is a limitation based on the type of
     * fare, such as a ticket with a three-day minimum stay.
     *
     * minLength: 1
     * maxLength: 20
     */
    public $additional_notations;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->flight_code) || Assert::minLength($this->flight_code, 1, "flight_code in FlightLeg must have minlength of 1 $within");
        !isset($this->flight_code) || Assert::maxLength($this->flight_code, 5, "flight_code in FlightLeg must have maxlength of 5 $within");
        !isset($this->carrier_code) || Assert::minLength($this->carrier_code, 2, "carrier_code in FlightLeg must have minlength of 2 $within");
        !isset($this->carrier_code) || Assert::maxLength($this->carrier_code, 2, "carrier_code in FlightLeg must have maxlength of 2 $within");
        !isset($this->service_class) || Assert::minLength($this->service_class, 1, "service_class in FlightLeg must have minlength of 1 $within");
        !isset($this->service_class) || Assert::maxLength($this->service_class, 1, "service_class in FlightLeg must have maxlength of 1 $within");
        !isset($this->departure_date) || Assert::minLength($this->departure_date, 10, "departure_date in FlightLeg must have minlength of 10 $within");
        !isset($this->departure_date) || Assert::maxLength($this->departure_date, 10, "departure_date in FlightLeg must have maxlength of 10 $within");
        !isset($this->departure_time) || Assert::minLength($this->departure_time, 5, "departure_time in FlightLeg must have minlength of 5 $within");
        !isset($this->departure_time) || Assert::maxLength($this->departure_time, 5, "departure_time in FlightLeg must have maxlength of 5 $within");
        !isset($this->departure_airport) || Assert::minLength($this->departure_airport, 3, "departure_airport in FlightLeg must have minlength of 3 $within");
        !isset($this->departure_airport) || Assert::maxLength($this->departure_airport, 4, "departure_airport in FlightLeg must have maxlength of 4 $within");
        !isset($this->arrival_airport) || Assert::minLength($this->arrival_airport, 3, "arrival_airport in FlightLeg must have minlength of 3 $within");
        !isset($this->arrival_airport) || Assert::maxLength($this->arrival_airport, 4, "arrival_airport in FlightLeg must have maxlength of 4 $within");
        !isset($this->fare_basis_code) || Assert::minLength($this->fare_basis_code, 1, "fare_basis_code in FlightLeg must have minlength of 1 $within");
        !isset($this->fare_basis_code) || Assert::maxLength($this->fare_basis_code, 15, "fare_basis_code in FlightLeg must have maxlength of 15 $within");
        !isset($this->arrival_time) || Assert::minLength($this->arrival_time, 5, "arrival_time in FlightLeg must have minlength of 5 $within");
        !isset($this->arrival_time) || Assert::maxLength($this->arrival_time, 5, "arrival_time in FlightLeg must have maxlength of 5 $within");
        !isset($this->conjunction_ticket_number) || Assert::minLength($this->conjunction_ticket_number, 1, "conjunction_ticket_number in FlightLeg must have minlength of 1 $within");
        !isset($this->conjunction_ticket_number) || Assert::maxLength($this->conjunction_ticket_number, 16, "conjunction_ticket_number in FlightLeg must have maxlength of 16 $within");
        !isset($this->fare) || Assert::isInstanceOf($this->fare, Money::class, "fare in FlightLeg must be instance of Money $within");
        !isset($this->fare) || $this->fare->validate(FlightLeg::class);
        !isset($this->tax) || Assert::isInstanceOf($this->tax, Money::class, "tax in FlightLeg must be instance of Money $within");
        !isset($this->tax) || $this->tax->validate(FlightLeg::class);
        !isset($this->fee) || Assert::isInstanceOf($this->fee, Money::class, "fee in FlightLeg must be instance of Money $within");
        !isset($this->fee) || $this->fee->validate(FlightLeg::class);
        !isset($this->additional_notations) || Assert::minLength($this->additional_notations, 1, "additional_notations in FlightLeg must have minlength of 1 $within");
        !isset($this->additional_notations) || Assert::maxLength($this->additional_notations, 20, "additional_notations in FlightLeg must have maxlength of 20 $within");
    }

    public function __construct()
    {
    }
}
