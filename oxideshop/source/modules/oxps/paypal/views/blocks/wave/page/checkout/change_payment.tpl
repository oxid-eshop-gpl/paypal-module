[{include file="wave/paypal_payment_option.tpl"}]
[{if !$oViewConf->isPaypalSessionActive() || $oViewConf->isPaypalExclude()}]
    [{$smarty.block.parent}]
[{/if}]

