[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

<div class="container-fluid">
    [{if !empty($error)}]
    <div class="alert alert-danger" role="alert">
        [{$error}]
    </div>
    [{/if}]

    <a href="[{$oViewConf->getSelfLink()}]&cl=PayPalSubscriptionController">Back</a>

    <form method="post" action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="cl" value="PaypalSubscriptionDetailsController">
        <input type="hidden" name="fnc" value="update">
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-sm">
                    [{*<tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION"}]</td>
                        <td>
                            <a href="#" onclick="jQuery('#subscriptionStatusEdit').show()">
                                [{oxmultilang ident="OXPS_PAYPAL_EDIT"}]
                            </a>
                        </td>
                    </tr>*}]
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</td>
                        <td>[{$payPalSubscription->id}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID"}]</td>
                        <td>[{$payPalSubscription->plan_id}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_START_TIME"}]</td>
                        <td>[{$payPalSubscription->start_time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_QUANTITY"}]</td>
                        <td>[{$payPalSubscription->quantity}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</td>
                        <td>[{$payPalSubscription->status}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_CHANGE_NOTE"}]</td>
                        <td>[{$shippingDetails->status_change_note}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_UPDATE_TIME"}]</td>
                        <td>[{$payPalSubscription->status_update_time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_CREATE_TIME"}]</td>
                        <td>[{$payPalSubscription->create_time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UPDATE_TIME"}]</td>
                        <td>[{$payPalSubscription->update_time}]</td>
                    </tr>
                    <tr>
                        <td colspan="2">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIBER"}]</td>
                    </tr>
                    [{assign var="subscriber" value=$payPalSubscription->subscriber}]
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIBER_PAYER_ID"}]</td>
                        <td>[{$subscriber->payer_id}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_FIRST_NAME"}]</td>
                        <td>[{$subscriber->name->given_name}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_LAST_NAME"}]</td>
                        <td>[{$subscriber->name->surname}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_EMAIL"}]</td>
                        <td>[{$subscriber->email_address}]</td>
                    </tr>
                </table>

                <div id="subscriptionStatusEdit" hidden>
                    [{assign var="subscriptionStatus" value=$payPalSubscription->status}]
                    <div class="radio">
                        <label for="statusCreated" >[{oxmultilang ident="OXPS_PAYPAL_STATUS_CREATED"}]</label>
                        <input type="radio" id="statusCreated" name="status" value="CREATED" [{if $subscriptionStatus == "CREATED"}]selected[{/if}]>
                    </div>
                    <div class="radio">
                        <label for="statusActive">[{oxmultilang ident="OXPS_PAYPAL_STATUS_ACTIVE"}]</label>
                        <input type="radio" id="statusActive" name="status" value="ACTIVE" [{if $subscriptionStatus == "ACTIVE"}]selected[{/if}]>
                    </div>
                    <div class="radio">
                        <label for="statusInactive">[{oxmultilang ident="OXPS_PAYPAL_STATUS_INACTIVE"}]</label>
                        <input type="radio" id="statusInactive" name="status" value="INACTIVE" [{if $subscriptionStatus == "INACTIVE"}]selected[{/if}]>
                    </div>

                    <textarea name="statusChangeNote" aria-label="[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_CHANGE_NOTE"}]"></textarea>
                </div>
            </div>
            <div id="subscriptionShipping" class="col-sm-4">
                <table class="table table-sm">
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SHIPPING"}]</td>
                        <td>
                            <a href="#"
                               onclick="jQuery('#subscriptionShipping input').each(function(){ this.disabled = false })">
                                [{oxmultilang ident="OXPS_PAYPAL_EDIT"}]
                            </a>
                        </td>
                    </tr>
                    [{assign var="shippingDetails" value=$subscriber->shipping_address}]
                    [{assign var="shippingAddress" value=$shippingDetails->address}]
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_FULL_NAME"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[name][full_name]"
                                   value="[{$shippingDetails->name->full_name}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_FULL_NAME"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_1"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][address_line_1]"
                                   value="[{$shippingDetails->address->address_line_1}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_1"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_2"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][address_line_2]"
                                   value="[{$shippingDetails->address->address_line_2}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_2"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_1"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][admin_area_1]"
                                   value="[{$shippingDetails->address->admin_area_1}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_1"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_2"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][admin_area_2]"
                                   value="[{$shippingDetails->address->admin_area_2}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_2"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_POSTAL_CODE"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][postal_code]"
                                   value="[{$shippingDetails->address->postal_code}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_POSTAL_CODE"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_COUNTRY_CODE"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAddress[address][country_code]"
                                   value="[{$shippingDetails->address->country_code}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_COUNTRY_CODE"}]">
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   name="shippingAmount[currency_code]"
                                   value="[{$shippingDetails->shipping_amount->currency_code}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_CURRENCY_CODE"}]">
                            <input type="text"
                                   class="form-control"
                                   name="shippingAmount[value]"
                                   value="[{$shippingDetails->shipping_amount->value}]"
                                   disabled
                                   aria-label="[{oxmultilang ident="OXPS_PAYPAL_VALUE"}]">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4">
                <table class="table table-sm">
                    [{*
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_BILLING"}]</td>
                        <td><a href="#">[{oxmultilang ident="OXPS_PAYPAL_EDIT"}]</a></td>
                    </tr>
                    *}]
                    [{assign var="billingInfo" value=$payPalSubscription->billing_info}]
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_OUTSTANDING_BALANCE"}]</td>
                        <td>[{$billingInfo->outstanding_balance->value}]
                            [{$billingInfo->outstanding_balance->currency_code}]
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_LAST_PAYMENT"}]</td>
                        <td>[{$billingInfo->last_payment->amount->value}]
                            [{$billingInfo->last_payment->amount->currency_code}]
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_LAST_PAYMENT_TIME"}]</td>
                        <td>[{$billingInfo->last_payment->time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_NEXT_BILLING_TIME"}]</td>
                        <td>[{$billingInfo->next_billing_time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FINAL_PAYMENT"}]</td>
                        <td>[{$billingInfo->final_payment_time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_COUNT"}]</td>
                        <td>[{$billingInfo->failed_payments_count}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</td>
                        <td>[{$billingInfo->last_failed_payment->amount->value}]
                            [{$billingInfo->last_failed_payment->amount->curency_code}]
                        </td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_TIME"}]</td>
                        <td>[{$billingInfo->last_failed_payment->time}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_REASON"}]</td>
                        <td>[{$billingInfo->last_failed_payment->reason_code}]</td>
                    </tr>
                    <tr>
                        <td>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_RETRY_TIME"}]</td>
                        <td>[{$billingInfo->last_failed_payment->next_payment_retry_time}]</td>
                    </tr>
                    <table class="table table-sm">
                        [{foreach from=$billingInfo->cycle_executions item="cycleExecution"}]
                        <tr>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_TENURE_TYPE"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_SEQUENCE"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_COMPLETED"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_REMAINING"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_CURRENT_PRICING_SCHEME_VERSION"}]</th>
                            <th>[{oxmultilang ident="OXPS_PAYPAL_TOTAL_CYCLES"}]</th>
                        </tr>
                        <tr>
                            <td>[{$cycleExecution->tenure_type}]</td>
                            <td>[{$cycleExecution->sequence}]</td>
                            <td>[{$cycleExecution->cycles_completed}]</td>
                            <td>[{$cycleExecution->cycles_remaining}]</td>
                            <td>[{$cycleExecution->current_pricing_scheme_version}]</td>
                            <td>[{$cycleExecution->total_cycles}]</td>
                        </tr>
                        [{/foreach}]
                    </table>
                </table>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <iframe src="[{$oViewConf->getSelfLink()}]&cl=PayPalSubscriptionTransactionController&subscriptionId=[{$payPalSubscription->id}]" width="1280" height="600"></iframe>
        </div>
    </div>
</div>
</body>
</html>