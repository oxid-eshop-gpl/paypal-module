<?php

namespace OxidProfessionalServices\PayPal\Api\Disputes;

/**
 * List disputes with metrics.
 */
class MetricsRequest
{
	/** @var string */
	public $dimension;

	/** @var string */
	public $measure;
}
