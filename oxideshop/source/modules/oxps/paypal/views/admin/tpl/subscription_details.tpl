[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

<div class="container-fluid">
    [{if !empty($error)}]
    <div class="alert alert-danger" role="alert">
        [{$error}]
    </div>
    [{/if}]
    <br />
    <ul class="nav nav nav-tabs">
        <li class="active"><a href="#" id="subscription-tab">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION"}]</a></li>
        <li><a href="#" id="subscriber-tab">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIBER"}]</a></li>
        <li><a href="#" id="products-tab">[{oxmultilang ident="OXPS_PAYPAL_PRODUCTS"}]</a></li>
        <li><a href="#" id="shipping-tab">[{oxmultilang ident="OXPS_PAYPAL_SHIPPING"}]</a></li>
        <li><a href="#" id="billing-tab">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_BILLING"}]</a></li>
        <li><a href="#" id="transaction-tab">[{oxmultilang ident="OXPS_PAYPAL_TRANSACTIONS"}]</a></li>
    </ul>
    <br />

    <form method="post" action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="cl" value="PayPalSubscriptionDetailsController">
        <input type="hidden" name="fnc" value="update">

        <div id="subscription" class="row pptab">
            <div class="col-sm-12">
                <table class="table table-sm">
                    <tr class="ppmessages">
                        <td class="col-sm-2"><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_ID"}]</b></td>
                        <td>[{$payPalSubscription->id}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_PLAN_ID"}]</b></td>
                        <td>[{$payPalSubscription->plan_id}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_START_TIME"}]</b></td>
                        <td>[{$payPalSubscription->start_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_QUANTITY"}]</b></td>
                        <td>[{$payPalSubscription->quantity}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</b></td>
                        <td>
                            [{assign var="subscriptionStatus" value=$payPalSubscription->status}]
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_"|cat:$subscriptionStatus}]
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_CHANGE_NOTE"}]</b></td>
                        <td>[{$payPalSubscription->status_change_note}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_UPDATE_TIME"}]</b></td>
                        <td>[{$payPalSubscription->status_update_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_CREATE_TIME"}]</b></td>
                        <td>[{$payPalSubscription->create_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_UPDATE_TIME"}]</b></td>
                        <td>[{$payPalSubscription->update_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="subscriber" class="row pptab">
            <div class="col-sm-12">
                <table class="table table-sm">
                    [{assign var="subscriber" value=$payPalSubscription->subscriber}]
                    <tr class="ppmessages">
                        <td class="col-sm-2"><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIBER_PAYER_ID"}]</b></td>
                        <td>[{$subscriber->payer_id}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_FIRST_NAME"}]</b></td>
                        <td>[{$subscriber->name->given_name}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_LAST_NAME"}]</b></td>
                        <td>[{$subscriber->name->surname}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_EMAIL"}]</b></td>
                        <td>[{$subscriber->email_address}]</td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="products" class="row pptab">
            <div class="col-sm-12">
                <table class="table table-sm">
                    <tr class="ppaltmessages">
                        <td class="col-sm-2"><b>ID</b></td>
                        <td>[{$subscriptionProduct->id}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>Product Name[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_NAME"}]</b></td>
                        <td>[{$subscriptionProduct->name}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_DESCRIPTION"}]</b></td>
                        <td>[{$subscriptionProduct->description}]</td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_TYPE_CATEGORY"}]</b></td>
                        <td>[{$subscriptionProduct->type}]:[{$subscriptionProduct->category}]</td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_URL"}]</b></td>
                        <td><a target="_blank" href="[{$subscriptionProduct->home_url}]">[{$subscriptionProduct->home_url}]</a></td>
                    </tr>
                    <tr class="ppmessages">
                        <td><b>[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_IMAGE"}]</b></td>
                        <td><img style="width: 100px" src="[{$subscriptionProduct->image_url}]" /><br />[{$subscriptionProduct->image_url}]</td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="shipping" class="row pptab">
            <div id="subscriptionShipping" class="col-sm-6">
                <table class="table table-sm">
                    [{assign var="shippingDetails" value=$subscriber->shipping_address}]
                    [{assign var="shippingAddress" value=$shippingDetails->address}]
                    <tr class="ppmessages">
                        <td class="col-sm-2">
                            <label for="shippingAddressFullName">[{oxmultilang ident="OXPS_PAYPAL_FULL_NAME"}]</label>
                        </td>
                        <td class="col-sm-2">
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressFullName"
                                   name="shippingAddress[name][full_name]"
                                   value="[{$shippingDetails->name->full_name}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td>
                            <label for="shippingAddressLine1">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_1"}]</label>
                        </td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressLine1"
                                   name="shippingAddress[address][address_line_1]"
                                   value="[{$shippingDetails->address->address_line_1}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppmessages">
                        <td>
                            <label for="shippingAddressLine2">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_2"}]</label>
                        </td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressLine2"
                                   name="shippingAddress[address][address_line_2]"
                                   value="[{$shippingDetails->address->address_line_2}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td>
                            <label for="shippingAddressAdminArea1">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_1"}]</label>
                        </td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressAdminArea1"
                                   name="shippingAddress[address][admin_area_1]"
                                   value="[{$shippingDetails->address->admin_area_1}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppmessages">
                        <td>
                            <label for="shippingAddressLine2">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_2"}]</label>
                        </td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressAdminArea2"
                                   name="shippingAddress[address][admin_area_2]"
                                   value="[{$shippingDetails->address->admin_area_2}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td>
                            <label for="shippingAddressPostalCode">[{oxmultilang ident="OXPS_PAYPAL_POSTAL_CODE"}]</label></td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressPostalCode"
                                   name="shippingAddress[address][postal_code]"
                                   value="[{$shippingDetails->address->postal_code}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppmessages">
                        <td><label for="shippingAddressCountryCode">[{oxmultilang ident="OXPS_PAYPAL_COUNTRY_CODE"}]</label></td>
                        <td>
                            <input type="text"
                                   class="form-control"
                                   id="shippingAddressCountryCode"
                                   name="shippingAddress[address][country_code]"
                                   value="[{$shippingDetails->address->country_code}]"
                                   disabled>
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td><label for="shippingAmountValue">[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</label></td>
                        <td>
                            <div class="input-group">
                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       class="form-control"
                                       id="shippingAmountValue"
                                       name="shippingAmount[value]"
                                       value="[{$payPalSubscription->shipping_amount->value}]"
                                       disabled>
                                <div class="input-group-addon">
                                    <span class="input-group-text">[{$payPalSubscription->shipping_amount->currency_code}]</span>
                                </div>
                            </div>
                            <input type="hidden" name="shippingAmount[currency_code]"
                                   value="[{$payPalSubscription->shipping_amount->currency_code}]" disabled>
                        </td>
                    </tr>
                    <tr class="ppmessages">
                        <td colspan="2">
                            <button class="btn btn-info btn-sm" onclick="jQuery('#subscriptionShipping input').each(function(){ this.disabled==false?this.disabled=true:this.disabled=false; })">
                                [{oxmultilang ident="OXPS_PAYPAL_EDIT"}]
                            </button>
                        </td>
                    </tr>
                    <tr class="ppaltmessages">
                        <td colspan="2"><button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="billing" class="row pptab">
            <div class="col-sm-12">
            <table class="table table-sm" id="subscriptionBilling">
                [{assign var="billingInfo" value=$payPalSubscription->billing_info}]
                <tr class="ppmessages">
                    <td class="col-sm-2">
                        <label for="outstandingBalanceValue">
                            [{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_OUTSTANDING_BALANCE"}]
                        </label>
                    </td>
                    <td>
                        <div class="input-group col-sm-4">
                            <input type="number"
                                   step="0.01"
                                   min="0"
                                   id="outstandingBalanceValue"
                                   class="form-control"
                                   name="billingInfo[outstanding_balance][value]"
                                   value="[{$billingInfo->outstanding_balance->value}]"
                                   disabled>
                            <div class="input-group-addon">
                                <span class="input-group-text">[{$billingInfo->outstanding_balance->currency_code}]</span>
                            </div>
                        </div>
                        <input type="hidden" name="billingInfo[outstanding_balance][currency_code]" value="[{$billingInfo->outstanding_balance->currency_code}]" disabled>
                    </td>
                </tr>
                <tr class="ppaltmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_LAST_PAYMENT"}]</b></td>
                    <td>[{$billingInfo->last_payment->amount->value}]
                        [{$billingInfo->last_payment->amount->currency_code}]
                    </td>
                </tr>
                <tr class="ppmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_LAST_PAYMENT_TIME"}]</b></td>
                    <td>[{$billingInfo->last_payment->time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                </tr>
                <tr class="ppaltmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_NEXT_BILLING_TIME"}]</b></td>
                    <td>[{$billingInfo->next_billing_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                </tr>
                <tr class="ppmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FINAL_PAYMENT"}]</b></td>
                    <td>[{$billingInfo->final_payment_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td>
                </tr>
                <tr class="ppaltmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_COUNT"}]</b></td>
                    <td>[{$billingInfo->failed_payments_count}]</td>
                </tr>
                <tr class="ppmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</b></td>
                    <td>[{$billingInfo->last_failed_payment->amount->value}]
                        [{$billingInfo->last_failed_payment->amount->curency_code}]
                    </td>
                </tr>
                <tr class="ppaltmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_TIME"}]</b></td>
                    <td>[{$billingInfo->last_failed_payment->time}]</td>
                </tr>
                <tr class="ppmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_REASON"}]</b></td>
                    <td>[{$billingInfo->last_failed_payment->reason_code}]</td>
                </tr>
                <tr class="ppaltmessages">
                    <td><b>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_FAILED_PAYMENT_RETRY_TIME"}]</b></td>
                    <td>[{$billingInfo->last_failed_payment->next_payment_retry_time}]</td>
                </tr>
                <tr class="ppmessages">
                    <td colspan="2">
                        <button class="btn btn-info btn-sm" onclick="jQuery('#subscriptionBilling input').each(function(){ this.disabled==false?this.disabled=true:this.disabled=false; })">
                            [{oxmultilang ident="OXPS_PAYPAL_EDIT"}]
                        </button>
                    </td>
                </tr>
                <tr class="ppaltmessages">
                    <td colspan="2"><button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button></td>
                </tr>
            </table>
            <br />
            <table class="table table-sm">
                <tr><td colspan="100"><h4>Billing Cycles</h4></td></tr>
                <tr class="ppaltmessages">
                    <th>[{oxmultilang ident="OXPS_PAYPAL_TENURE_TYPE"}]</th>
                    <th>[{oxmultilang ident="OXPS_PAYPAL_SEQUENCE"}]</th>
                    <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_COMPLETED"}]</th>
                    <th>[{oxmultilang ident="OXPS_PAYPAL_CYCLES_REMAINING"}]</th>
                    <th>[{oxmultilang ident="OXPS_PAYPAL_CURRENT_PRICING_SCHEME_VERSION"}]</th>
                    <th>[{oxmultilang ident="OXPS_PAYPAL_TOTAL_CYCLES"}]</th>
                </tr>
                [{foreach from=$billingInfo->cycle_executions item="cycleExecution"}]
                [{cycle values='ppmessages,ppaltmessages' assign=cellClass}]
                <tr class="[{$cellClass}]">
                    <td>[{$cycleExecution->tenure_type}]</td>
                    <td>[{$cycleExecution->sequence}]</td>
                    <td>[{$cycleExecution->cycles_completed}]</td>
                    <td>[{$cycleExecution->cycles_remaining}]</td>
                    <td>[{$cycleExecution->current_pricing_scheme_version}]</td>
                    <td>[{$cycleExecution->total_cycles}]</td>
                </tr>
                [{/foreach}]
            </table>
            </div>
        </div>
    </form>
    <div id="transaction" class="row pptab">
        <div class="row ppaltmessages hidden">
        [{if !($subscriptionStatus == "APPROVAL_PENDING" or
            $subscriptionStatus == "CANCELLED" or
            $subscriptionStatus == "EXPIRED")
        }]
            <div class="col-sm-2">
                <form method="post" action="[{$oViewConf->getSelfLink()}]">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="oxid" value="[{$oxid}]">
                    <input type="hidden" name="cl" value="PayPalSubscriptionDetailsController">
                    <input type="hidden" name="fnc" value="updateStatus">
                    <h4>[{oxmultilang ident="OXPS_PAYPAL_TRANSACTION_STATUS"}]</h4>
                    <div class="form-group">
                        <label for="subscriptionStatusEdit">[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS"}]</label>
                        <select class="form-control" id="subscriptionStatusEdit" name="status">
                            <option [{if $subscriptionStatus == "ACTIVE"}]value="" selected[{else}]value="ACTIVE"[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_ACTIVE"}]</option>
                            <option [{if $subscriptionStatus == "SUSPENDED"}]value="" selected[{else}]value="SUSPENDED"[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_SUSPENDED"}]</option>
                            <option [{if $subscriptionStatus == "CANCELED"}]value="" selected[{else}]value="CANCELED"[{/if}]>[{oxmultilang ident="OXPS_PAYPAL_SUBSCRIPTION_STATUS_CANCELLED"}]</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="statusNote">[{oxmultilang ident="OXPS_PAYPAL_NOTE"}]</label>
                        <textarea name="statusNote" class="form-control" maxlength="128"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
                </form>
            </div>
            <div class="col-sm-1"></div>
        [{/if}]

            <div class="col-sm-2">
                <form method="post" action="[{$oViewConf->getSelfLink()}]">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="oxid" value="[{$oxid}]">
                    <input type="hidden" name="cl" value="PayPalSubscriptionDetailsController">
                    <input type="hidden" name="fnc" value="captureOutstandingFees">
                    <h4>[{oxmultilang ident="OXPS_PAYPAL_CAPTURE_OUTSTANDING_FEES"}]</h4>
                    <div class="form-group">
                        <label for="outstandingFeeAmount">[{oxmultilang ident="OXPS_PAYPAL_AMOUNT"}]</label>
                        <div class="input-group">
                            <input type="number"
                                   step="0.01"
                                   min="0"
                                   max="[{$billingInfo->outstanding_balance->value}]"
                                   class="form-control"
                                   id="outstandingFeeAmount"
                                   name="outstandingFee[amount]">
                            <div class="input-group-addon">
                                <span class="input-group-text">[{$billingInfo->outstanding_balance->currency_code}]</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="outstandingFee[currency_code]">
                    <div class="form-group">
                        <label for="outstandingFeeCaptureNote">
                            [{oxmultilang ident="OXPS_PAYPAL_NOTE"}]
                        </label>
                        <textarea name="captureNote" id="outstandingFeeCaptureNote" class="form-control" maxlength="128"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <iframe frameborder="0" src="[{$oViewConf->getSelfLink()}]&cl=PayPalSubscriptionTransactionController&subscriptionId=[{$payPalSubscription->id}]"  class="col-sm-12" height="600"></iframe>
            </div>
        </div>
    </div>


</div>
<script>
    jQuery(document).ready(function(){
        let showItem = function(divId) {
            jQuery(".nav-tabs li").removeClass('active');
            jQuery(".pptab").hide();
            jQuery("#" + divId).show();
            jQuery("#" + divId + "-tab").parent().addClass('active');
        };

        let listenToTab = function(divId) {
            jQuery("#" + divId + "-tab").click(function(e) {
                e.preventDefault();
                showItem(divId);
            });
        }

        showItem("subscription");
        listenToTab("subscription");
        listenToTab("subscriber");
        listenToTab("products");
        listenToTab("shipping");
        listenToTab("billing");
        listenToTab("transaction");
    });
</script>

