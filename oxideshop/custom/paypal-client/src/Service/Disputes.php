<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\AcceptClaim;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\AcceptOffer;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\AcknowledgeReturnItem;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Adjudicate;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\AdjudicationInfo;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Cancel;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ChangeReason;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DenyOffer;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Dispute;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputeCreate;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputeCreateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputeCreateResponse;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputeEligibility;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputeSearch;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\DisputesChangeReason;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Eligibility;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\EligibilityRequest;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\EligibilityResponse;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Escalate;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Evidences;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\MakeOffer;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\Metrics;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\PartnerAction;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ProvideSupportingInfo;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ReferredDisputes;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\RefundInfo;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\RequireEvidence;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\SendMessage;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\SubsequentAction;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\SuggestionResponse;

class Disputes
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

    public function notifyPayPalAboutReferredDisputeAdjudicationUpdates($disputeId, AdjudicationInfo $adjudicationInfo): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$adjudicationInfo), true);
        $request = $this->client->createRequest('POST', "/v1/customer/referred-disputes/{$disputeId}/process-adjudication-event", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function updateDisputeStatus($disputeId, RequireEvidence $requireEvidenceRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$requireEvidenceRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/require-evidence", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function notifyPayPalAboutRefundForReferredDispute($disputeId, RefundInfo $refundInfo): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$refundInfo), true);
        $request = $this->client->createRequest('POST', "/v1/customer/referred-disputes/{$disputeId}/process-refund-event", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function determineDisputeEligibility(Eligibility $eligibilityRequest): DisputeEligibility
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$eligibilityRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/validate-eligibility", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new DisputeEligibility());
    }

    public function listDisputes(
        $accountNumber,
        $createTimeBefore,
        $disputeChannel,
        $sortOrder,
        $sortBy,
        $searchText,
        $disputeAmountLte,
        $disputeAmountGte,
        $disputeCurrency,
        $responseDueDateAfter,
        $responseDueDateBefore,
        $updateTimeAfter,
        $updateTimeBefore,
        $createTimeAfter,
        $disputeFlows,
        $statuses,
        $reasons,
        $name,
        $email,
        $invoiceNumber,
        $disputeState,
        $disputedTransactionId,
        $disputeLifeCycleStage,
        $page = 1,
        $pageSize = 10,
        $nextPageToken = 'The first page of data',
        $totalRequired = false,
        $fields = 'summary',
        $startTime = 'Current date and time'
    ): DisputeSearch {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/disputes", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new DisputeSearch());
    }

    public function createDispute(Dispute $dispute): DisputeCreate
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$dispute), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new DisputeCreate());
    }

    public function appealDispute($disputeId, Evidences $evidence): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$evidence), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/appeal", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function createReferredDispute(DisputeCreateRequest $disputeCreateRequest): DisputeCreateResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$disputeCreateRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/referred-disputes", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new DisputeCreateResponse());
    }

    public function listReferredDisputes($createTimeBefore, $createTimeAfter, $pageToken, $status, $disputeFlows, $pageSize = 10): ReferredDisputes
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/referred-disputes", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new ReferredDisputes());
    }

    public function cancelDispute($disputeId, Cancel $cancelRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$cancelRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/cancel", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function escalateDisputeToClaim($disputeId, Escalate $escalateRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$escalateRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/escalate", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function settleDispute($disputeId, Adjudicate $adjudicateRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$adjudicateRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/adjudicate", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function showDisputeDetails($disputeId): Dispute
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/disputes/{$disputeId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Dispute());
    }

    public function partiallyUpdateDispute($disputeId, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$patchRequest), true);
        $request = $this->client->createRequest('PATCH', "/v1/customer/disputes/{$disputeId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Dispute());
    }

    public function acceptClaim($disputeId, AcceptClaim $acceptClaimRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$acceptClaimRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/accept-claim", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function sendMessageAboutDisputeToOtherParty($disputeId, SendMessage $sendMessage): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$sendMessage), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/send-message", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function acknowledgeReturnedItem($disputeId, AcknowledgeReturnItem $acknowledgeReturnItemRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$acknowledgeReturnItemRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/acknowledge-return-item", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function computeMetricsForDisputes(Metrics $metricsRequest): Metrics
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$metricsRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/compute-metrics", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Metrics());
    }

    public function changeReasonForDispute($disputeId, ChangeReason $changeReason): DisputesChangeReason
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$changeReason), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/changeReason", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new DisputesChangeReason());
    }

    public function denyOfferToResolveDispute($disputeId, DenyOffer $denyOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$denyOfferRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/deny-offer", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function suggestionValuesForSearchText($searchText, $searchField): SuggestionResponse
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/disputes/search-suggestions", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SuggestionResponse());
    }

    public function determineEligibilityForReferredDisputeCreation(EligibilityRequest $eligibilityRequest): EligibilityResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$eligibilityRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/validate-referred-dispute-eligibility", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new EligibilityResponse());
    }

    public function showDisputeActionDetails($disputeId, $actionId): PartnerAction
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/disputes/{$disputeId}/partner-actions/{$actionId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new PartnerAction());
    }

    public function partiallyUpdateDisputeAction($disputeId, $actionId, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$patchRequest), true);
        $request = $this->client->createRequest('PATCH', "/v1/customer/disputes/{$disputeId}/partner-actions/{$actionId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new PartnerAction());
    }

    public function showReferredDisputeDetails($disputeId): Dispute
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/customer/referred-disputes/{$disputeId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Dispute());
    }

    public function provideSupportingInformationForDispute($disputeId, ProvideSupportingInfo $provideSupportingInfoRequest, $supportingDocument): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$provideSupportingInfoRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/provide-supporting-info", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function makeOfferToResolveDispute($disputeId, MakeOffer $makeOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$makeOfferRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/make-offer", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function provideEvidence($disputeId, $evidence): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$evidence), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/provide-evidence", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function acceptOfferToResolveDispute($disputeId, AcceptOffer $acceptOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$acceptOfferRequest), true);
        $request = $this->client->createRequest('POST', "/v1/customer/disputes/{$disputeId}/accept-offer", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubsequentAction());
    }
}
