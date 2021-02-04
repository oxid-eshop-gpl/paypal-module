[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

<div class="container-fluid">
    <form method="post" action="[{$oViewConf->getSelfLink()}]">
        <div id="filters">
            [{if !empty($error)}]
            <div class="alert alert-danger" role="alert">
                [{$error}]
            </div>
            [{/if}]
            <div class="row">
                [{include file="_formparams.tpl" cl="PayPalBalanceController" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
                <div class="col-sm-4 col-md-3">
                    <div class="form-group">
                        <label for="asOfTimeFilter">[{oxmultilang ident="OXPS_PAYPAL_AS_OF_TIME"}]</label>
                        <input type="datetime-local"
                               class="form-control"
                               id="asOfTimeFilter"
                               name="asOfTime"
                               value="[{if $oView->getAsOfTime()}][{$oView->getAsOfTime()}][{/if}]">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="currencyCodeFilter">[{oxmultilang ident="OXPS_PAYPAL_CURRENCY_CODE"}]</label>
                        <select class="form-control"
                                id="currencyCodeFilter"
                                name="currencyCode">
                            <option value=""></option>
                            [{assign var="selectedCurrencyCode" value=$oView->getCurrencyCode()}]
                            [{foreach from=$oViewConf->getPayPalCurrencyCodes() item="currencyCode"}]
                            <option value="[{$currencyCode}]" [{if $currencyCode == $selectedCurrencyCode}]selected[{/if}]>
                                [{$currencyCode}]
                            </option>
                            [{/foreach}]
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
                </div>
            </div>
        </div>
    </form>

    [{if isset($balances)}]
    <div id="balances">
        <div class="row">
            <div class="col-sm-5">
                <table class="table">
                    <tbody>
                    <tr><td>[{oxmultilang ident="OXPS_PAYPAL_ACCOUNT_ID"}]</td><td>[{$balances->account_id}]</td></tr>
                    <tr><td>[{oxmultilang ident="OXPS_PAYPAL_AS_OF_TIME"}]</td><td>[{$balances->as_of_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td></tr>
                    <tr><td>[{oxmultilang ident="OXPS_PAYPAL_LAST_REFRESH_TIME"}]</td><td>[{$balances->last_refresh_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_CURRENCY_CODE"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_AVAILABLE_BALANCE"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_WITHHELD_BALANCE"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_TOTAL_BALANCE"}]</th>
                        </tr>
                    </thead>
                    <tbody>
                    [{foreach from=$balances->balances item=balanceDetails}]
                        <tr>
                            <td>[{$balanceDetails->currency}][{if $balanceDetails->primary}] <small>([{oxmultilang ident="OXPS_PAYPAL_PRIMARY"}])</small>[{/if}]</td>
                            <td>[{$balanceDetails->available_balance->value}]</td>
                            <td>[{$balanceDetails->withheld_balance->value}]</td>
                            <td>[{$balanceDetails->total_balance->value}]</td>
                        </tr>
                    [{/foreach}]
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    [{/if}]
</div>
</body>
</html>