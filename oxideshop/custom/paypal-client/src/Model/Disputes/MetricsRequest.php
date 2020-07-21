<?php

namespace OxidProfessionalServices\PayPal\Model\Disputes;

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
