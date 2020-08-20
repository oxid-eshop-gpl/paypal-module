[{if !$oViewConf->isPaypalExclude()}]
<div class="panel panel-default">
    <div class="card">
        <div class="panel-heading">
            <h3 class="panel-title">[{oxmultilang ident="OXPS_PAYPAL_PAY"}]</h3>
        </div>
        <div class="panel-body">
            [{if !$oViewConf->isPaypalSessionActive()}]
            <div class="text-left">
                [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonPaymentPage" buttonClass="col-md-4 col-xs-12" buttonCommit=false}]
            </div>
            [{else}]
            <div class="text-left">
                [{oxmultilang ident="OXPS_PAYPAL_PAY_PROCESSED" args=$oViewConf->getSelfLink()|cat:"cl=PayPalProxyController&fnc=cancelPaypalPayment"}]
            </div>
            [{/if}]
        </div>
    </div>
</div>
[{/if}]