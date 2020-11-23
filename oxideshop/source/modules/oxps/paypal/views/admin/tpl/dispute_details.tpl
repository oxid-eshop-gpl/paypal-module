[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"}]

<div class="container-fluid">
    [{if !empty($error)}]
    <div class="alert alert-danger" role="alert">
        [{$error}]
    </div>
    [{/if}]
    <div class="row">
        <div class="col-lg-4">
            <h2>[{$dispute->dispute_id}]: [{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REASON_"|cat:$dispute->reason}] <small>([{$dispute->create_time|date_format:"%Y-%m-%d %H:%M:%S"}])</small></h2>
            <h4>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS_"|cat:$dispute->status}] <small>([{$dispute->update_time|date_format:"%Y-%m-%d %H:%M:%S"}])</small></h4>
        </div>
    </div>
    <br />
    <ul class="nav nav-tabs">
        <li class="active"><a href="#" id="message-tab">[{oxmultilang ident="OXPS_PAYPAL_MESSAGES"}]</a></li>
        <li><a href="#" id="offer-tab">[{oxmultilang ident="OXPS_PAYPAL_MAKE_OFFER"}]</a></li>
        <li><a href="#">[{oxmultilang ident="OXPS_PAYPAL_ESCALATE"}]</a></li>
        <li><a href="#">Menu 3</a></li>
    </ul>
    <div class="pptab" id="messages">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="ppaltmessages">[{oxmultilang ident="OXPS_PAYPAL_MESSAGES"}]</h3>
            </div>
        </div>
        <div class="row ppmessages">
            <div class="col-lg-12">
                <form method="post" action="[{$oViewConf->getSelfLink()}]" class="col-lg-3">
                    <input type="hidden" name="oxid" value="[{$dispute->dispute_id}]">
                    <input type="hidden" name="fnc" value="sendMessage">
                    <input type="hidden" name="cl" value="PaypalDisputeDetailsController">
                    <textarea name="message" class="form-control" cols="80" rows="5"></textarea>
                    <br />
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_SEND"}]</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                [{foreach from=$dispute->messages|@array_reverse item="message"}]
                    [{if $message->posted_by == 'SELLER'}]
                        <div class="ppaltmessages">
                            <h4>ME <small>[{$message->time_posted|date_format:"%Y-%m-%d %H:%M:%S"}]</small></h4>
                            <p>[{$message->content}]</p>
                        </div>
                    [{else}]
                        <div class="ppmessages">
                            <h4>[{$message->posted_by}] <small>[{$message->time_posted|date_format:"%Y-%m-%d %H:%M:%S"}]</small></h4>
                            <p>[{$message->content}]</p>
                        </div>
                    [{/if}]
                [{/foreach}]
            </div>
        </div>
    </div>
    <div class="pptab" id="offer">
        <form method="post" action="[{$oViewConf->getSelfLink()}]">
        <input type="hidden" name="oxid" value="[{$dispute->dispute_id}]">
        <input type="hidden" name="fnc" value="makeOffer">
        <input type="hidden" name="cl" value="PaypalDisputeDetailsController">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="ppaltmessages">[{oxmultilang ident="OXPS_PAYPAL_MAKE_OFFER"}]</h3>
            </div>
        </div>
        <br />
        <div class="row ppmessages">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="offerType">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_OFFER_TYPE"}]</label>
                    <select name="offerType" class="form-control" id="offerType">
                        <option value="REFUND">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND"}]</option>
                        <option value="REFUND_WITH_RETURN">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND_WITH_RETURN"}]</option>
                        <option value="REFUND_WITH_REPLACEMENT">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND_WITH_REPLACEMENT"}]</option>
                        <option value="REPLACEMENT_WITHOUT_REFUND">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REPLACEMENT_WITHOUT_REFUND"}]</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="offerAmount">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_OFFER_AMOUNT"}]</label>
                    <input type="number" class="form-control" id="offerAmount" name="offerAmount[value]">
                    <input type="hidden" name="offerAmount[currency_code]" value="EUR">
                </div>
            </div>
        </div>

        <div class="row ppmessages">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="note">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_NOTE"}]</label>
                    <input type="text" class="form-control" id="note" name="note">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="invoiceId">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_INVOICE_ID"}]</label>
                    <input type="text" class="form-control" id="invoiceId" name="invoiceId" maxlength="127">
                </div>
            </div>
        </div>
        <div class="row ppaltmessages">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="shippingAddressLine1">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_1"}]</label>
                    <input type="text"
                           class="form-control"
                           id="shippingAddressLine1"
                           name="shippingAddress[address][address_line_1]"
                           value="[{$shippingDetails->address->address_line_1}]">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="shippingAddressPostalCode">[{oxmultilang ident="OXPS_PAYPAL_POSTAL_CODE"}]</label>
                    <input type="text"
                           class="form-control"
                           id="shippingAddressPostalCode"
                           name="shippingAddress[address][postal_code]"
                           value="[{$shippingDetails->address->postal_code}]">
                </div>
            </div>
        </div>
        <div class="row ppmessages">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="shippingAddressLine2">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_2"}]</label>
                    <input type="text"
                           class="form-control"
                           id="shippingAddressLine2"
                           name="shippingAddress[address][address_line_2]"
                           value="[{$shippingDetails->address->address_line_2}]">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="shippingAddressCountryCode">[{oxmultilang ident="OXPS_PAYPAL_COUNTRY_CODE"}]</label>
                    <input type="text"
                           class="form-control"
                           id="shippingAddressCountryCode"
                           name="shippingAddress[address][country_code]"
                           value="[{$shippingDetails->address->country_code}]">
                </div>
            </div>
        </div>
        <div class="row ppaltmessages">
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="shippingAddressLine3">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_3"}]</label>
                    <input type="text"
                           class="form-control"
                           id="shippingAddressLine3"
                           name="shippingAddress[address][address_line_3]"
                           value="[{$shippingDetails->address->address_line_3}]">
                </div>
            </div>
        </div>
        <div class="row ppmessages">
            <div class="col-lg-3">
                <div class="col-sm-12">
                    <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    jQuery(document).ready(function(){

        jQuery(".nav-tabs li").removeClass('active');
        jQuery(".pptab").hide();
        jQuery("#messages").show();
        jQuery("#message-tab").parent().addClass('active');

        jQuery("#message-tab").click(function(e) {
            e.preventDefault();
            jQuery(".nav-tabs li").removeClass('active');
            jQuery(".pptab").hide();
            jQuery("#messages").show();
            jQuery("#message-tab").parent().addClass('active');
        });

        jQuery("#offer-tab").click(function(e) {
            e.preventDefault();
            jQuery(".nav-tabs li").removeClass('active');
            jQuery(".pptab").hide();
            jQuery("#offer").show();
            jQuery("#offer-tab").parent().addClass('active');
        });
    });
</script>
