[{if !$aVariantSelections.blPerfectFit}]
    [{$smarty.block.parent}]
    <br />
[{/if}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalButtonProductMain" paymentStrategy="continue" buttonClass="paypal-button-wrapper large" aid=$oDetailsProduct->oxarticles__oxid->value}]
[{/if}]
