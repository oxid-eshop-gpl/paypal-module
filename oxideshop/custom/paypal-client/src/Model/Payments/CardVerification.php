<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Payments;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The API caller can opt in to verify the card through PayPal offered verification services (e.g. Smart Dollar
 * Auth, 3DS).
 *
 * generated from: MerchantCommonComponentsSpecification-v1-schema-card_verification.json
 */
class CardVerification implements JsonSerializable
{
    use BaseModel;

    /** The contingency surfaced as an additional security layer that helps prevent unauthorized card-not-present transactions and protects the merchant from exposure to fraud. */
    const METHOD_3D_SECURE = '3D_SECURE';

    /** Places a temporary hold on the card to ensure its validity. This process protects the merchant from exposure to fraud. This verification method will confirm that the address information or CVV included matches what the issuing bank has on file for the associated card, ensuring that only authorized card users are able to make purchases from you. */
    const METHOD_AVS_CVV = 'AVS_CVV';

    /**
     * @var string
     * use one of constants defined in this class to set the value:
     * @see METHOD_3D_SECURE
     * @see METHOD_AVS_CVV
     * minLength: 1
     * maxLength: 255
     */
    public $method;
}
