[{assign var="payPalSubscription" value=$order->getPayPalSubscriptionForHistory()}]
[{assign var="billingInfo" value=$payPalSubscription->billing_info}]
<p>
    [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION" suffix="COLON"}]
    [{foreach from=$order->getOrderArticles(true) item=orderitem name=testOrderItem}]
        <strong>[{$orderitem->oxorderarticles__oxtitle->value}]</strong><br>
    [{/foreach}]
    <strong>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_MAIN"}]</strong>
</p>
<table class="table table-sm">
    <tr>
        <th>[{oxmultilang ident="OXPS_PAYPAL_TENURE_TYPE"}]</th>
        <th>[{oxmultilang ident="OXPS_PAYPAL_SEQUENCE"}]</th>
        <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_COMPLETED"}]</th>
        <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_REMAINING"}]</th>
        [{*<th>[{oxmultilang ident="OXPS_PAYPAL_CURRENT_PRICING_SCHEME_VERSION"}]</th>*}]
        <th>[{oxmultilang ident="OXPS_PAYPAL_TOTAL_CYCLES"}]</th>
    </tr>
    [{foreach from=$billingInfo->cycle_executions item="cycleExecution"}]
        [{cycle values='ppmessages,ppaltmessages' assign=cellClass}]
        <tr class="[{$cellClass}]">
            <td>[{oxmultilang ident="OXPS_PAYPAL_TENURE_TYPE_"|cat:$cycleExecution->tenure_type}]</td>
            <td>[{$cycleExecution->sequence}]</td>
            <td>[{$cycleExecution->cycles_completed}]</td>
            <td>[{$cycleExecution->cycles_remaining}]</td>
            [{*<td>[{$cycleExecution->current_pricing_scheme_version}]</td>*}]
            <td>[{$cycleExecution->total_cycles}]</td>
        </tr>
    [{/foreach}]
</table>
<p>

</p>
