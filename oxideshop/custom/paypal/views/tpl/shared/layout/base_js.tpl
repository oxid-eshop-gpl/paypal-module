[{if $oViewConf->isPayPalActive()}]
    [{if $submitCart}]
    <script>
        document.getElementById('orderConfirmAgbBottom').submit();
    </script>
    [{/if}]
    [{if $oViewConf->getTopActiveClassName()|lower == 'account_order'}]
        [{capture assign="stornoButtons"}]
            // todo set on click to "button with class subscriptionCancelButton"
            // AJAX-Call by click to ProxyController sendCancelRequest
            // if success, set button to disabled and the button text to data-successtext="[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UNSUBSCRIBE_SEND"}]"
        [{/capture}]
        [{oxscript add=$stornoButtons}]
    [{/if}]
[{/if}]
