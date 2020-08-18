[{$smarty.block.parent}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    <div class="details tobasket-input-group">
    <div class="text-center paypal-button-or large">[{"OR"|oxmultilangassign|oxupper}]</div>
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonProductMain" buttonCommit=true}]
    </div>
    <br/>
[{/if}]
