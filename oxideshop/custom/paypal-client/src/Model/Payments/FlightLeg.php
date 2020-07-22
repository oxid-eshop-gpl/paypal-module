<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the flight leg.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-flight_leg.json
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
     */
    public $carrier_code;

    /**
     * @var string
     * The service class to which the airline ticket applies.
     */
    public $service_class;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $departure_date;

    /**
     * @var string
     * The time, in the hh:mm 24 Hr format.
     */
    public $departure_time;

    /**
     * @var string
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
     */
    public $departure_airport;

    /**
     * @var string
     * The airport code, as defined by [IATA](https://www.iata.org/publications/Pages/code-search.aspx).
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
     */
    public $fare_basis_code;

    /**
     * @var string
     * The time, in the hh:mm 24 Hr format.
     */
    public $arrival_time;

    /**
     * @var string
     * A ticket in conjunction  with  another ticket, which together make up a single contract of carriage.
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
     */
    public $additional_notations;
}
