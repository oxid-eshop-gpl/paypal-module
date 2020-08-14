[{if $sPaymentID == "oxidpaypal"}]
    [{assign var="sPaypalCheckoutSessionId" value=$oViewConf->getcheckoutOrderId()}]
    [{assign var="bActive" value=false}]
    [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]
        [{assign var="bActive" value=true}]
    [{/if}]
    <div class="well well-sm">
        <dl>
            <dt>
                <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]"
                [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]
                data-paypal-checkoutsessionid="[{$sPaypalCheckoutSessionId}]"
                >
                <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}]</b></label>
            </dt>
            <dd class="payment-option[{if $bActive}] activePayment[{/if}]" [{if $bActive}]style="display: block;"[{/if}]>
                [{if $bActive && !$sPaypalCheckoutSessionId}]
                    [{capture assign="sActivePaymentJS"}]
                        $(function () {
                            $("#payment_[{$sPaymentID}]").trigger( "click" );
                        });
                    [{/capture}]
                    [{oxscript add=$sActivePaymentJS}]
                [{/if}]
                [{if $paymentmethod->getPrice() && $paymentmethod->oxpayments__oxaddsum->rawValue != 0}]
                    [{if $oxcmp_basket->getPayCostNet()}]
                        [{$paymentmethod->getFNettoPrice()}] [{$currency->sign}] [{oxmultilang ident="OEPAYPAL_PLUS_VAT"}] [{$paymentmethod->getFPriceVat()}]
                    [{else}]
                        [{$paymentmethod->getFBruttoPrice()}] [{$currency->sign}]
                    [{/if}]
                [{/if}]
                <div class="paypalDescBox">
                    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonPaymentPage" buttonClass="small"}]
                </div>
            </dd>
        </dl>
    </div>
[{elseif $sPaymentID != "oxidpaypal"}]
    [{$smarty.block.parent}]
[{/if}]
