<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

class AirlineTicketDetail
{
	/** @var string */
	public $number;

	/** @var string */
	public $issuing_carrier_code;

	/** @var string */
	public $travel_agency_name;

	/** @var string */
	public $travel_agency_code;

	/** @var boolean */
	public $restricted_ticket;

	/** @var Money */
	public $fare;

	/** @var Money */
	public $tax;

	/** @var Money */
	public $fee;
}
