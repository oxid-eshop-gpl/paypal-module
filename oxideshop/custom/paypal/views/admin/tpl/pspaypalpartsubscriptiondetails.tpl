[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="sSelfLink" value=$oViewConf->getSelfLink()|replace:"&amp;":"&"}]
[{assign var="payPalParentSubscriptionOrder" value=$order->getParentSubscriptionOrder($order->getId())}]

[{if $oViewConf->getTopActiveClassName()|lower=="paypalordercontroller"}]
    <form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="cl" value="[{$oViewConf->getTopActiveClassName()}]">
    </form>
[{/if}]

<div class="container-fluid">
    <p>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRITION_PART_NOTE" suffix="COLON"}] [{$payPalParentSubscriptionOrder->oxorder__oxordernr->value}]</p>
</div>
[{include file="bottomitem.tpl"}]

