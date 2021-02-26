[{if $oDetailsProduct->getFPrice()}]
    [{if $aVariantSelections.blPerfectFit && $subscriptionPlan}]
        [{*<div id="overlay"><div class="loader"></div></div>*}]
        <div class="clearfix">
            <h4 class="paypal-subscription-headline">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION"}]</h4>
            <div class="paypal-subscription-desc">[{$subscriptionPlan->description}]</div>
            [{if $subscriptionPlan->payment_preferences->setup_fee->value != 0.0}]
                <div class="paypal-subscription-setupfee">
                    [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_SETUP_FEE" suffix="COLON"}]
                    [{$subscriptionPlan->payment_preferences->setup_fee->value}]
                    [{$subscriptionPlan->payment_preferences->setup_fee->currency_code}]
                </div>
            [{/if}]
            <ul class="list-unstyled">
                [{foreach from=$subscriptionPlan->billing_cycles item=billing_cycle key=name}]
                    <li>
                        [{$billing_cycle->pricing_scheme->fixed_price->value|number_format:2}] [{$billing_cycle->pricing_scheme->fixed_price->currency_code}] /
                        [{oxmultilang ident="OXPS_PAYPAL_FREQUENCY_"|cat:$billing_cycle->frequency->interval_unit}]
                        [{oxmultilang ident="OXPS_PAYPAL_FOR"}]
                        [{$billing_cycle->frequency->interval_count}]
                        [{oxmultilang ident="OXPS_PAYPAL_FREQUENCY_"|cat:$billing_cycle->frequency->interval_unit}]
                    </li>
                [{/foreach}]
            </ul>
        </div>
    [{/if}]
[{/if}]
[{$smarty.block.parent}]
