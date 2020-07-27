<?php

namespace OxidProfessionalServices\PayPal\Api\Service;

use JsonMapper;
use OxidProfessionalServices\PayPal\Api\BaseService;
use OxidProfessionalServices\PayPal\Api\Client;
use OxidProfessionalServices\PayPal\Api\Model\Orders\Order;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderAuthorizeRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderValidateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PaymentContextData;
use OxidProfessionalServices\PayPal\Api\Model\Orders\PaymentDetailsRequest;

class Orders extends BaseService
{
    protected $basePath = '/v2/checkout';

    public function createOrder(OrderRequest $order, $payPalPartnerAttributionId, $payPalClientMetadataId, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';
        $headers['PayPal-Partner-Attribution-Id'] = $payPalPartnerAttributionId;
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = json_encode($order, true);
        $response = $this->send('POST', "/orders", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Order());
    }

    public function showOrderDetails($id): Order
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/orders/{$id}", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Order());
    }

    public function updateOrder($id, array $patchRequest): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($patchRequest, true);
        $response = $this->send('PATCH', "/orders/{$id}", $headers, $body);
    }

    public function validatePaymentMethod($payPalClientMetadataId, $id, OrderValidateRequest $orderValidateRequest): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($orderValidateRequest, true);
        $response = $this->send('POST', "/orders/{$id}/validate-payment-method", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
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
        $response = $this->send('POST', "/orders/{$id}/authorize", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
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
        $response = $this->send('POST', "/orders/{$id}/capture", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Order());
    }

    public function saveOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): Order
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = null;
        $response = $this->send('POST', "/orders/{$id}/save", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new Order());
    }

    public function voidOrder($payPalClientMetadataId, $id, $prefer = 'return=minimal'): void
    {
        $headers = [];
        $headers['PayPal-Client-Metadata-Id'] = $payPalClientMetadataId;
        $headers['Prefer'] = $prefer;

        $body = null;
        $response = $this->send('POST', "/orders/{$id}/void", $headers, $body);
    }

    public function getPaymentContextForAnOrder($orderId): PaymentContextData
    {
        $headers = [];

        $body = null;
        $response = $this->send('GET', "/payment-context", $headers, $body);
        $mapper = new JsonMapper();
        $jsonProduct = json_decode($response->getBody());
        return $mapper->map($jsonProduct, new PaymentContextData());
    }

    public function updatePaymentDetailsForTheOrder($id, PaymentDetailsRequest $paymentDetails): void
    {
        $headers = [];
        $headers['Content-Type'] = 'application/json';

        $body = json_encode($paymentDetails, true);
        $response = $this->send('POST', "/orders/{$id}/update-paymentDetails", $headers, $body);
    }
}
