[{if !$oViewConf->isPaypalExclude()}]
    [{include file="flow/paypal_payment_option.tpl"}]
[{/if}]
[{$smarty.block.parent}]
