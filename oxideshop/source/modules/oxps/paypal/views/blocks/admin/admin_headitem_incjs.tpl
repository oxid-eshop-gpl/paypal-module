[{if $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller"}]
    <script id="paypal-js" src="https://www.sandbox.paypal.com/webapps/merchantboarding/js/lib/lightbox/partner.js"></script>
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('oxps/paypal', 'out/src/js/paypal-admin.min.js')}]"></script>
[{else}]
    [{$smarty.block.parent}]
[{/if}]

