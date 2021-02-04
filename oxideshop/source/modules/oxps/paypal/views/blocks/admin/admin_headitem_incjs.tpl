[{if
    $oViewConf->getTopActiveClassName()|lower=="paypalconfigcontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypaltransactioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalbalancecontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiondetailscontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiontransactioncontroller" ||
    $oViewConf->getTopActiveClassName()|lower=="paypalsubscriptiontransactioncontroller"
}]
    [{assign var="sFileMTime" value=$oViewConf->getModulePath('oxps/paypal','out/src/js/paypal-admin.min.js')|filemtime}]
    [{oxscript include="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" priority=9}]
    [{oxscript include=$oViewConf->getModuleUrl('oxps/paypal','out/src/js/paypal-admin.min.js')|cat:"?"|cat:$sFileMTime priority=10}]
    [{oxscript}]
[{else}]
    [{$smarty.block.parent}]
[{/if}]