<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Partner\CreateReferralDataResponse;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralData;
use OxidProfessionalServices\PayPal\Api\Model\Partner\ReferralDataResponse;

class Partner extends BaseService
{
    protected $basePath = '/v2/customer';

    /**
     * Creates a partner referral that is shared by the API caller. The referrals contains the client's personal,
     * business, financial and operations that the partner wants to onbaord the client.
     *
     * @param $referralData mixed
     *
     * @throws ApiException
     * @return CreateReferralDataResponse
     */
    public function createPartnerReferral(ReferralData $referralData): CreateReferralDataResponse
    {
        $path = "/partner-referrals";

        $headers = [];
        $headers['Content-Type'] = 'application/json';


        $body = json_encode($referralData, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new CreateReferralDataResponse($jsonData);
    }

    /**
     * Shows details for referral data, by ID, that was shared by the API caller.
     *
     * @param $partnerReferralId string The ID of the partner-referrals data for which to show details.
     *
     * @throws ApiException
     * @return ReferralDataResponse
     */
    public function showReferralData($partnerReferralId): ReferralDataResponse
    {
        $path = "/partner-referrals/{$partnerReferralId}";



        $body = null;
        $response = $this->send('GET', $path, [], [], $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ReferralDataResponse($jsonData);
    }
}
