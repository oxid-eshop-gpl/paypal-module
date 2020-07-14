<?php

namespace OxidProfessionalServices\PayPal\Api;

use Exception;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;

class Order extends Client
{

    public function createOrder()
    {
        $header = ['Content-Type' => 'application/json',
            'Prefer' => 'return=representation'];
        $TRANSACTION_CUSTOM_VALUE = "1";
        $TRANSACTION_INVOICE_NUMBER = "1";
        $MERCHANT_BRAND_NAME = "oxidtest";
        $body = <<<"JSON"
{
    "intent": "CAPTURE",
"purchase_units": [
{
    "custom_id": "$TRANSACTION_CUSTOM_VALUE",
"invoice_id": "$TRANSACTION_INVOICE_NUMBER",
"description": "Your checkout at Fab Sales",
"soft_descriptor": "$MERCHANT_BRAND_NAME",
"amount": {
    "currency_code": "EUR",
"value": 57.4,
"breakdown": {
        "item_total": {
            "currency_code": "EUR",
"value": 47.84
},
"shipping": {
            "currency_code": "EUR",
"value": 0
},
"tax_total": {
            "currency_code": "EUR",
"value": 9.56
},
"handling": {
            "currency_code": "EUR",
"value": 0
},
"insurance": {
            "currency_code": "EUR",
"value": 0
},
"shipping_discount": {
            "currency_code": "EUR","value": 0
}
}
},
"items": [
{
    "name": "T-shirt blue",
"description": "loose blue shirt",
"sku": "",
"unit_amount": {
    "currency_code": "EUR",
"value": 19.12
},
"tax": {
    "currency_code": "EUR",
"value": 3.82
},
"quantity": 1,
"category": "PHYSICAL_GOODS"
},
{
    "name": "Sweater red",
"description": "Classical red sweater",
"sku": "",
"unit_amount": {
    "currency_code": "EUR",
"value": 28.72
},
"tax": {
    "currency_code": "EUR",
"value": 5.74
},
"quantity": 1,
"category": "PHYSICAL_GOODS"
}
],
"shipping": {
    "name": {
        "full_name": "Jane Doe"
},
"address": {
        "address_line_1": "Hauptstraße 1",
"address_line_2": "Hinterhof",
"admin_area_1": "Berlin",
"admin_area_2": "Berlin",
"country_code": "DE",
"postal_code": "10099"
}
},
"payment_instruction": {
    "disbursement_mode": "INSTANT"
},
"reference_id": "1"
}
],
"application_context": {
    "brand_name": "MERCHANT.BRAND_NAME",
"locale": "BUYER.LOCALE",
"shipping_preference": "SET_PROVIDED_ADDRESS",
"landing_page": "LOGIN",
"user_action": "CONTINUE_OR_PAY"
},
"payer": {
    "name": {
        "given_name": "Jane",
"surname": "Doe"
},
"email_address": "jane.doe@gmail.com",
"phone": {
        "phone_number": {
            "national_number": "49123456789"
},
"phone_type": "MOBILE"
},"address": {
        "address_line_1": "Hauptstraße 1",
"address_line_2": "Hinterhof",
"admin_area_1": "Berlin",
"admin_area_2": "Berlin",
"country_code": "DE",
"postal_code": "10099"
}
}
}
JSON;



        $request = $this->createRequest("POST", "/v2/checkout/orders", $header, $body);
        $res = $this->send($request);


        $res = json_decode('' . $res->getBody(), true);

        return $this;
    }
}
