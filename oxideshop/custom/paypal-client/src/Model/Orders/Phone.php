<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * The phone number, in its canonical international [E.164 numbering plan format](https://www.itu.int/rec/T-REC-E.164/en).
 */
class Phone
{
	public $country_code;
	public $national_number;
	public $extension_number;
}
