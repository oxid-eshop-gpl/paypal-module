[{$smarty.block.parent}]
[{if $oViewConf->isPayPalActive()}]
    [{oxstyle include=$oViewConf->getModuleUrl('oxps/paypal', 'out/src/css/paypal.min.css')}]
[{/if}]

