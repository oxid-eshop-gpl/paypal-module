<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The details for the regulation under which the transaction is covered.
 *
 * generated from: response-regulation_info.json
 */
class RegulationInfo implements JsonSerializable
{
    use BaseModel;

    /** No regulation. */
    const REGULATION_COVERED_NONE = 'NONE';

    /** E regulation. */
    const REGULATION_COVERED_REG_E = 'REG_E';

    /** Z regulation. */
    const REGULATION_COVERED_REG_Z = 'REG_Z';

    /** ZCAD regulation. */
    const REGULATION_COVERED_REG_ZCAD = 'REG_ZCAD';

    /** PPBP regulation. */
    const REGULATION_COVERED_PPBP = 'PPBP';

    /** Deferred claim regulation. */
    const REGULATION_COVERED_DEFERRED_CLAIM = 'DEFERRED_CLAIM';

    /** LUX AGGR regulation. */
    const REGULATION_COVERED_LUX_AGGR = 'LUX_AGGR';

    /**
     * @var string
     * The regulation under which the transaction is covered.
     *
     * use one of constants defined in this class to set the value:
     * @see REGULATION_COVERED_NONE
     * @see REGULATION_COVERED_REG_E
     * @see REGULATION_COVERED_REG_Z
     * @see REGULATION_COVERED_REG_ZCAD
     * @see REGULATION_COVERED_PPBP
     * @see REGULATION_COVERED_DEFERRED_CLAIM
     * @see REGULATION_COVERED_LUX_AGGR
     * minLength: 1
     * maxLength: 255
     */
    public $regulation_covered;

    /**
     * @var string
     * The date and time, in [Internet date and time format](https://tools.ietf.org/html/rfc3339#section-5.6).
     * Seconds are required while fractional seconds are optional.<blockquote><strong>Note:</strong> The regular
     * expression provides guidance but does not reject all invalid dates.</blockquote>
     *
     * minLength: 20
     * maxLength: 64
     */
    public $resolution_sla;
}
