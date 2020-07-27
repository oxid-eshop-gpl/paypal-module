<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\BaseService;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Partner\CreateReferralDataResponse;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralData;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralDataResponse;

class Partner extends BaseService
{
    protected $basePath = '/v2/customer';

    public function createPartnerReferral(ReferralData $referralData): CreateReferralDataResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($referralData, true);
        $response = $this->send('POST', "/partner-referrals", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new CreateReferralDataResponse());
    }

    public function showReferralData($partnerReferralId): ReferralDataResponse
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/partner-referrals/{$partnerReferralId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new ReferralDataResponse());
    }
}
