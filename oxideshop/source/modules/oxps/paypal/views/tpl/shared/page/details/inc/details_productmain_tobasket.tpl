[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    [{include file="pspaypalsmartpaymentbuttons.tpl" buttonId="PayPalButtonProductMain" paymentStrategy="pay_now" buttonClass="paypal-button-wrapper large" aid=$oDetailsProduct->oxarticles__oxid->value}]
[{/if}]
