[{$smarty.block.parent}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && $config->showPayPalProductDetailsButton()}]
    <div class="text-center button-or large">[{"OR"|oxmultilangassign|oxupper}]</div>
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="AmazonPayButtonProductMain"}]
    <br/>
[{/if}]
