<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\BaseService;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Plan;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\PlanCollection;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\PlanRequestPOST;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Subscription;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionActivateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCancelRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCollection;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionRequestPost;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionReviseRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionReviseResponse;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionSaveRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionSuspendRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\TransactionsList;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\UpdatePricingSchemesListRequest;

class Subscriptions extends BaseService
{
    protected $basePath = '/v1/billing';

    public function createPlan(PlanRequestPOST $planRequest, $prefer = 'return=minimal'): Plan
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($planRequest, true);
        $response = $this->send('POST', "/plans", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Plan());
    }

    public function listPlans(
        $payPalSubjectAccount,
        $productId,
        $planIds,
        $totalRequired = false,
        $page = 1,
        $pageSize = 10,
        $prefer = 'return=minimal'
    ): PlanCollection {
        $headers = [];
        $headers['PayPal-Subject-Account'] = $payPalSubjectAccount;
        $headers['Prefer'] = $prefer;

        $body = null;
        $response = $this->send('GET', "/plans", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new PlanCollection());
    }

    public function showPlanDetails($payPalSubjectAccount, $id, $version): Plan
    {
        $headers = [];
        $headers['PayPal-Subject-Account'] = $payPalSubjectAccount;

        $body = null;
        $response = $this->send('GET', "/plans/{$id}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Plan());
    }

    public function updatePlan($id, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/plans/{$id}", $headers, $body);
    }

    public function replacePlan($id, Plan $plan): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($plan, true);
        $response = $this->send('PUT', "/plans/{$id}", $headers, $body);
    }

    public function activatePlan($id): void
    {
        $headers = [];

        $body = null;
        $response = $this->send('POST', "/plans/{$id}/activate", $headers, $body);
    }

    public function deactivatePlan($id): void
    {
        $headers = [];

        $body = null;
        $response = $this->send('POST', "/plans/{$id}/deactivate", $headers, $body);
    }

    public function updatePricing($id, UpdatePricingSchemesListRequest $updatePricingSchemesListRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($updatePricingSchemesListRequest, true);
        $response = $this->send('POST', "/plans/{$id}/update-pricing-schemes", $headers, $body);
    }

    public function createSubscription(SubscriptionRequestPost $subscriptionRequest, $prefer = 'return=minimal'): Subscription
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($subscriptionRequest, true);
        $response = $this->send('POST', "/subscriptions", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Subscription());
    }

    public function listSubscriptions(
        $planIds,
        $statuses,
        $createdAfter,
        $createdBefore,
        $statusUpdatedBefore,
        $statusUpdatedAfter,
        $filter,
        $payerIds,
        $totalRequired = false,
        $page = 1,
        $pageSize = 10
    ): SubscriptionCollection {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/subscriptions", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubscriptionCollection());
    }

    public function showSubscriptionDetails($id, $fields): Subscription
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/subscriptions/{$id}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Subscription());
    }

    public function updateSubscription($id, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/subscriptions/{$id}", $headers, $body);
    }

    public function updateQuantityOfProductOrServiceInSubscription($id, SubscriptionReviseRequest $subscriptionReviseRequest): SubscriptionReviseResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionReviseRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/revise", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function saveSubscription($id, SubscriptionSaveRequest $subscriptionSaveRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionSaveRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/save", $headers, $body);
    }

    public function suspendSubscription($id, SubscriptionSuspendRequest $subscriptionSuspendRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionSuspendRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/suspend", $headers, $body);
    }

    public function cancelSubscription($id, SubscriptionCancelRequest $subscriptionCancelRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionCancelRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/cancel", $headers, $body);
    }

    public function activateSubscription($id, SubscriptionActivateRequest $subscriptionActivateRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionActivateRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/activate", $headers, $body);
    }

    public function captureAuthorizedPaymentOnSubscription($id, SubscriptionCaptureRequest $subscriptionCaptureRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($subscriptionCaptureRequest, true);
        $response = $this->send('POST', "/subscriptions/{$id}/capture", $headers, $body);
    }

    public function listTransactionsForSubscription($id, $startTime, $endTime): TransactionsList
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/subscriptions/{$id}/transactions", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new TransactionsList());
    }
}
