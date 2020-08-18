[{if !$oViewConf->isPaypalExclude()}]
<div class="card-deck">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">[{oxmultilang ident="OXPS_PAYPAL_PAY"}]</h3>
        </div>
        <div class="card-body oxEqualized">
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