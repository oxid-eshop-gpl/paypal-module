[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    [{*
        PSPAYPAL-492 For more about $paymentStrategy, see ViewConfig->getPayPalJsSdkUrl()
        //@Todo Change value of $paymentStrategy back to 'pay_now'
        $buttonId (Button ID) not in use yet! Can be used to identify the context, e.g. in ViewConfig.
    *}]
    [{include file="pspaypalsmartpaymentbuttons.tpl" buttonId="PayPalButtonProductMain" paymentStrategy="continue" buttonClass="paypal-button-wrapper large" aid=$oDetailsProduct->oxarticles__oxid->value}]
[{/if}]
