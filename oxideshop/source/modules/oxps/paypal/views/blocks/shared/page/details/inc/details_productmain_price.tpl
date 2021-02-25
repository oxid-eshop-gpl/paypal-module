[{oxhasrights ident="SHOWARTICLEPRICE"}]
    <div id="overlay"><div class="loader"></div></div>
    [{block name="details_productmain_price_value"}]
        [{if $oDetailsProduct->getFPrice()}]
            <label id="productPrice" class="price-label">
                [{assign var="sFrom" value=""}]
                [{assign var="oPrice" value=$oDetailsProduct->getPrice()}]
                [{if $oDetailsProduct->isParentNotBuyable()}]
                    [{assign var="oPrice" value=$oDetailsProduct->getVarMinPrice()}]
                    [{if $oDetailsProduct->isRangePrice()}]
                        [{assign var="sFrom" value="PRICE_FROM"|oxmultilangassign}]
                    [{/if}]
                [{/if}]
                <span[{if $oDetailsProduct->getTPrice()}] class="text-danger"[{/if}]>
                    <span class="price-from">[{$sFrom}]</span>
                    <span class="price">
                        [{oxprice price=$oPrice currency=$currency}]
                    </span>
                    [{if $oView->isVatIncluded()}]
                        <span class="price-markup">*</span>
                    [{/if}]
                    <span class="d-none">
                        <span itemprop="price">[{oxprice price=$oPrice currency=$currency}]</span>
                    </span>
                </span>
            </label>
            [{if $aVariantSelections.blPerfectFit && $subscriptionPlan}]
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
        [{if $oDetailsProduct->loadAmountPriceInfo()}]
            [{include file="page/details/inc/priceinfo.tpl"}]
        [{/if}]
    [{/block}]
[{/oxhasrights}]
