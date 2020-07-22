<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The integration details for PayPal first party REST endpoints.
 *
 * generated from: RestApiIntegration_first_party_details
 */
class RestApiIntegrationFirstPartyDetails implements JsonSerializable
{
    use BaseModel;

    /**
     * @var array<string>
     * An array of features that partner can access, or use, in PayPal on behalf of the seller. The seller grants
     * permission for these features to the partner.
     */
    public $features;

    /**
     * @var string
     * S256 - The code verifier must be high-entropy cryptographic random string with a byte length of 43-128 range.
     *
     * minLength: 44
     * maxLength: 128
     */
    public $seller_nonce;

    public function validate()
    {
        assert(!isset($this->seller_nonce) || strlen($this->seller_nonce) >= 44);
        assert(!isset($this->seller_nonce) || strlen($this->seller_nonce) <= 128);
    }
}
