<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

class AirlineItinerary
{
	/** @var array */
	public $flight_leg_details;

	/** @var integer */
	public $clearing_sequence;

	/** @var integer */
	public $clearing_count;
}
