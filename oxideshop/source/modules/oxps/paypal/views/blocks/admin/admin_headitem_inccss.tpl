[{if
    $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypaltransactioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalbalancecontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiondetailscontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiontransactioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypaldisputedetailscontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypaldisputecontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscribecontroller"
}]
    [{assign var="sFileMTime" value=$oViewConf->getModulePath('oxps/paypal','out/src/css/paypal-admin.min.css')|filemtime}]
    [{oxstyle include="https://stackpath.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" priority=9}]
    [{oxstyle include=$oViewConf->getModuleUrl('oxps/paypal','out/src/css/paypal-admin.min.css')|cat:"?"|cat:$sFileMTime priority=10}]
    [{oxstyle}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]

