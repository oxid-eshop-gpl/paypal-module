<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
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

class Disputes extends BaseService
{
    protected $basePath = '/v1/customer';

    public function notifyPayPalAboutReferredDisputeAdjudicationUpdates($disputeId, AdjudicationInfo $adjudicationInfo): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($adjudicationInfo, true);
        $response = $this->send('POST', "/referred-disputes/{$disputeId}/process-adjudication-event", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function updateDisputeStatus($disputeId, RequireEvidence $requireEvidenceRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($requireEvidenceRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/require-evidence", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function notifyPayPalAboutRefundForReferredDispute($disputeId, RefundInfo $refundInfo): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($refundInfo, true);
        $response = $this->send('POST', "/referred-disputes/{$disputeId}/process-refund-event", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function determineDisputeEligibility(Eligibility $eligibilityRequest): DisputeEligibility
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($eligibilityRequest, true);
        $response = $this->send('POST', "/disputes/validate-eligibility", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
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
        $response = $this->send('GET', "/disputes", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new DisputeSearch());
    }

    public function createDispute(Dispute $dispute): DisputeCreate
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($dispute, true);
        $response = $this->send('POST', "/disputes", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new DisputeCreate());
    }

    public function appealDispute($disputeId, Evidences $evidence): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($evidence, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/appeal", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function createReferredDispute(DisputeCreateRequest $disputeCreateRequest): DisputeCreateResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($disputeCreateRequest, true);
        $response = $this->send('POST', "/referred-disputes", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new DisputeCreateResponse());
    }

    public function listReferredDisputes($createTimeBefore, $createTimeAfter, $pageToken, $status, $disputeFlows, $pageSize = 10): ReferredDisputes
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/referred-disputes", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new ReferredDisputes());
    }

    public function cancelDispute($disputeId, Cancel $cancelRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($cancelRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/cancel", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function escalateDisputeToClaim($disputeId, Escalate $escalateRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($escalateRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/escalate", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function settleDispute($disputeId, Adjudicate $adjudicateRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($adjudicateRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/adjudicate", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function showDisputeDetails($disputeId): Dispute
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/disputes/{$disputeId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Dispute());
    }

    public function partiallyUpdateDispute($disputeId, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/disputes/{$disputeId}", $headers, $body);
    }

    public function acceptClaim($disputeId, AcceptClaim $acceptClaimRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($acceptClaimRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/accept-claim", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function sendMessageAboutDisputeToOtherParty($disputeId, SendMessage $sendMessage): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($sendMessage, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/send-message", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function acknowledgeReturnedItem($disputeId, AcknowledgeReturnItem $acknowledgeReturnItemRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($acknowledgeReturnItemRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/acknowledge-return-item", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function computeMetricsForDisputes(Metrics $metricsRequest): Metrics
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($metricsRequest, true);
        $response = $this->send('POST', "/disputes/compute-metrics", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Metrics());
    }

    public function changeReasonForDispute($disputeId, ChangeReason $changeReason): DisputesChangeReason
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($changeReason, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/changeReason", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new DisputesChangeReason());
    }

    public function denyOfferToResolveDispute($disputeId, DenyOffer $denyOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($denyOfferRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/deny-offer", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function suggestionValuesForSearchText($searchText, $searchField): SuggestionResponse
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/disputes/search-suggestions", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SuggestionResponse());
    }

    public function determineEligibilityForReferredDisputeCreation(EligibilityRequest $eligibilityRequest): EligibilityResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($eligibilityRequest, true);
        $response = $this->send('POST', "/validate-referred-dispute-eligibility", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new EligibilityResponse());
    }

    public function showDisputeActionDetails($disputeId, $actionId): PartnerAction
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/disputes/{$disputeId}/partner-actions/{$actionId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new PartnerAction());
    }

    public function partiallyUpdateDisputeAction($disputeId, $actionId, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/disputes/{$disputeId}/partner-actions/{$actionId}", $headers, $body);
    }

    public function showReferredDisputeDetails($disputeId): Dispute
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/referred-disputes/{$disputeId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Dispute());
    }

    public function provideSupportingInformationForDispute($disputeId, ProvideSupportingInfo $provideSupportingInfoRequest, $supportingDocument): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($provideSupportingInfoRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/provide-supporting-info", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function makeOfferToResolveDispute($disputeId, MakeOffer $makeOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($makeOfferRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/make-offer", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function provideEvidence($disputeId, $evidence): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($evidence, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/provide-evidence", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }

    public function acceptOfferToResolveDispute($disputeId, AcceptOffer $acceptOfferRequest): SubsequentAction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($acceptOfferRequest, true);
        $response = $this->send('POST', "/disputes/{$disputeId}/accept-offer", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubsequentAction());
    }
}
