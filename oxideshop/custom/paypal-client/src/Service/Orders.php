<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderAuthorizeRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderValidateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PaymentContextData;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PaymentDetailsRequest;

class Orders
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

    public function createOrder(OrderRequest $order, $payPalPartnerAttributionId, $payPalClientMetadataId, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Partner-Attribution-Id'] = $payPalPartnerAttributionId;
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = json_encode($order, true);
        $request = $this->client->createRequest('POST', "/v2/checkout/orders", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function showOrderDetails($id): Order
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/checkout/orders/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function updateOrder($id, array $patchRequest)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $request = $this->client->createRequest('PATCH', "/v2/checkout/orders/{$id}", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function validatePaymentMethod($payPalClientMetadataId, $id, OrderValidateRequest $orderValidateRequest): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($orderValidateRequest, true);
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/validate-payment-method", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function authorizePaymentForOrder($payPalClientMetadataId, $id, OrderAuthorizeRequest $authorizeRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;

        $body = json_encode($authorizeRequest, true);
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/authorize", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function capturePaymentForOrder($payPalClientMetadataId, $id, OrderCaptureRequest $orderCaptureRequest, $payPalAuthAssertion, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Auth-Assertion'] = $payPalAuthAssertion;
        $headers['Prefer'] = $prefer;

        $body = json_encode($orderCaptureRequest, true);
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/capture", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function saveOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = null;
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/save", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function voidOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = null;
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/void", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new Order());
    }

    public function getPaymentContextForAnOrder($orderId): PaymentContextData
    {
        $headers = [];

        $body = null;
        $request = $this->client->createRequest('GET', "/v2/checkout/payment-context", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new PaymentContextData());
    }

    public function updatePaymentDetailsForTheOrder($id, PaymentDetailsRequest $paymentDetails)
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($paymentDetails, true);
        $request = $this->client->createRequest('POST', "/v2/checkout/orders/{$id}/update-paymentDetails", $headers, $body);
        $response = $this->client->send($request);
        $jsonProduct = json_decode($response->getBody());
        $mapper = new \JsonMapper();
        return $mapper->map($jsonProduct, new PaymentContextData());
    }
}
