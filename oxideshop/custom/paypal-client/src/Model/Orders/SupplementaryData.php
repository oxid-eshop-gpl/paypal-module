<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The supplementary data.
 */
class SupplementaryData
{
	/** @var array */
	public $airline;

	/** @var OxidProfessionalServices\PayPal\Api\Model\Orders\PointOfSale */
	public $point_of_sale;
}
