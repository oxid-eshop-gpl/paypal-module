[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive()}]
    [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalPayButtonNextCart2" buttonClass="float-right paypal-button-wrapper small" paymentStrategy="continue"}]
    <div class="float-right paypal-button-or">
        [{"OR"|oxmultilangassign|oxupper}]
    </div>
[{/if}]
[{if $loadingScreen == 'true'}]
    <div id="overlay"><div class="loader"></div></div>
    <script>
        alert("here");
        document.getElementById("overlay").style.display = "block";
    </script>
[{/if}]
[{$smarty.block.parent}]
