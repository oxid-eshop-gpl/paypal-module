[{$smarty.block.parent}]
[{if $oViewConf->isPayPalActive()}]
    [{oxscript include=$oViewConf->getModuleUrl('oxps/paypal', 'out/src/js/paypal.min.js') priority=1}]
    [{if $submitCart}]
        <script>
            document.getElementById('orderConfirmAgbBottom').submit();
        </script>
    [{/if}]
[{/if}]