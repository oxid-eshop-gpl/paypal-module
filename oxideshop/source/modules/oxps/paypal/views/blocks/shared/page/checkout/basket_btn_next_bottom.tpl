[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive()}]
    <div class="float-right">
        [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalPayButtonNextCart2" buttonClass="small" paymentStrategy="continue"}]
    </div>
    <div class="float-right paypal-button-or">
        [{"OR"|oxmultilangassign|oxupper}]
    </div>
[{/if}]
[{$smarty.block.parent}]