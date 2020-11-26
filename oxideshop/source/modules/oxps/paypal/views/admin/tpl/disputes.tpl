[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]
[{assign var="where" value=$oView->getListFilter()}]
<div class="container-fluid">
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

    <form method="post" action="[{$oViewConf->getSelfLink()}]">
        [{include file="_formparams.tpl" cl="PayPalDisputeController" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
        <div id="filters">
            [{if !empty($error)}]
            <div class="alert alert-danger" role="alert">
            [{$error}]
            </div>
            [{/if}]
            <div class="row ppaltmessages">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="transactionIdFilter">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_TRANSACTION_ID"}]</label>
                        <input type="text"
                               class="form-control"
                               id="transactionIdFilter"
                               name="filters[transactionId]"
                               value="[{$filters.transactionId}]">
                    </div>
                </div>
            </div>
            <div class="row ppmessages">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="startTimeFilter">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_START_TIME"}]</label>
                        <input type="datetime-local"
                               class="form-control"
                               id="startTimeFilter"
                               name="filters[startTime]"
                               value="[{$filters.startTime}]">
                    </div>
                </div>
            </div>
            <div class="row ppaltmessages">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="disputeStateFilter">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATE"}]</label>
                        <select multiple class="form-control" id="disputeStateFilter" name="filters[disputeState][]">
                            <option value="REQUIRED_ACTION" [{if in_array("REQUIRED_ACTION", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_REQUIRED_ACTION"}]</option>
                            <option value="REQUIRED_OTHER_PARTY_ACTION" [{if in_array("REQUIRED_OTHER_PARTY_ACTION", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_REQUIRED_OTHER_PARTY_ACTION"}]</option>
                            <option value="UNDER_PAYPAL_REVIEW" [{if in_array("UNDER_PAYPAL_REVIEW", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_UNDER_PAYPAL_REVIEW"}]</option>
                            <option value="RESOLVED" [{if in_array("RESOLVED", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_RESOLVED"}]</option>
                            <option value="OPEN_INQUIRIES" [{if in_array("OPEN_INQUIRIES", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_OPEN_INQUIRIES"}]</option>
                            <option value="APPEALABLE" [{if in_array("APPEALABLE", $filters.disputeState)}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_APPEALABLE"}]</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row ppmessages">
                <div class="col-sm-4">
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
                </div>
            </div>
        </div>
    </form>
    <div id="results">
    <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;language=[{$actlang}]&amp;editlanguage=[{$actlang}]">[{oxmultilang ident="OXPS_PAYPAL_FIRST"}]</a></li>
            [{if $nextPageToken}]
                <li class="page-item"><a class="page-link" href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;language=[{$actlang}]&amp;editlanguage=[{$actlang}]&amp;pagetoken=[{$nextPageToken}]">[{oxmultilang ident="OXPS_PAYPAL_NEXT"}]</a></li>
            [{/if}]
        </ul>
    </nav>
    <table class="table table-sm">
        <thead>
            <tr class="ppaltmessages">
                <th>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_ID"}]</a></th>
                <th>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REASON"}]</a></th>
                <th>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS"}]</a></th>
                <th>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_AMOUNT"}]</a></th>
                <th>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_CREATE_TIME"}]</a></th>
                <th colspan="2">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_UPDATE_TIME"}]</a></th>
            </tr>
        </thead>
        <tbody>
        [{foreach from=$disputes->items item="dispute"}]
            [{cycle values='ppmessages,ppaltmessages' assign=cellClass}]
            <tr>
                <td class="[{$cellClass}]">[{$dispute->dispute_id}]</td>
                <td class="[{$cellClass}]">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REASON_"|cat:$dispute->reason}]</td>
                <td class="[{$cellClass}]">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_"|cat:$dispute->status}]</td>
                <td class="[{$cellClass}]">[{$dispute->dispute_amount->value}]&nbsp;[{$dispute->dispute_amount->currency_code}]</td>
                <td class="[{$cellClass}]">[{$dispute->create_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                <td class="[{$cellClass}]">[{$dispute->update_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                <td class="[{$cellClass}]">
                    <a href="[{$oViewConf->getSelfLink()|cat:"cl=PaypalDisputeDetailsController&oxid="|cat:$dispute->dispute_id}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MORE"}]
                    </a>
                </td>
            </tr>
        [{/foreach}]
        </tbody>
    </table>
    <nav>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;language=[{$actlang}]&amp;editlanguage=[{$actlang}]">[{oxmultilang ident="OXPS_PAYPAL_FIRST"}]</a></li>
            [{if $nextPageToken}]
            <li class="page-item"><a class="page-link" href="[{$oViewConf->getSelfLink()}]&cl=[{$oViewConf->getActiveClassName()}]&amp;language=[{$actlang}]&amp;editlanguage=[{$actlang}]&amp;pagetoken=[{$nextPageToken}]">[{oxmultilang ident="OXPS_PAYPAL_NEXT"}]</a></li>
            [{/if}]
        </ul>
    </nav>
</div>
</div>
</body>
</html>
