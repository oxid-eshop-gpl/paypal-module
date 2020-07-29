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

class Payments extends BaseService
{
    protected $basePath = '/v2/payments';

    public function authorizePayment(AuthorizationRequest $authorizeRequest, $prefer = 'return=minimal'): Authorization
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($authorizeRequest, true);
        $response = $this->send('POST', "/authorizations", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function showDetailsForAuthorizedPayment($authorizationId): Authorization
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/authorizations/{$authorizationId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function captureAuthorizedPayment($authorizationId, CaptureRequest $capture, $prefer = 'return=minimal'): Capture
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($capture, true);
        $response = $this->send('POST', "/authorizations/{$authorizationId}/capture", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Capture());
    }

    public function reauthorizeAuthorizedPayment($authorizationId, ReauthorizeRequest $reauthorizeRequest, $prefer = 'return=minimal'): Authorization
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($reauthorizeRequest, true);
        $response = $this->send('POST', "/authorizations/{$authorizationId}/reauthorize", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Authorization());
    }

    public function voidAuthorizedPayment($authorizationId, $payPalAuthAssertion): void
    {
        $headers = [];
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;

        $body = null;
        $response = $this->send('POST', "/authorizations/{$authorizationId}/void", $headers, $body);
    }

    public function captureSavedOrderDirectly(OrderCaptureRequest $capture, $prefer = 'return=minimal'): Capture
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['Prefer'] = $prefer;

        $body = json_encode($capture, true);
        $response = $this->send('POST', "/captures", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Capture());
    }

    public function showCapturedPaymentDetails($captureId): Capture
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/captures/{$captureId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Capture());
    }

    public function refundCapturedPayment($captureId, RefundRequest $refundRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Refund
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;

        $body = json_encode($refundRequest, true);
        $response = $this->send('POST', "/captures/{$captureId}/refund", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Refund());
    }

    public function showRefundDetails($refundId): Refund
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/refunds/{$refundId}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Refund());
    }
}
