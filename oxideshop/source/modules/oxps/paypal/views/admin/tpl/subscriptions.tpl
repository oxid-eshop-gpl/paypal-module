[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]

<div class="container-fluid">
    <br />
    <div class="row">
        <div class="col-sm-1">
            <button id="toggleFilter" class="btn btn-info col-sm-12">Filter</button>
        </div>
    </div>
    <script>
        jQuery(document).ready(function(){
            jQuery("#filters").hide();
            jQuery("#results").show();
            jQuery("#toggleFilter").click(function(e) {
                e.preventDefault();
                jQuery("#filters").toggle();
                jQuery("#results").toggle();
            });
        });
    </script>
    <br />
    <div id="filters">
        <form method="post" action="[{$oViewConf->getSelfLink()}]">
            [{include file="_formparams.tpl" cl="PayPalSubscriptionController" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]

            [{if !empty($error)}]
        <div class="alert alert-danger" role="alert">
            [{$error}]
        </div>
        [{/if}]
        <div class="row ppaltmessages">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionIdFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</label>
                    <input type="text"
                           id="subscriptionIdFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalid]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalid}][{$where.oxps_paypal_subscription.oxpspaypalid}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionPlanIdFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID"}]</label>
                    <input type="text"
                           id="subscriptionPlanIdFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalplanid]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalplanid}][{$where.oxps_paypal_subscription.oxpspaypalplanid}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionEmailFilter">[{oxmultilang ident="OXPS_PAYPAL_EMAIL"}]</label>
                    <input type="text"
                           id="subscriptionEmailFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalemail]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalemail}][{$where.oxps_paypal_subscription.oxpspaypalemail}][{/if}]">
                </div>
            </div>
        </div>
        <div class="row ppmessages">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionStatusFilterFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</label>
                    [{assign var="subscriptionStatusFilter" value=$where.oxps_paypal_subscription.oxpspaypalstatus}]
                    <select name="where[oxps_paypal_subscription][oxpspaypalstatus]" id="subscriptionStatusFilterFilter" class="form-control">
                        <option value="" [{if !$subscriptionStatusFilter}]selected[{/if}]>
                        </option>
                        <option value="APPROVAL_PENDING" [{if $subscriptionStatusFilter == "APPROVAL_PENDING"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_APPROVAL_PENDING"}]
                        </option>
                        <option value="APPROVED" [{if $subscriptionStatusFilter == "APPROVED"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_APPROVED"}]
                        </option>
                        <option value="ACTIVE" [{if $subscriptionStatusFilter == "ACTIVE"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_ACTIVE"}]
                        </option>
                        <option value="SUSPENDED" [{if $subscriptionStatusFilter == "SUSPENDED"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_SUSPENDED"}]
                        </option>
                        <option value="CANCELLED" [{if $subscriptionStatusFilter == "CANCELLED"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_CANCELLED"}]
                        </option>
                        <option value="EXPIRED" [{if $subscriptionStatusFilter == "EXPIRED"}]selected[{/if}]>
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_EXPIRED"}]
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionStatusFilterUpdatedFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_UPDATED"}]</label>
                    <input type="date"
                           id="subscriptionStatusFilterUpdatedFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalstatusupdatetime]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalstatusupdatetime}][{$where.oxps_paypal_subscription.oxpspaypalstatusupdatetime}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionStartsFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STARTS"}]</label>
                    <input type="date"
                           id="subscriptionStartsFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalstarttime]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalstarttime}][{$where.oxps_paypal_subscription.oxpspaypalstarttime}][{/if}]">
                </div>
            </div>
        </div>
            <div class="row ppaltmessages">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionUpdatedFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UPDATED"}]</label>
                    <input type="date"
                           id="subscriptionUpdatedFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalupdatetime]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalupdatetime}][{$where.oxps_paypal_subscription.oxpspaypalupdatetime}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="subscriptionCreatedFilter">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_CREATED"}]</label>
                    <input type="date"
                           id="subscriptionCreatedFilter"
                           class="form-control"
                           name="where[oxps_paypal_subscription][oxpspaypalcreatetime]"
                           value="[{if $where.oxps_paypal_subscription.oxpspaypalcreatetime}][{$where.oxps_paypal_subscription.oxpspaypalcreatetime}][{/if}]">
                </div>
            </div>
        </div>
            <div class="row ppmessages">
            <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
            </div>
        </form>
    </div>

[{include file="paypal_list_pagination.tpl"}]
    <div id="results">
<table class="table table-sm">
    <thead>
        <tr class="ppaltmessages">
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_EMAIL"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_UPDATED"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STARTS"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UPDATED"}]</a></th>
            <th colspan="2">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_CREATED"}]</a></th>
        </tr>
    </thead>
    <tbody>
        [{foreach from=$subscriptions item="subscription" name="subscriptions"}]
            [{cycle values='ppmessages,ppaltmessages' assign=cellClass}]
            <tr class="[{$cellClass}]">
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalid}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalplanid}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalemail}]</td>
                [{assign var="subscriptionStatus" value=$subscription->oxps_paypal_subscription__oxpspaypalstatus}]
                <td>[{if $subscriptionStatus}] [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_"|cat:$subscriptionStatus}][{/if}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalstatusupdatetime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalstarttime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalupdatetime}]</td>
                <td>[{$subscription->oxps_paypal_subscription__oxpspaypalcreatetime}]</td>
                <td>
                    <a href="[{$detailsLink|cat:"&amp;oxid="|cat:$subscription->getId()}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MORE"}]
                    </a>
                </td>
            </tr>
        [{/foreach}]
    </tbody>
</table>
    </div>
[{include file="paypal_list_pagination.tpl"}]
</div>
</body>
</html>
