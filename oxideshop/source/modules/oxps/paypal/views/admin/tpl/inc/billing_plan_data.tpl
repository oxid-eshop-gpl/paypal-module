[{assign var="subscriptionPlansList" value=$oView->getSubscriptionPlans()}]

[{if $subscriptionPlansList}]

[{foreach from=$subscriptionPlansList item=value key=name}]
<table cellspacing="0" cellpadding="0" border="0" width="98%" style="border: 1px solid #cccccc; padding: 10px; margin: 10px; border-radius: 10px;">
    <tbody>
    <tr>
        <td colspan="100"><h3>Billing Plan: [{$value->name}]</h3></td>
    </tr>
    <tr>
        <td class="edittext" style="width: 196px;">Description:</td>
        <td class="edittext">[{$value->description}]</td>
    </tr>
    <tr>
        <td class="edittext">Automatically Bill Outstanding:</td>
        <td class="edittext">[{if $value->payment_preferences->auto_bill_outstanding == true}]Yes[{else}]No[{/if}]</td>
    </tr>
    <tr>
        <td class="edittext">Setup Fee:</td>
        <td class="edittext">[{$value->payment_preferences->setup_fee->value}]</td>
    </tr>
    <tr>
        <td class="edittext">Setup Fee Failure Action:</td>
        <td class="edittext">[{$value->payment_preferences->setup_fee_failure_action}]</td>
    </tr>
    <tr>
        <td class="edittext">Payment Failure Threshold:</td>
        <td class="edittext">[{$linkedSubscriptionPlan->payment_preferences->payment_failure_threshold}]</td>
    </tr>
    <tr>
        <td class="edittext">Tax Percentage:</td>
        <td class="edittext">[{$value->taxes->percentage}]</td>
    </tr>
    <tr>
        <td class="edittext">Tax Inclusive:</td>
        <td class="edittext">[{if $value->taxes->inclusive == 1}]Yes[{else}]No[{/if}]</td>
    </tr>
    <tr>
        <td class="edittext">PayPal ID:</td>
        <td class="edittext">[{$value->id}]</td>
    </tr>

    <tr>
        <td colspan="100"><h3>Assigned Billing Cycles</h3></td>
    </tr>

    <tr>
        <td colspan="100">
            <table style="width: 50%;">
                <tr>
                    <th style="width: 20%; text-align: left">Price</th>
                    <th style="width: 20%; text-align: left">Frequency</th>
                    <th style="width: 20%; text-align: left">Tenure</th>
                    <th style="width: 15%; text-align: left">Sequence</th>
                    <th style="width: 15%; text-align: left">Cycles</th>
                </tr>

                [{foreach from=$value->billing_cycles item=billing_cycle key=name}]
                <tr class="cycleData">
                    <td align="left">[{$billing_cycle->pricing_scheme->fixed_price->currency_code}] [{$billing_cycle->pricing_scheme->fixed_price->value}]</td>
                    <td align="left">[{$billing_cycle->frequency->interval_count}] [{$billing_cycle->frequency->interval_unit}]</td>
                    <td align="left">[{$billing_cycle->tenure_type}]</td>
                    <td align="left">[{$billing_cycle->sequence}]</td>
                    <td align="left">[{$billing_cycle->total_cycles}]</td>
                </tr>
                [{/foreach}]
            </table>
        </td>
    </tr>
    </tbody>
</table>
[{/foreach}]
[{else}]
<h3>No Billing Plans</h3>

[{/if}]