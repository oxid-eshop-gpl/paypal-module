[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"}]

<div class="container-fluid">
    [{if !empty($error)}]
    <div class="alert alert-danger" role="alert">
        [{$error}]
    </div>
    [{/if}]
    <div class="row">
        <div class="col-lg-4">
            <table class="table table-sm">
                <tr><td>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_ID"}]</td><td>[{$dispute->dispute_id}]</td></tr>
                <tr><td>[{oxmultilang ident="OXPS_PAYPAL_REASON"}]</td><td>[{$dispute->reason}]</td></tr>
                <tr><td>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_STATUS"}]</td><td>[{$dispute->status}]</td></tr>
                <tr><td>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_CREATE_TIME"}]</td><td>[{$dispute->create_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td></tr>
                <tr><td>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_UPDATE_TIME"}]</td><td>[{$dispute->update_time|date_format:"%Y-%m-%d %H:%M:%S"}]</td></tr>
            </table>
        </div>
        <div class="col-lg-8">
            [{foreach from=$dispute->messages item="message"}]
            <div>
                <div>
                    [{$message->posted_by}]
                    [{$message->time_posted|date_format:"%Y-%m-%d %H:%M:%S"}]
                </div>
                [{$message->content}]
            </div>
            [{/foreach}]
            <form method="post" action="[{$oViewConf->getSelfLink()}]">
                <input type="hidden" name="oxid" value="[{$dispute->dispute_id}]">
                <input type="hidden" name="fnc" value="sendMessage">
                <input type="hidden" name="cl" value="PaypalDisputeDetailsController">
                <textarea name="message" class="form-control"></textarea>
                <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_SEND"}]</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
        <form method="post" action="[{$oViewConf->getSelfLink()}]">
            <input type="hidden" name="oxid" value="[{$dispute->dispute_id}]">
            <input type="hidden" name="fnc" value="makeOffer">
            <input type="hidden" name="cl" value="PaypalDisputeDetailsController">

            <div class="form-group">
                <label for="offerType">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_OFFER_TYPE"}]</label>
                <select name="offerType" class="form-control" id="offerType">
                    <option value="REFUND" disabled>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND"}]</option>
                    <option value="REFUND_WITH_RETURN" disabled>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND_WITH_RETURN"}]</option>
                    <option value="REFUND_WITH_REPLACEMENT" disabled>[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REFUND_WITH_REPLACEMENT"}]</option>
                    <option value="REPLACEMENT_WITHOUT_REFUND">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_REPLACEMENT_WITHOUT_REFUND"}]</option>
                </select>
            </div>

            <div class="form-group">
                <label for="note">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_NOTE"}]</label>
                <input type="text" class="form-control" id="note" name="note">
            </div>

            <div class="form-group">
                <label for="offerAmount">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_OFFER_AMOUNT"}]</label>
                <input type="number" class="form-control" id="offerAmount" name="offerAmount[value]" disabled>
                <input type="hidden" name="offerAmount[currency_code]" value="" disabled>
            </div>

            <div class="form-group">
                <label for="shippingAddressLine1">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_1"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressLine1"
                    name="shippingAddress[address][address_line_1]"
                    value="[{$shippingDetails->address->address_line_1}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressLine2">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_2"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressLine2"
                    name="shippingAddress[address][address_line_2]"
                    value="[{$shippingDetails->address->address_line_2}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressLine3">[{oxmultilang ident="OXPS_PAYPAL_ADDRESS_LINE_3"}]</label>
                <input type="text"
                       class="form-control"
                       id="shippingAddressLine3"
                       name="shippingAddress[address][address_line_3]"
                       value="[{$shippingDetails->address->address_line_3}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressAdminArea1">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_1"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressAdminArea1"
                    name="shippingAddress[address][admin_area_1]"
                    value="[{$shippingDetails->address->admin_area_1}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressAdminArea2">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_2"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressAdminArea2"
                    name="shippingAddress[address][admin_area_2]"
                    value="[{$shippingDetails->address->admin_area_2}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressAdminArea3">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_3"}]</label>
                <input type="text"
                       class="form-control"
                       id="shippingAddressAdminArea3"
                       name="shippingAddress[address][admin_area_3]"
                       value="[{$shippingDetails->address->admin_area_3}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressAdminArea4">[{oxmultilang ident="OXPS_PAYPAL_ADMIN_AREA_4"}]</label>
                <input type="text"
                       class="form-control"
                       id="shippingAddressAdminArea4"
                       name="shippingAddress[address][admin_area_4]"
                       value="[{$shippingDetails->address->admin_area_4}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressPostalCode">[{oxmultilang ident="OXPS_PAYPAL_POSTAL_CODE"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressPostalCode"
                    name="shippingAddress[address][postal_code]"
                    value="[{$shippingDetails->address->postal_code}]">
            </div>

            <div class="form-group">
                <label for="shippingAddressCountryCode">[{oxmultilang ident="OXPS_PAYPAL_COUNTRY_CODE"}]</label>
                <input type="text"
                    class="form-control"
                    id="shippingAddressCountryCode"
                    name="shippingAddress[address][country_code]"
                    value="[{$shippingDetails->address->country_code}]">
            </div>

            <div class="form-group">
                <label for="invoiceId">[{oxmultilang ident="OXPS_PAYPAL_DISPUTE_INVOICE_ID"}]</label>
                <input type="text" class="form-control" id="invoiceId" name="invoiceId" maxlength="127">
            </div>

            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">[{oxmultilang ident="OXPS_PAYPAL_APPLY"}]</button>
            </div>
        </form>
        </div>
    </div>
</div>