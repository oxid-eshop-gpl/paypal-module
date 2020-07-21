<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

/**
 * A captured payment.
 */
class Capture extends \CaptureStatus implements \JsonSerializable
{
    /** @var string */
    public $id;

    /** @var Money */
    public $amount;

    /** @var ParentTransaction */
    public $parent_transaction;

    /** @var string */
    public $invoice_id;

    /** @var string */
    public $custom_id;

    /** @var SellerProtection */
    public $seller_protection;

    /** @var boolean */
    public $final_capture;

    /** @var SellerReceivableBreakdown */
    public $seller_receivable_breakdown;

    /** @var string */
    public $disbursement_mode;

    /** @var Error */
    public $error;

    /** @var array */
    public $links;

    /** @var ProcessorResponse */
    public $processor_response;

    /** @var SupplementaryData */
    public $supplementary_data;

    /** @var string */
    public $create_time;

    /** @var string */
    public $update_time;

    public function jsonSerialize()
    {
        return array_filter((array) $this,static function($var){return isset($var);});
    }
}
