<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Subscriptions;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The frequency of the billing cycle.
 *
 * generated from: frequency.json
 */
class Frequency implements JsonSerializable
{
    use BaseModel;

    /** A daily billing cycle. */
    const INTERVAL_UNIT_DAY = 'DAY';

    /** A weekly billing cycle. */
    const INTERVAL_UNIT_WEEK = 'WEEK';

    /** A monthly billing cycle. */
    const INTERVAL_UNIT_SEMI_MONTH = 'SEMI_MONTH';

    /** A monthly billing cycle. */
    const INTERVAL_UNIT_MONTH = 'MONTH';

    /** A yearly billing cycle. */
    const INTERVAL_UNIT_YEAR = 'YEAR';

    /**
     * @var string
     * The interval at which the subscription is charged or billed.
     *
     * use one of constants defined in this class to set the value:
     * @see INTERVAL_UNIT_DAY
     * @see INTERVAL_UNIT_WEEK
     * @see INTERVAL_UNIT_SEMI_MONTH
     * @see INTERVAL_UNIT_MONTH
     * @see INTERVAL_UNIT_YEAR
     */
    public $interval_unit;

    /**
     * @var integer
     * The number of intervals after which a subscriber is billed. For example, if the `interval_unit` is `DAY` with
     * an `interval_count` of  `2`, the subscription is billed once every two days. The following table lists the
     * maximum allowed values for the `interval_count` for each `interval_unit`:<table><thead><tr><th><code>Interval
     * unit</code></th><th>Maximum interval count</th></tr></thead><tbody><tr><td><code>DAY</code></td><td
     * align="right">365</td></tr><tr><td><code>WEEK</code></td><td
     * align="right">52</td></tr><tr><td><code>MONTH</code></td><td
     * align="right">12</td></tr><tr><td><code>YEAR</code></td><td align="right">1</td></tr></tbody></table>
     */
    public $interval_count;
}