[{if !$oViewConf->isPaypalExclude()}]
    [{include file="wave/paypal_payment_option.tpl"}]
[{/if}]
[{$smarty.block.parent}]


