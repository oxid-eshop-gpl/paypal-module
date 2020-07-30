[{$smarty.block.parent}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && $config->showPayPalProductDetailsButton()}]
    <div style="width: 250px;">
    <div class="text-center paypal-button-or large">[{"OR"|oxmultilangassign|oxupper}]</div>
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonProductMain"}]
    </div>
    <br/>
[{/if}]
