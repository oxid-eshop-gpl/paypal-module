[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive()}]
    <div class="float-right">
        [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalPayButtonNextCart2" buttonClass="small"}]
    </div>
    <div class="float-right button-or">
        [{"OR"|oxmultilangassign|oxupper}]
    </div>
[{/if}]
[{$smarty.block.parent}]
