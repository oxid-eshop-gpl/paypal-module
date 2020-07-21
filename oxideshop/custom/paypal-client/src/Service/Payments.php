<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Payments\Authorization;
use OxidProfessionalServices\PayPal\Api\Model\Payments\AuthorizationRequest;
use OxidProfessionalServices\PayPal\Api\Model\Payments\Capture;
use OxidProfessionalServices\PayPal\Api\Model\Payments\CaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Payments\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Payments\ReauthorizeRequest;
use OxidProfessionalServices\PayPal\Api\Model\Payments\Refund;
use OxidProfessionalServices\PayPal\Api\Model\Payments\RefundRequest;

class Payments
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

    public function authorizePayment(AuthorizationRequest $authorizeRequest, $prefer = 'return=minimal'): Authorization
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($authorizeRequest, true);
        $request = $this->client->createRequest('POST', "/v2/payments/authorizations", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function showDetailsForAuthorizedPayment($authorizationId): Authorization
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/payments/authorizations/{$authorizationId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function captureAuthorizedPayment($authorizationId, CaptureRequest $capture, $prefer = 'return=minimal'): Capture
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($capture, true);
        $request = $this->client->createRequest('POST', "/v2/payments/authorizations/{$authorizationId}/capture", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Capture());
    }

    public function reauthorizeAuthorizedPayment($authorizationId, ReauthorizeRequest $reauthorizeRequest, $prefer = 'return=minimal'): Authorization
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($reauthorizeRequest, true);
        $request = $this->client->createRequest('POST', "/v2/payments/authorizations/{$authorizationId}/reauthorize", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function voidAuthorizedPayment($authorizationId, $payPalAuthAssertion)
    {
        $headers = [];
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;

        $body = null;
        $request = $this->client->createRequest('POST', "/v2/payments/authorizations/{$authorizationId}/void", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function captureSavedOrderDirectly(OrderCaptureRequest $capture, $prefer = 'return=minimal'): Capture
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($capture, true);
        $request = $this->client->createRequest('POST', "/v2/payments/captures", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Capture());
    }

    public function showCapturedPaymentDetails($captureId): Capture
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/payments/captures/{$captureId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Capture());
    }

    public function refundCapturedPayment($captureId, RefundRequest $refundRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Refund
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;

        $body = json_encode($refundRequest, true);
        $request = $this->client->createRequest('POST', "/v2/payments/captures/{$captureId}/refund", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Refund());
    }

    public function showRefundDetails($refundId): Refund
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/payments/refunds/{$refundId}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new JsonMapper();
        return $mapper->map($jsonProduct, new Refund());
    }
}
