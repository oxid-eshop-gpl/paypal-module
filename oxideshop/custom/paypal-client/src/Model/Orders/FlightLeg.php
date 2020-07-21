<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details of the flight leg.
 */
class FlightLeg implements JsonSerializable
{
    use BaseModel;

    /** @var string */
    public $flight_code;

    /** @var integer */
    public $flight_number;

    /** @var string */
    public $carrier_code;

    /** @var string */
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

    /** @var string */
    public $departure_airport;

    /** @var string */
    public $arrival_airport;

    /** @var string */
    public $stopover_code;

    /** @var string */
    public $fare_basis_code;

    /**
     * @var string
     * The time, in the hh:mm 24 Hr format.
     */
    public $arrival_time;

    /** @var string */
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

    /** @var string */
    public $additional_notations;
}
