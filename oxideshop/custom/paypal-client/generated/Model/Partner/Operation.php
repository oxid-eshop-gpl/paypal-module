<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The required operation to share data.
 *
 * generated from: referral_data-operation.json
 */
class Operation implements JsonSerializable
{
    use BaseModel;

    /** The operation used by partner request permission for customers api access. */
    public const OPERATION_API_INTEGRATION = 'API_INTEGRATION';

    /** Captured state of an order. */
    public const OPERATION_BANK_ADDITION = 'BANK_ADDITION';

    /** The operation to create a billing agreement. */
    public const OPERATION_BILLING_AGREEMENT = 'BILLING_AGREEMENT';

    /** The operation to create a contextual marketing consent. */
    public const OPERATION_CONTEXTUAL_MARKETING_CONSENT = 'CONTEXTUAL_MARKETING_CONSENT';

    /**
     * The operation to enable for the customer. To enable the collection of the API permissions that you require to
     * integrate with the customer, specify `API_INTEGRATION`. `BANK_ADDITION` is supported only for the US.
     *
     * use one of constants defined in this class to set the value:
     * @see OPERATION_API_INTEGRATION
     * @see OPERATION_BANK_ADDITION
     * @see OPERATION_BILLING_AGREEMENT
     * @see OPERATION_CONTEXTUAL_MARKETING_CONSENT
     * @var string | null
     * minLength: 1
     * maxLength: 255
     */
    public $operation;

    /**
     * The integration details for the partner and customer relationship. Required if `operation` is
     * `API_INTEGRATION`.
     *
     * @var IntegrationDetails | null
     */
    public $api_integration_preference;

    /**
     * The details of the billing agreement between the partner and a seller.
     *
     * @var BillingAgreement | null
     */
    public $billing_agreement;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        !isset($this->operation) || Assert::minLength(
            $this->operation,
            1,
            "operation in Operation must have minlength of 1 $within"
        );
        !isset($this->operation) || Assert::maxLength(
            $this->operation,
            255,
            "operation in Operation must have maxlength of 255 $within"
        );
        !isset($this->api_integration_preference) || Assert::isInstanceOf(
            $this->api_integration_preference,
            IntegrationDetails::class,
            "api_integration_preference in Operation must be instance of IntegrationDetails $within"
        );
        !isset($this->api_integration_preference) ||  $this->api_integration_preference->validate(Operation::class);
        !isset($this->billing_agreement) || Assert::isInstanceOf(
            $this->billing_agreement,
            BillingAgreement::class,
            "billing_agreement in Operation must be instance of BillingAgreement $within"
        );
        !isset($this->billing_agreement) ||  $this->billing_agreement->validate(Operation::class);
    }

    private function map(array $data)
    {
        if (isset($data['operation'])) {
            $this->operation = $data['operation'];
        }
        if (isset($data['api_integration_preference'])) {
            $this->api_integration_preference = new IntegrationDetails($data['api_integration_preference']);
        }
        if (isset($data['billing_agreement'])) {
            $this->billing_agreement = new BillingAgreement($data['billing_agreement']);
        }
    }

    public function __construct(array $data = null)
    {
        if (isset($data)) { $this->map($data); }
    }
}
