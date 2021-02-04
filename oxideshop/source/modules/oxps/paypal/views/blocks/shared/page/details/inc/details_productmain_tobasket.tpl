[{$smarty.block.parent}]
[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{if $config->isActive() && !$oViewConf->isPayPalSessionActive() && $config->showPayPalProductDetailsButton()}]
    <div class="details tobasket-input-group">
[{/if}]
[{/if}]
