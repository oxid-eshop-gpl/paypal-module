<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

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
     *
     * minLength: 1
     * maxLength: 16
     */
    public $number;

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
    public $issue_date;

    /**
     * @var string
     * The carrier code of the ticket issuer.
     *
     * minLength: 2
     * maxLength: 2
     */
    public $issuing_carrier_code;

    /**
     * @var string
     * The name of the travel agency that issued the ticket.
     *
     * minLength: 1
     * maxLength: 25
     */
    public $travel_agency_name;

    /**
     * @var string
     * The IATA number, also ARC number or ARC/IATA number. The unique code or number for the travel agency that
     * issued this ticket.
     *
     * minLength: 1
     * maxLength: 8
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

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->number) || Assert::minLength($this->number, 1, "number in AirlineTicket must have minlength of 1 $within");
        !isset($this->number) || Assert::maxLength($this->number, 16, "number in AirlineTicket must have maxlength of 16 $within");
        !isset($this->issue_date) || Assert::minLength($this->issue_date, 10, "issue_date in AirlineTicket must have minlength of 10 $within");
        !isset($this->issue_date) || Assert::maxLength($this->issue_date, 10, "issue_date in AirlineTicket must have maxlength of 10 $within");
        !isset($this->issuing_carrier_code) || Assert::minLength($this->issuing_carrier_code, 2, "issuing_carrier_code in AirlineTicket must have minlength of 2 $within");
        !isset($this->issuing_carrier_code) || Assert::maxLength($this->issuing_carrier_code, 2, "issuing_carrier_code in AirlineTicket must have maxlength of 2 $within");
        !isset($this->travel_agency_name) || Assert::minLength($this->travel_agency_name, 1, "travel_agency_name in AirlineTicket must have minlength of 1 $within");
        !isset($this->travel_agency_name) || Assert::maxLength($this->travel_agency_name, 25, "travel_agency_name in AirlineTicket must have maxlength of 25 $within");
        !isset($this->travel_agency_code) || Assert::minLength($this->travel_agency_code, 1, "travel_agency_code in AirlineTicket must have minlength of 1 $within");
        !isset($this->travel_agency_code) || Assert::maxLength($this->travel_agency_code, 8, "travel_agency_code in AirlineTicket must have maxlength of 8 $within");
        !isset($this->fare) || Assert::isInstanceOf($this->fare, Money::class, "fare in AirlineTicket must be instance of Money $within");
        !isset($this->fare) || $this->fare->validate(AirlineTicket::class);
        !isset($this->tax) || Assert::isInstanceOf($this->tax, Money::class, "tax in AirlineTicket must be instance of Money $within");
        !isset($this->tax) || $this->tax->validate(AirlineTicket::class);
        !isset($this->fee) || Assert::isInstanceOf($this->fee, Money::class, "fee in AirlineTicket must be instance of Money $within");
        !isset($this->fee) || $this->fee->validate(AirlineTicket::class);
    }

    public function __construct()
    {
    }
}
