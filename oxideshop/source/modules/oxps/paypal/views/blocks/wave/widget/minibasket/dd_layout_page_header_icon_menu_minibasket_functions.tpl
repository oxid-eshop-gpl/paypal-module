[{*
[{$smarty.block.parent}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && $config->showPayPalMiniBasketButton()}]
    <div class="float-right">
        <div class="text-center paypal-button-or small">[{"OR"|oxmultilangassign|oxupper}]</div>
        [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonMiniBasket" buttonClass="small"}]
    </div>
[{/if}]
*}]