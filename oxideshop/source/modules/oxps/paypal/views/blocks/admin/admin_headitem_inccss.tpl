[{if $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller"
or $oViewConf->getTopActiveClassName()|lower=="paypaltransactioncontroller"
or $oViewConf->getTopActiveClassName()|lower=="paypalbalancecontroller"
or $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptioncontroller"
or $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiondetailscontroller"
or $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiontransactioncontroller"}]
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="[{$oViewConf->getModuleUrl('oxps/paypal', 'out/src/css/paypal-admin.min.css')}]" />
[{else}]
    [{$smarty.block.parent}]
[{/if}]

