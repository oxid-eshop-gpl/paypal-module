[{if $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller"}]
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('oxps/paypal', 'out/src/js/paypal-admin.min.js')}]"></script>
[{else}]
    [{$smarty.block.parent}]
[{/if}]

