[{if !$aVariantSelections.blPerfectFit}]
    [{$smarty.block.parent}]
    <br />
[{/if}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    <div class="details tobasket-input-group">
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonProductMain" paymentStrategy="continue" aid=$oDetailsProduct->oxarticles__oxid->value}]
    </div>
    <br/>
[{/if}]
