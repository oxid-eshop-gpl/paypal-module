[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

<div class="container-fluid">
<form method="post" action="[{$oViewConf->getSelfLink()}]">
    [{include file="_formparams.tpl" cl="PayPalSubscriptionController" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
    <div id="filters">
        [{if !empty($error)}]
        <div class="alert alert-danger" role="alert">
            [{$error}]
        </div>
        [{/if}]
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionIdFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</label>
                    <input type="text"
                           id="subscriptionIdFilter"
                           class="form-control"
                           name="where[subscriptionId]"
                           value="[{if $filters.subscriptionId}][{$filters.subscriptionId}][{/if}]">
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
</form>

[{include file="paypal_list_pagination.tpl"}]
<table class="table table-sm">
    <thead>
        <tr>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_EMAIL"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_UPDATED"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STARTS"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UPDATED"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_CREATED"}]</a></th>
        </tr>
    </thead>
    <tbody>
        [{foreach from=$subscriptions item="subscription" name="subscriptions"}]
            <tr>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalid}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalplanid}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalemail}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalstatus}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalstatusupdatetime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalstarttime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalupdatedtime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalcreatedtime}]</td>
                <td>
                    <a href="[{$detailsLink|cat:"&amp;oxid="|cat:$subscription->getId()}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MORE"}]
                    </a>
                </td>
            </tr>
        [{/foreach}]
    </tbody>
</table>
[{include file="paypal_list_pagination.tpl"}]
</div>
</body>
</html>
