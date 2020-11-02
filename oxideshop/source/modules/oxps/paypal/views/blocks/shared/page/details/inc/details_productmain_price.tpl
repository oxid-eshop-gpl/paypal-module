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
                    [{if $aVariantSelections.blPerfectFit}]
                    <span>
                        <br />
                        <br />
                        Paypal Subscription
                        <br />
                        <small>
                        [{$aVariantSelections.oActiveVariant->oxarticles__oxvarselect->value}]
                        </small>
                    </span>
                    [{/if}]
                    [{if $oView->isVatIncluded()}]
                        <span class="price-markup">*</span>
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
