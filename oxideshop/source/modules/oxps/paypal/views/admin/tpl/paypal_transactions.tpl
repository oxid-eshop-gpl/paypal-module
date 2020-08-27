[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

<div class="container-fluid">
[{assign var="filters" value=$oView->getFilterValues()}]
<form method="post" id="transaction-filters" action="[{$oViewConf->getSelfLink()}]">
    [{include file="_formparams.tpl" cl="PayPalTransactionController" lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
    <div id="filters">
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionIdFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_ID"}]</label>
                    <input type="text"
                           id="transactionIdFilter"
                           class="form-control"
                           name="where[transactions][transactionId]"
                           value="[{if $filters.transactionId}][{$filters.transactionId}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="terminalIdFilter">[{oxmultilang ident="OXPS_PAYPAL_TERMINAL_ID"}]</label>
                    <input type="text"
                           id="terminalIdFilter"
                           class="form-control"
                           name="where[transactions][terminalId]"
                           value="[{if $filters.terminalId}][{$filters.terminalId}][{/if}]">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="storeIdFilter">[{oxmultilang ident="OXPS_PAYPAL_STORE_ID"}]</label>
                    <input type="text"
                           id="storeIdFilter"
                           class="form-control"
                           name="where[transactions][storeId]"
                           value="[{if $filters.storeId}][{$filters.storeId}][{/if}]">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionStatusFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS"}]</label>
                    [{assign var="status" value=$filters.transactionStatus}]
                    <select class="form-control"
                            id="transactionStatusFilter"
                            name="where[transactions][transactionStatus]">
                        <option value="" [{if !$status}]selected[{/if}]></option>
                        <option value="D" [{if $status == "D"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_D"}]</option>
                        <option value="F" [{if $status == "F"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_F"}]</option>
                        <option value="P" [{if $status == "P"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_P"}]</option>
                        <option value="S" [{if $status == "S"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_S"}]</option>
                        <option value="V" [{if $status == "V"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_V"}]</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="transactionTypeFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_TYPE"}]</label>
                    <select class="form-control"
                            id="transactionTypeFilter"
                            name="where[transactions][transactionType]">
                        <option value=""></option>
                        [{foreach from=$eventCodes item="eventCodeGroup" key="codeGroupId"}]
                        <option value="[{$codeGroupId}]" disabled>
                            [{$codeGroupId}] - [{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_TYPE_GROUP_"|cat:$codeGroupId}]
                        </option>
                            [{foreach from=$eventCodeGroup item="eventCode"}]
                                <option value="[{$eventCode}]" [{if $filters.transactionType == $eventCode}]selected[{/if}]>
                                    [{$eventCode}] - [{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_TYPE_"|cat:$eventCode}]
                                </option>
                            [{/foreach}]
                        [{/foreach}]
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="transactionCurrencyFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_CURRENCY"}]</label>
                    <select class="form-control"
                            id="transactionCurrencyFilter"
                            name="where[transactions][transactionCurrency]">
                        <option value=""></option>
                        [{foreach from=$oViewConf->getPayPalCurrencyCodes() item="currencyCode"}]
                        <option value="[{$currencyCode}]" [{if $currencyCode == $filters.transactionCurrency}]selected[{/if}]>
                            [{$currencyCode}]
                        </option>
                        [{/foreach}]
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="paymentInstrumentTypeFilter">[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_INSTRUMENT_TYPE"}]</label>
                    <select class="form-control"
                            id="paymentInstrumentTypeFilter"
                            name="where[transactions][paymentInstrumentType]">
                        <option value="" [{if !$filters.paymentInstrumentType}]selected[{/if}]></option>
                        <option value="CREDITCARD" [{if $filters.paymentInstrumentType == "CREDITCARD"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_INSTRUMENT_CREDIT_CARD"}]</option>
                        <option value="DEBITCARD" [{if $filters.paymentInstrumentType == "DEBITCARD"}]selected[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_INSTRUMENT_DEBIT_CARD"}]</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="balanceAffectingRecordsFilter">[{oxmultilang ident="OXPS_PAYPAL_SHOW_BALANCE_AFFECTING_RECORDS"}]</label>
                    <select class="form-control"
                            id="balanceAffectingRecordsFilter"
                            name="where[transactions][balanceAffectingRecordsOnly]">
                        <option value="Y">[{oxmultilang ident="GENERAL_YES"}]</option>
                        <option value="N" [{if $filters.balanceAffectingRecordsOnly == 'N'}]selected[{/if}]>[{oxmultilang ident="GENERAL_NO"}]</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionDateFromFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_DATE_FROM"}]</label>
                    <input type="datetime-local"
                           id="transactionDateFromFilter"
                           class="form-control"
                           name="where[transactions][startDate]"
                           value="[{if $filters.startDate}][{$filters.startDate|date_format:"%Y-%m-%dT%H:%M"}][{/if}]" required>
                    <small class="form-text text-muted">
                        [{oxmultilang ident="OXPS_PAYPAL_DATE_SELECT_HELP"}]
                    </small>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="transactionDateToFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_DATE_TO"}]</label>
                    <input type="datetime-local"
                           id="transactionDateToFilter"
                           class="form-control"
                           name="where[transactions][endDate]"
                           value="[{if $filters.endDate}][{$filters.endDate|date_format:"%Y-%m-%dT%H:%M"}][{/if}]" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="transactionFromPriceFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_FROM_PRICE"}]</label>
                    <input type="number"
                           step="0.01"
                           min="0"
                           id="transactionFromPriceFilter"
                           class="form-control"
                           name="where[transactions][fromPrice]"
                           value="[{if $filters.fromPrice}][{$filters.fromPrice}][{/if}]">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="transactionToPriceFilter">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_TO_PRICE"}]</label>
                    <input type="number"
                           step="0.01"
                           min="0"
                           id="transactionToPriceFilter"
                           class="form-control"
                           name="where[transactions][toPrice]"
                           value="[{if $filters.toPrice}][{$filters.toPrice}][{/if}]">
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
    <a style="float: right"
       target="_blank"
       href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/pdf/PP_LRD_Gen_SettlementReport.pdf">
        [{oxmultilang ident="OXPS_PAYPAL_REPORT_REFERENCE"}]
    </a>
</form>

[{include file="paypal_list_pagination.tpl"}]
<table class="table table-sm">
    <thead>
        <tr>
            <th>[{oxmultilang ident="OXPS_PAYPAL_ACCOUNT_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_REFERENCE_ID"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_REFERENCE_ID_TYPE"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_EVENT_CODE"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_INITIATION_DATE"}]</a></th>
            <th>[{oxmultilang ident="OXPS_PAYPAL_UPDATED_DATE"}]</a></th>
            <th colspan="2">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS"}]</a></th>
        </tr>
    </thead>
    <tbody>
        [{assign var="transactions" value=$oView->getTransactions()}]
        [{foreach from=$transactions item="transaction" name="transactions"}]
            [{assign var="transactionInfo" value=$transaction->transaction_info}]
            <tr>
                <td>[{$transactionInfo->paypal_account_id}]</td>
                <td>[{$transactionInfo->transaction_id}]</td>
                <td>[{$transactionInfo->paypal_reference_id}]</td>
                <td>[{$transactionInfo->paypal_reference_id_type}]</td>
                <td>[{$transactionInfo->transaction_event_code}]</td>
                <td>[{$transactionInfo->transaction_initiation_date|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                <td>[{$transactionInfo->transaction_updated_date|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                [{assign var="status" value=$transactionInfo->transaction_status}]
                <td>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS_"|cat:$status}]</td>
                <td>
                    <a href="#"
                            type="button"
                            onclick="jQuery('#transactionDetailsRow[{$smarty.foreach.transactions.iteration}]').toggle(); return false;">
                        [{oxmultilang ident="OXPS_PAYPAL_MORE"}]
                    </a>
                </td>
            </tr>
            <tr style="display:none" id="transactionDetailsRow[{$smarty.foreach.transactions.iteration}]">
                <td colspan="9">
                    <table class="transaction-details">
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_PROTECTION_ELIGIBILITY"}]</td>
                            <td>[{$transactionInfo->protection_eligibility}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_INVOICE_ID"}]</td>
                            <td>[{$transactionInfo->invoice_id}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_SUBJECT"}]</td>
                            <td>[{$transactionInfo->transaction_subject}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_NOTE"}]</td>
                            <td>[{$transactionInfo->transaction_note}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_TRACKING_ID"}]</td>
                            <td>[{$transactionInfo->payment_tracking_id}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_BANK_REFERENCE_ID"}]</td>
                            <td>[{$transactionInfo->bank_reference_id}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_CUSTOM_FIELD"}]</td>
                            <td>[{$transactionInfo->custom_field}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_CREDIT_TERM"}]</td>
                            <td>[{$transactionInfo->credit_term}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_METHOD_TYPE"}]</td>
                            <td>[{$transactionInfo->payment_method_type}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_INSTRUMENT_TYPE"}]</td>
                            <td>[{$transactionInfo->instrument_type}]</td>
                        </tr>
                        <tr>
                            <td>[{oxmultilang ident="OXPS_PAYPAL_INSTRUMENT_SUB_TYPE"}]</td>
                            <td>[{$transactionInfo->instrument_sub_type}]</td>
                        </tr>
                    </table>
                </td>
            </tr>
        [{/foreach}]
    </tbody>
</table>
[{include file="paypal_list_pagination.tpl"}]
</div>
</body>
</html>
