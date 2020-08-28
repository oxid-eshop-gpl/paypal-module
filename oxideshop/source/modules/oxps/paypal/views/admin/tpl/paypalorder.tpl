[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{oxscript include="js/libs/jquery.min.js"}]
[{oxscript include=$oViewConf->getModuleUrl('oxps/paypal','out/src/js/paypal_order.js')}]
[{oxscript add="jQuery.noConflict();" priority=10}]

<style>
    .paypalActionsTable {
        border: 1px #A9A9A9;
        border-style: solid solid solid solid;
        padding: 5px;
    }

    #paypalOverlay {
        position: fixed;
        width: 100%;
        height: 2000px;
        opacity: 0.5;
        background: #ccc;
        top: 0;
        left: 0;
        display: none;
    }

    .paypalPopUp {
        position: fixed;
        background: #fff;
        left: 0;
        top: 100px;
        padding: 10px;
        min-width: 350px;
        max-width: 550px;
        z-index: 91;
        display: none;
        white-space: normal;
    }

    .paypalPopUp .paypalPopUpClose {
        position: absolute;
        top: 0;
        right: 0;
        border: 1px solid #000;
        padding: 3px 6px;
    }

    .paypalActionsButtons {
        text-align: right;
        margin-bottom: 0;
    }

    .paypalActionsBlockNotice textarea {
        width: 100%;
        height: 80px;
        margin: 0;
    }

    #paypalStatusList {
        display: none;
    }

    #paypalActionsBlocks {
        display: none;
    }

    #historyTable {
        border-spacing: 0;
        border-collapse: collapse;
        width: 98%;
    }

    a.popUpLink, a.actionLink {
        text-decoration: underline;
    }
</style>

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="PaypalOrderController">
</form>

[{if $order && $payPalOrder}]

    [{assign var="currency" value=$oView->getPaypalCurrency()}]

[{*
    [{assign var="orderActionManager" value=$oView->getOrderActionManager()}]
    [{assign var="orderPaymentActionManager" value=$oView->getOrderPaymentActionManager()}]
    [{assign var="orderPaymentStatusCalculator" value=$oView->getOrderPaymentStatusCalculator()}]
    [{assign var="orderPaymentStatusList" value=$oView->getOrderPaymentStatusList()}]
*}]
    <table width="98%" cellspacing="0" cellpadding="0" border="0">
    <tbody>
    <tr>
    <td class="edittext" valign="top">
        <table class="paypalActionsTable" width="98%">
            [{if $error}]
            <tr>
                <td colspan="2">
                    <div class="errorbox">[{$error}]</div>
                </td>
            </tr>
            [{/if}]
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_SHOP_PAYMENT_STATUS"}]:</td>
                <td class="edittext">
                    <b>[{oxmultilang ident='OXPS_PAYPAL_STATUS_'|cat:$oView->getPaypalPaymentStatus()}]</b>
                </td>
            </tr>
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_ORDER_PRICE"}]:</td>
                <td class="edittext">
                    <b>[{$oView->formatPrice($oView->getPaypalTotalOrderSum())}] [{$currency}]</b>
                </td>
            </tr>
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_CAPTURED_AMOUNT"}]:</td>
                <td class="edittext">
                    <b>[{$oView->formatPrice($oView->getPaypalCapturedAmount())}] [{$currency}]</b>
                </td>
            </tr>
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_REFUNDED_AMOUNT"}]:</td>
                <td class="edittext">
                    <b>[{$oView->formatPrice($oView->getPaypalRefundedAmount())}] [{$currency}]</b>
                </td>
            </tr>
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_CAPTURED_NET"}]:</td>
                <td class="edittext">
                    <b>[{$oView->formatPrice($oView->getPaypalRemainingRefundAmount())}] [{$currency}]</b>
                </td>
            </tr>
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_VOIDED_AMOUNT"}]:</td>
                <td class="edittext">
                    <b>[{$oView->formatPrice($oView->getPaypalVoidedAmount())}] [{$currency}]</b>
                </td>
            </tr>


            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_AUTHORIZATIONID"}]:</td>
                <td class="edittext">
                    <b>[{$oView->getPaypalAuthorizationId()}]</b>
                </td>
            </tr>

[{*
            [{if $orderActionManager->isActionAvailable('capture')}]
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_MONEY_CAPTURE"}]:</td>
                <td class="edittext">
                    <button id="captureButton" class="actionLink"
                            data-action="capture"
                            data-type="Complete"
                            data-amount="[{$payPalOrder->getRemainingOrderSum()}]"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('capture')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('capture')}]"
                            href="#">
                        [{oxmultilang ident="OXPS_PAYPAL_CAPTURE"}]
                    </button>
                </td>
            </tr>
            </tr>
            [{/if}]
            [{if $orderActionManager->isActionAvailable('void')}]
            <tr>
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_AUTHORIZATION"}]:</td>
                <td class="edittext">
                    <button id="voidButton" class="actionLink"
                            data-action="void"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('void')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('void')}]"
                            href="#">
                        [{oxmultilang ident="OXPS_PAYPAL_CANCEL_AUTHORIZATION"}]
                    </button>
                </td>
            </tr>
            [{/if}]
*}]
        </table>

        </br>
        <b>[{oxmultilang ident="OXPS_PAYPAL_PAYMENT_HISTORY"}]: </b>
        <table id="historyTable">
            <colgroup>
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
                <col width="20%">
            </colgroup>
            <tr>
                <td class="listheader first">[{oxmultilang ident="OXPS_PAYPAL_HISTORY_DATE"}]</td>
                <td class="listheader">[{oxmultilang ident="OXPS_PAYPAL_HISTORY_ACTION"}]</td>
                <td class="listheader">[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</td>
                <td class="listheader">
                    [{oxmultilang ident="OXPS_PAYPAL_HISTORY_PAYPAL_STATUS"}]
                    [{oxinputhelp ident="OXPS_PAYPAL_HISTORY_PAYPAL_STATUS_HELP"}]
                </td>
                <td class="listheader">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTIONID"}]</td>
                <td class="listheader">[{oxmultilang ident="OXPS_PAYPAL_HISTORY_ACTIONS"}]</td>
            </tr>
            [{foreach from=$oView->getPaypalHistory() item=listitem name=paypalHistory}]
            [{cycle values='listitem,listitem2' assign='class'}]
            <tr>
                <td valign="top" class="[{$class}]">[{$listitem.date}]</td>
                <td valign="top" class="[{$class}]">[{oxmultilang ident='OXPS_PAYPAL_'|cat:$listitem.action}]</td>
                <td valign="top" class="[{$class}]">
                    [{$oView->formatPrice($listitem.amount)}]
                    <small>[{$currency}]</small>
                </td>
                <td valign="top" class="[{$class}]">[{oxmultilang ident='OXPS_PAYPAL_STATUS_'|cat:$listitem.status}]</td>
                <td valign="top" class="[{$class}]">[{$listitem.transactionid}]</td>
                <td valign="top" class="[{$class}]">
                    <a class="popUpLink" href="#"
                       data-block="historyDetailsBlock[{$smarty.foreach.paypalHistory.index}]"><img
                                src="[{$oViewConf->getModuleUrl('oxps/paypal','out/img/ico-details.png')}]"
                                title="[{oxmultilang ident="OXPS_PAYPAL_DETAILS"}]"/></a>

                    <div id="historyDetailsBlock[{$smarty.foreach.paypalHistory.index}]" class="paypalPopUp">
                        <h3>[{oxmultilang ident="OXPS_PAYPAL_DETAILS"}] ([{$listitem.date}])</h3>

                        <p>
                            [{oxmultilang ident="OXPS_PAYPAL_HISTORY_PAYPAL_STATUS"}]: <b>[{oxmultilang ident='OXPS_PAYPAL_STATUS_'|cat:$listitem.status}]</b><br/>
                        </p>
                        <p>
                            <label>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTIONID"}]: </label><b>[{$listitem.transactionid}]</b><br/>
                        </p>
                        <p>
                            <label>[{oxmultilang ident="OXPS_PAYPAL_COMMENT"}]: </label><b>[{$listitem.comment}]</b><br/>
                        </p>
                    </div>
[{*
                    [{if $orderPaymentActionManager->isActionAvailable('refund', $listitem)}]
                    <a id="refundButton[{$smarty.foreach.paypalHistory.index}]" class="actionLink"
                       data-action="refund"
                       data-type="[{if $listitem->getRefundedAmount() > 0}]Partial[{else}]Full[{/if}]"
                       data-amount="[{$listitem->getRemainingRefundAmount()}]"
                       data-transid="[{$listitem.transactionid}]"
                       data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('refund')|@json_encode}]'
                       data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('refund')}]"
                       href="#">
                        <img src="[{$oViewConf->getModuleUrl('oxps/paypal','out/img/ico-refund.png')}]"
                             title="[{oxmultilang ident="OXPS_PAYPAL_REFUND"}]"/>
                    </a>
                    [{/if}]
*}]
                </td>
            </tr>
            [{/foreach}]
        </table>
        <p><b>[{oxmultilang ident="OXPS_PAYPAL_HISTORY_NOTICE"}]: </b>[{oxmultilang ident="OXPS_PAYPAL_HISTORY_NOTICE_TEXT"}]
        </p>
    </td>
    <td class="edittext" valign="top" align="left">
        <b>[{oxmultilang ident="OXPS_PAYPAL_ORDER_PRODUCTS"}]: </b>
        <table cellspacing="0" cellpadding="0" border="0" width="98%">
            <tr>
                <td class="listheader first">[{oxmultilang ident="GENERAL_SUM"}]</td>
                <td class="listheader" height="15">&nbsp;&nbsp;&nbsp;[{oxmultilang ident="GENERAL_ITEMNR"}]</td>
                <td class="listheader">&nbsp;&nbsp;&nbsp;[{oxmultilang ident="GENERAL_TITLE"}]</td>
                [{if $order->isNettoMode()}]
                <td class="listheader">[{oxmultilang ident="ORDER_ARTICLE_ENETTO"}]</td>
                [{else}]
                <td class="listheader">[{oxmultilang ident="ORDER_ARTICLE_EBRUTTO"}]</td>
                [{/if}]
                <td class="listheader">[{oxmultilang ident="GENERAL_ATALL"}]</td>
                <td class="listheader" colspan="3">[{oxmultilang ident="ORDER_ARTICLE_MWST"}]</td>
            </tr>
            [{assign var="blWhite" value=""}]
            [{foreach from=$order->getOrderArticles() item=listitem name=orderArticles}]
            [{if $listitem->oxorderarticles__oxstorno->value == 1}]
            [{assign var="listclass" value=listitem3}]
            [{else}]
            [{assign var="listclass" value=listitem$blWhite}]
            [{/if}]
            <tr id="art.[{$smarty.foreach.orderArticles.iteration}]">
                <td valign="top" class="[{$listclass}]">[{$listitem->oxorderarticles__oxamount->value}]</td>
                <td valign="top" class="[{$listclass}]" height="15">[{$listitem->oxorderarticles__oxartnum->value}]
                </td>
                <td valign="top" class="[{$listclass}]">[{$listitem->oxorderarticles__oxtitle->value|oxtruncate:20:""|strip_tags}]
                </td>
                [{if $order->isNettoMode()}]
                <td valign="top" class="[{$listclass}]">[{$listitem->getNetPriceFormated()}]
                    <small>[{$order->oxorder__oxcurrency->value}]</small>
                </td>
                <td valign="top" class="[{$listclass}]">[{$listitem->getTotalNetPriceFormated()}]
                    <small>[{$order->oxorder__oxcurrency->value}]</small>
                </td>
                [{else}]
                <td valign="top" class="[{$listclass}]">[{$listitem->getBrutPriceFormated()}]
                    <small>[{$order->oxorder__oxcurrency->value}]</small>
                </td>
                <td valign="top" class="[{$listclass}]">[{$listitem->getTotalBrutPriceFormated()}]
                    <small>[{$order->oxorder__oxcurrency->value}]</small>
                </td>
                [{/if}]
                <td valign="top" class="[{$listclass}]">[{$listitem->oxorderarticles__oxvat->value}]</td>
            </tr>
            [{if $blWhite == "2"}]
            [{assign var="blWhite" value=""}]
            [{else}]
            [{assign var="blWhite" value="2"}]
            [{/if}]
            [{/foreach}]
        </table>
    </td>
    </tr>
    </tbody>
    </table>
[{*
    <div id="paypalOverlay"></div>

    <div id="paypalActions" class="paypalPopUp">
        <form name="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="cl" value="oepaypalorder_paypal">
            <input type="hidden" name="fnc" value="processAction">
            <input type="hidden" name="oxid" value="[{$oxid}]">
            <input type="hidden" name="editval[category__oxid]" value="[{$oxid}]">
            <input type="hidden" name="action" value="">
            <input type="hidden" name="transaction_id" value="">
            <input type="hidden" name="full_amount" value="">

            <div id="paypalActionsContent"></div>
        </form>
    </div>
    <div id="paypalActionsBlocks">
        <div id="captureBlock" class="paypalActionsBlock">
            <h3>[{oxmultilang ident="OXPS_PAYPAL_MONEY_CAPTURE"}]</h3>

            <p class="paypalActionsBlockOptions">
                <label for="captureAmountInput">[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</label>:
                <select class="amountSelect" name="capture_type" data-input="captureAmountInput">
                    <option value="Complete"
                            data-disabled="1"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('capture')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('capture')}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MONEY_ACTION_FULL"}]
                    </option>
                    <option value="NotComplete"
                            data-disabled="0"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('capture_partial')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('capture_partial')}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MONEY_ACTION_PARTIAL"}]
                    </option>
                </select>
                <input id="captureAmountInput" type="text" class="editinput" name="capture_amount" size="10" value=""
                       disabled="disabled"> [{$currency}]
            </p>
            <div class="paypalStatusListPlaceholder"></div>
            <p class="paypalActionsBlockNotice">
                <label>[{oxmultilang ident="OXPS_PAYPAL_COMMENT"}]</label></br>
                <textarea name="action_comment"></textarea>
            </p>

            <p class="paypalActionsButtons">
                <input id="captureSubmit" type="submit" class="edittext" name="action_submit"
                       value="[{oxmultilang ident="OXPS_PAYPAL_CAPTURE"}]">
            </p>
        </div>

        <div id="voidBlock" class="paypalActionsBlock">
            <h3>[{oxmultilang ident="OXPS_PAYPAL_AUTHORIZATION"}]</h3>

            <div class="paypalStatusListPlaceholder"></div>
            <p class="paypalActionsBlockNotice">
                <label>[{oxmultilang ident="OXPS_PAYPAL_COMMENT"}]</label></br>
                <textarea name="action_comment"></textarea>
            </p>

            <p class="paypalActionsButtons">
                <input id="voidSubmit" type="submit" class="edittext" name="action_submit"
                       value="[{oxmultilang ident="OXPS_PAYPAL_CANCEL_AUTHORIZATION"}]">
            </p>
        </div>

        <div id="refundBlock" class="paypalActionsBlock">
            <h3>[{oxmultilang ident="OXPS_PAYPAL_MONEY_REFUND"}]:</h3>

            <p class="paypalActionsBlockOptions">
                <select class="amountSelect" name="refund_type" data-input="refundAmountInput">
                    <option value="Full"
                            data-disabled="1"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('refund')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('refund')}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MONEY_ACTION_FULL"}]
                    </option>
                    <option value="Partial"
                            data-disabled="0"
                            data-statuslist='[{$orderPaymentStatusList->getAvailableStatuses('refund_partial')|@json_encode}]'
                            data-activestatus="[{$orderPaymentStatusCalculator->getSuggestStatus('refund_partial')}]">
                        [{oxmultilang ident="OXPS_PAYPAL_MONEY_ACTION_PARTIAL"}]
                    </option>
                </select>
                <input id="refundAmountInput" type="text" class="editinput" name="refund_amount" size="10" value=""
                       disabled="disabled"> [{$currency}]
            </p>
            <div class="paypalStatusListPlaceholder"></div>
            <p class="paypalActionsBlockNotice">
                <label>[{oxmultilang ident="OXPS_PAYPAL_COMMENT"}]</label></br>
                <textarea name="action_comment"></textarea>
            </p>

            <p class="paypalActionsButtons">
                <input id="refundSubmit" type="submit" class="edittext" name="action_submit"
                       value="[{oxmultilang ident="OXPS_PAYPAL_REFUND"}]">
            </p>
        </div>

        <div id="paypalStatusList">
            [{oxmultilang ident="OXPS_PAYPAL_SHOP_PAYMENT_STATUS"}]
            [{foreach from=$orderPaymentStatusList item=status}]
                <span id="[{$status}]Status">
                    <input id="[{$status}]StatusCheckbox" type="radio" name="order_status" value="[{$status}]">
                    <label for="[{$status}]StatusCheckbox">[{oxmultilang ident='OXPS_PAYPAL_STATUS_'|cat:$status}]</label>
                </span>
            [{/foreach}]
        </div>
    </div>
*}]
<form action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="fnc" value="refund">
    <input type="hidden" name="cl" value="PaypalOrderController">

    <label for="refundAmount">[{oxmultilang ident="OXPS_PAYPAL_REFUND_AMOUNT"}]</label>
    <input type="number" id="refundAmount" name="refundAmount">

    <label for="invoiceId">[{oxmultilang ident="OXPS_PAYPAL_INVOICE_ID"}]</label>
    <input type="text" id="invoiceId" name="invoiceId" maxlength="127">

    <label for="noteToBuyer">[{oxmultilang ident="OXPS_PAYPAL_NOTE_TO_BUYER"}]</label>
    <textarea id="noteToBuyer" name="noteToBuyer" maxlength="255"></textarea>

    <label for="refundAll">[{oxmultilang ident="OXPS_PAYPAL_REFUND_ALL"}]</label>
    <input type="checkbox" id="refundAll" name="refundAll">

    <input type="submit">
</form>

    [{else}]
        <div class="messagebox">[{$sMessage}]</div>
    [{/if}]

[{include file="bottomnaviitem.tpl"}]
[{include file="bottomitem.tpl"}]
