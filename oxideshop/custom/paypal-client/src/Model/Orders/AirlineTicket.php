<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The details for the airline ticket.
 */
class AirlineTicket
{
	/** @var string */
	public $number;

	/** @var OxidProfessionalServices\PayPal\Api\Model\DateNoTime */
	public $issue_date;

	/** @var string */
	public $issuing_carrier_code;

	/** @var string */
	public $travel_agency_name;

	/** @var string */
	public $travel_agency_code;

	/** @var boolean */
	public $restricted_ticket;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fare;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $tax;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Money */
	public $fee;
}
