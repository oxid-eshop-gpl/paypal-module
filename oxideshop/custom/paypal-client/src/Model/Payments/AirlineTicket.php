<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the airline ticket.
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-airline_ticket.json
 */
class AirlineTicket implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The airline-issued ticket number or ID.
     */
    public $number;

    /**
     * @var string
     * The stand-alone date, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6). To
     * represent special legal values, such as a date of birth, you should use dates with no associated time or
     * time-zone data. Whenever possible, use the standard `date_time` type. This regular expression does not
     * validate all dates. For example, February 31 is valid and nothing is known about leap years.
     */
    public $issue_date;

    /**
     * @var string
     * The carrier code of the ticket issuer.
     */
    public $issuing_carrier_code;

    /**
     * @var string
     * The name of the travel agency that issued the ticket.
     */
    public $travel_agency_name;

    /**
     * @var string
     * The IATA number, also ARC number or ARC/IATA number. The unique code or number for the travel agency that
     * issued this ticket.
     */
    public $travel_agency_code;

    /**
     * @var boolean
     * Indicates whether the ticket is restricted.
     */
    public $restricted_ticket;

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
}
