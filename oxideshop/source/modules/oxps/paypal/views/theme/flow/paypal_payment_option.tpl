[{if !$oViewConf->isPaypalExclude()}]
<div class="panel panel-default">
    <div class="card">
        <div class="panel-heading">
            <h3 class="panel-title">[{oxmultilang ident="OXPS_PAYPAL_PAY"}]</h3>
        </div>
        <div class="panel-body">
            [{if !$oViewConf->isPaypalSessionActive()}]
            <div class="text-left">
                [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonPaymentPage" buttonClass="small" buttonCommit=false}]
            </div>
            [{else}]
            <div class="text-left">
                [{oxmultilang ident="OXPS_PAYPAL_PAY_PROCESSED" args="#"}]
            </div>
            [{/if}]
        </div>
    </div>
</div>
[{/if}]