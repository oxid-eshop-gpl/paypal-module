<?php

namespace OxidProfessionalServices\PayPal\Model\Partner;

/**
 * The preference to customize the web experience of the customer by overriding that is set at the Partner's Account.
 */
class PartnerConfigurationOverride
{
	/** @var string */
	public $partner_logo_url;

	/** @var string */
	public $return_url;

	/** @var string */
	public $return_url_description;

	/** @var string */
	public $action_renewal_url;

	/** @var boolean */
	public $show_add_credit_card;
}
