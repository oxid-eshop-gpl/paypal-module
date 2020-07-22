<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The third-party claims properties.
 *
 * generated from: response-external_case_properties.json
 */
class ExternalCaseProperties implements JsonSerializable
{
    use BaseModel;

    /** The customer disputed the transaction at the issuing bank. */
    const EXTERNAL_TYPE_BANK_RETURN = 'BANK_RETURN';

    /** The customer requested to reverse the ELV transaction at the issuing bank. */
    const EXTERNAL_TYPE_DIRECT_DEBIT_REVERSAL = 'DIRECT_DEBIT_REVERSAL';

    /** The customer disputed the transaction with the credit card processor. */
    const EXTERNAL_TYPE_CREDIT_CARD_DISPUTE = 'CREDIT_CARD_DISPUTE';

    /** The dispute amount is debited from the merchant. */
    const RECOVERY_TYPE_RECOVERED_FROM_SELLER = 'RECOVERED_FROM_SELLER';

    /** The dispute amount is debited from the customer. */
    const RECOVERY_TYPE_RECOVERED_FROM_BUYER = 'RECOVERED_FROM_BUYER';

    /** The merchant or customer is not liable for the dispute. */
    const RECOVERY_TYPE_NO_RECOVERY = 'NO_RECOVERY';

    /**
     * @var string
     * The external claim ID.
     */
    public $reference_id;

    /**
     * @var string
     * The partner-supported external type.
     *
     * use one of constants defined in this class to set the value:
     * @see EXTERNAL_TYPE_BANK_RETURN
     * @see EXTERNAL_TYPE_DIRECT_DEBIT_REVERSAL
     * @see EXTERNAL_TYPE_CREDIT_CARD_DISPUTE
     */
    public $external_type;

    /**
     * @var string
     * The type of recovery on the external dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see RECOVERY_TYPE_RECOVERED_FROM_SELLER
     * @see RECOVERY_TYPE_RECOVERED_FROM_BUYER
     * @see RECOVERY_TYPE_NO_RECOVERY
     */
    public $recovery_type;

    /**
     * @var Money
     * The currency and amount for a financial transaction, such as a balance or payment due.
     */
    public $reversal_fee;
}
