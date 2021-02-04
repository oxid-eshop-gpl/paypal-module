[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive()}]
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalPayButtonNextCart2" buttonClass="float-right paypal-button-wrapper small" paymentStrategy="continue"}]
    <div class="float-right paypal-button-or">
        [{"OR"|oxmultilangassign|oxupper}]
    </div>
[{/if}]
[{$smarty.block.parent}]
