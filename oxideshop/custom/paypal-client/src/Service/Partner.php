<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Partner\CreateReferralDataResponse;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralData;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralDataResponse;

class Partner
{
    /** @var Client */
    public $client;

    /**
     * @param $client Client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createPartnerReferral(ReferralData $referralData): CreateReferralDataResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$referralData), true);
        $request = $this->client->createRequest('POST', "/v2/customer/partner-referrals", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new CreateReferralDataResponse());
    }

    public function showReferralData($partnerReferralId): ReferralDataResponse
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/customer/partner-referrals/{$partnerReferralId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new ReferralDataResponse());
    }
}
