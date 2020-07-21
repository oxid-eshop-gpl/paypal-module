<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

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
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Transaction;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\TransactionsList;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\UpdatePricingSchemesListRequest;

class Subscriptions
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

    public function createPlan(PlanRequestPOST $planRequest, $prefer = 'return=minimal'): Plan
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode(array_filter((array)$planRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/plans", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
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
        $request = $this->client->createRequest('GET', "/v1/billing/plans", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new PlanCollection());
    }

    public function showPlanDetails($payPalSubjectAccount, $id, $version): Plan
    {
        $headers = [];
        $headers['PayPal-Subject-Account'] = $payPalSubjectAccount;

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/billing/plans/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function updatePlan($id, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$patchRequest), true);
        $request = $this->client->createRequest('PATCH', "/v1/billing/plans/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function replacePlan($id, Plan $plan)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$plan), true);
        $request = $this->client->createRequest('PUT', "/v1/billing/plans/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function activatePlan($id)
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('POST', "/v1/billing/plans/{$id}/activate", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function deactivatePlan($id)
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('POST', "/v1/billing/plans/{$id}/deactivate", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function updatePricing($id, UpdatePricingSchemesListRequest $updatePricingSchemesListRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$updatePricingSchemesListRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/plans/{$id}/update-pricing-schemes", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Plan());
    }

    public function createSubscription(SubscriptionRequestPost $subscriptionRequest, $prefer = 'return=minimal'): Subscription
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode(array_filter((array)$subscriptionRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
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
        $request = $this->client->createRequest('GET', "/v1/billing/subscriptions", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionCollection());
    }

    public function showSubscriptionDetails($id, $fields): Subscription
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/billing/subscriptions/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Subscription());
    }

    public function updateSubscription($id, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$patchRequest), true);
        $request = $this->client->createRequest('PATCH', "/v1/billing/subscriptions/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Subscription());
    }

    public function updateQuantityOfProductOrServiceInSubscription($id, SubscriptionReviseRequest $subscriptionReviseRequest): SubscriptionReviseResponse
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionReviseRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/revise", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function saveSubscription($id, SubscriptionSaveRequest $subscriptionSaveRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionSaveRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/save", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function suspendSubscription($id, SubscriptionSuspendRequest $subscriptionSuspendRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionSuspendRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/suspend", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function cancelSubscription($id, SubscriptionCancelRequest $subscriptionCancelRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionCancelRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/cancel", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function activateSubscription($id, SubscriptionActivateRequest $subscriptionActivateRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionActivateRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/activate", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new SubscriptionReviseResponse());
    }

    public function captureAuthorizedPaymentOnSubscription($id, SubscriptionCaptureRequest $subscriptionCaptureRequest): Transaction
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode(array_filter((array)$subscriptionCaptureRequest), true);
        $request = $this->client->createRequest('POST', "/v1/billing/subscriptions/{$id}/capture", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Transaction());
    }

    public function listTransactionsForSubscription($id, $startTime, $endTime): TransactionsList
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v1/billing/subscriptions/{$id}/transactions", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new TransactionsList());
    }
}
