[{oxhasrights ident="SHOWARTICLEPRICE"}]
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
                [{if $aVariantSelections.blPerfectFit}]
                <span>
                    <br />
                    <br />
                    <b>Paypal Subscription</b>
                    <br />
                    <br />
                    [{$subscriptionPlan->description}]
                    <br />
                    [{if $subscriptionPlan->payment_preferences->setup_fee->value != 0.0}]
                        Setup Fee: [{$subscriptionPlan->payment_preferences->setup_fee->value}] [{$subscriptionPlan->payment_preferences->setup_fee->currency_code}]
                        <br />
                    [{/if}]
                    [{foreach from=$subscriptionPlan->billing_cycles item=billing_cycle key=name}]
                        &bull; [{$billing_cycle->pricing_scheme->fixed_price->currency_code}] [{$billing_cycle->pricing_scheme->fixed_price->value}]/[{$billing_cycle->frequency->interval_unit}] for [{$billing_cycle->frequency->interval_count}] [{$billing_cycle->frequency->interval_unit}]
                        <br />
                    [{/foreach}]
                    <br />
                </span>
                [{/if}]
                <span class="d-none">
                    <span itemprop="price">[{oxprice price=$oPrice currency=$currency}]</span>
                </span>
        </label>
        [{/if}]
        [{if $oDetailsProduct->loadAmountPriceInfo()}]
            <h1>4</h1>
            [{include file="page/details/inc/priceinfo.tpl"}]
        [{/if}]
    [{/block}]
[{/oxhasrights}]
