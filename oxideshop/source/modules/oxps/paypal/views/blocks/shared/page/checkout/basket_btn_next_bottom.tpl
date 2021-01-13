[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive()}]
    <div class="float-right">
        [{include file="paypal_smart_payment_buttons.tpl" buttonId="PayPalPayButtonNextCart2" buttonClass="small" paymentStrategy="continue"}]
    </div>
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
