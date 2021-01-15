<div class="card-deck">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">[{oxmultilang ident="OXPS_PAYPAL_PAY"}]</h3>
        </div>
        <div class="card-body oxEqualized">
            [{if !$oViewConf->isPayPalSessionActive()}]
                <div class="text-left">
                    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonPaymentPage" buttonClass="col-md-4 col-12" paymentStrategy="continue"}]
                </div>
            [{else}]
                <div class="text-left">
                    [{oxmultilang ident="OXPS_PAYPAL_PAY_PROCESSED" args=$oViewConf->getSelfLink()|cat:"cl=PayPalProxyController&fnc=cancelPayPalPayment"}]
                </div>
                [{capture name="hide_payment"}]
                    [{literal}]
                        $(function () {
                            $('#payment > .card:first').hide();
                        });
                    [{/literal}]
                [{/capture}]
                [{oxscript add=$smarty.capture.hide_payment}]
            [{/if}]
        </div>
    </div>
</div>
