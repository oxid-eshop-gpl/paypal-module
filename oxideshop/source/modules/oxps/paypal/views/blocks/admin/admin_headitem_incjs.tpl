<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

[{if $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller" or $oViewConf->getTopActiveClassName()|lower=="paypaltransactioncontroller" or $oViewConf->getTopActiveClassName()|lower=="paypalbalancecontroller"}]
    <script type="text/javascript" src="[{$oViewConf->getModuleUrl('oxps/paypal', 'out/src/js/paypal-admin.min.js')}]"></script>
[{else}]
    [{$smarty.block.parent}]
[{/if}]

