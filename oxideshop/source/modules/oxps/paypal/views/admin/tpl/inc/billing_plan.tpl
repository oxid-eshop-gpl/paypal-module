[{assign var="oxid" value=$oView->getEditObjectId()}]
[{assign var="edit" value=$oView->getEditObject()}]
[{assign var="categories" value=$oView->getCategories()}]
[{assign var="types" value=$oView->getTypes()}]
[{assign var="images" value=$oView->getDisplayImages()}]
[{assign var="productUrl" value=$oView->getProductUrl()}]
[{assign var="hasLinkedObject" value=$oView->hasLinkedObject()}]
[{assign var="hasSubscriptionPlan" value=$oView->hasSubscriptionPlan()}]
[{assign var="defaultIntervals" value=$oView->getIntervalDefaults()}]
[{assign var="defaultTenureTypes" value=$oView->getTenureTypeDefaults()}]
[{assign var="defaultSequences" value=$oView->getSequenceDefaults()}]
[{assign var="defaultTotalCycles" value=$oView->getTotalCycleDefaults()}]
[{assign var="currencyCodes" value=$oView->getCurrencyCodes()}]
[{assign var="existingVariants" value=$oView->getVariantProducts()}]
<form name="billingPlanForm" id="billingPlanForm" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="PayPalSubscribeController">
    <input type="hidden" name="fnc" value="saveBillingPlans">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="paypalProductId" value="[{ $oView->getPayPalProductId() }]">
    <table cellspacing="0" cellpadding="0" border="0" width="98%" style="border: 1px solid #cccccc; padding: 10px; margin: 10px; border-radius: 10px;">
        <tbody>
            <tr><td colspan="100"><h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ADD"}]</h3></td></tr>
            <tr>
                <td class="edittext" style="width: 196px;">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_AUTOMATICALLY_BILL" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <select name="auto_bill_outstanding" id="auto_bill_outstanding" style="width: 200px" class="editinput">
                        <option value="true">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_YES"}]</option>
                        <option value="false">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_NO"}]</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FAILURE_ACTION" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <select name="setup_fee_failure_action" id="setup_fee_failure_action" style="width: 200px" class="editinput">
                        <option value="CONTINUE">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ACTION_CONTINUE"}]</option>
                        <option value="CANCEL">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ACTION_CANCEL"}]</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_SETUP_FEE" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <input type="text" required="required" class="editinput" size="20" name="setup_fee" value="0"> EUR
                    <input type="hidden" name="setup_fee_currency" id="setup_fee_currency" value="EUR"/>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FAILURE_THRESHOLD" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <select name="payment_failure_threshold" id="payment_failure_threshold" style="width: 200px" class="editinput">
                        [{foreach from=$defaultTotalCycles item=value key=name}]
                        <option value="[{$value}]">[{$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_NAME" suffix="COLON"}]
                </td>
                <td class="edittext">
                     <input type="text" required="required" class="editinput" size="25" name="billing_plan_name" value="">
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_DESCRIPTION" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <input type="text" required="required" class="editinput" size="25" name="billingPlanDescription" value="">
                </td>
            </tr>

            <tr>
                <td colspan="100"><h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TAX" suffix="COLON"}]</h3></td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TAX_PERCENTAGE" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <input type="text" required="required" class="editinput" size="25"  name="tax_percentage" value="">
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TAX_INCLUSIVE" suffix="COLON"}]
                </td>
                <td class="edittext">
                    <select name="tax_inclusive" id="tax_inclusive" style="width: 200px" class="editinput">
                        <option value="true">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_YES"}]</option>
                        <option value="false">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_NO"}]</option>
                    </select>
                    <input type="hidden" name="id" value="[{$linkedObject->id}]">
                    <input type="hidden" name="paypalProductId" value="[{$linkedObject->id}]">
                </td>
            </tr>

            <tr><td colspan="100"><h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_CYCLES"}] [<span style="cursor: pointer; cursor: hand" id="addBillingCycleAction">+</span>]</h3></td></tr>
            <tr>
                <td colspan="100">
                    <table id="billingCycleList" style="width: 50%;">
                        <tr>
                            <th style="width: 20%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_PRICE"}]</th>
                            <th style="width: 20%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FREQUENCY"}]</th>
                            <th style="width: 20%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TENURE"}]</th>
                            <th style="width: 15%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_SEQUENCE"}]</th>
                            <th style="width: 15%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_CYCLES"}]</th>
                            <th style="width: 10%; text-align: left">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ACTIONS"}]</th>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="100"><h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ACTIONS"}]</h3></td>
            </tr>
            <tr>
                <td class="edittext">
                    <input type="button" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="window.validateAddBillingPlanForm('saveBillingPlans')">&nbsp;
                </td>
            </tr>
            </tbody>
    </table>
    <table class="addBilling" cellspacing="0" cellpadding="0" border="0" width="98%" style="border: 1px solid #cccccc; padding: 10px; margin: 10px; border-radius: 10px;">
            <tr class="addBilling">
                <td colspan="100">
                    <h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ADD_CYCLES"}]</h3>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TENURE" suffix="COLON"}]</td>
                <td class="edittext">
                    <select name="tenure_val" id="tenure_val" style="width: 200px" class="editinput">
                        [{foreach from=$defaultTenureTypes item=value key=name}]
                            <option value="[{$value}]">[{oxmultilang ident="OXPS_PAYPAL_TENURE_TYPE_"|cat:$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_PRICE" suffix="COLON"}]</td>
                <td class="edittext">
                    <input type="text" class="editinput" size="25" name="fixed_price_val" id="fixed_price_val" value=""/>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TOTAL_CYCLES" suffix="COLON"}]</td>
                <td class="edittext">
                    <select name="total_cycles_val" id="total_cycles_val" style="width: 200px" class="editinput">
                        [{foreach from=$defaultTotalCycles item=value key=name}]
                        <option value="[{$value}]">[{$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FREQUENCY" suffix="COLON"}]</td>
                <td class="edittext">
                    <select name="interval_val" id="interval_val" style="width: 200px" class="editinput">
                        [{foreach from=$defaultIntervals item=value key=name}]
                            <option value="[{$value}]">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FREQUENCY_"|cat:$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_SEQUENCE" suffix="COLON"}]</td>
                <td class="edittext">
                    <select name="sequence_val" id="sequence_val" style="width: 200px" class="editinput">
                        [{foreach from=$defaultSequences item=value key=name}]
                            <option value="[{$value}]">[{$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr class="addBilling">
                <td class="edittext">
                    <input type="button" class="edittext" name="addBillingCycle" value='[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ADD"}]' onClick="window.addCycle()"><br>
                </td>
            </tr>

        </tbody>
    </table>
</form>

<script>
    jQuery(function() {

        setTimeout(function() {
            jQuery(".addBilling").hide();
        }, 1000);

        jQuery("#addBillingCycleAction").click(function() {
            jQuery(".addBilling").toggle();
        });

        window.validateAddBillingPlanForm = function(saveType) {
            let isValid = true;
            document.billingPlanForm.fnc.value=saveType;
            if(saveType === 'saveBillingPlans') {
                jQuery('#billingPlanForm *').filter(':input').each(function(){
                    let thisElement = jQuery(this);
                    if (thisElement.attr('required') === true) {
                        if(thisElement.val().length < 1) {
                            isValid = false;
                            thisElement.css('border', '1px solid #ff0000');
                        } else {
                            thisElement.css('border', '1px solid #cccccc');
                        }
                    }
                });

                if (typeof cycleCount !== "undefined") {
                    if(cycleCount < 1) {
                        isValid = false;
                        jQuery('#billingCycleList').css('border', '1px solid #ff0000');
                    } else {
                        jQuery('#billingCycleList').css('border', '1px solid #cccccc');
                    }
                }

                if (isValid) {
                    jQuery("#billingPlanForm").submit();
                }
            };
        };

        window.addCycle = function() {
            let intCount =  (Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)).trim();

            let price = jQuery('#fixed_price_val').val();
            let frequency = jQuery('#interval_val option:selected').text();
            let tenure = jQuery('#tenure_val option:selected').text();
            let sequence = jQuery('#sequence_val option:selected').text();
            let totalCycles = jQuery('#total_cycles_val option:selected').text();

            if(price.length < 1) {
                jQuery('#fixed_price_val').css('border', '1px solid #ff0000');
            } else {
                jQuery('#fixed_price_val').css('border', '1px solid #cccccc');
                let html = '<tr class="cycleData ' + intCount + 'Row">';
                html += '<td align="left">' + price + '</td>';
                html += '<td align="left">' + frequency + '</td>';
                html += '<td align="left">' + tenure + '</td>';
                html += '<td align="left">' + sequence + '</td>';
                html += '<td align="left">' + totalCycles + '</td>';
                html += '<td style="cursor:pointer; cursor: hand" align="left" onclick="window.deleteRow(\'' + intCount + '\')">[X]';
                html += '<input type="hidden" name="fixed_price[]" value="' + price + '" />';
                html += '<input type="hidden" name="interval[]" value="' + frequency + '" />';
                html += '<input type="hidden" name="tenure[]" value="' + tenure + '" />';
                html += '<input type="hidden" name="sequence[]" value="' + sequence + '" />';
                html += '<input type="hidden" name="total_cycles[]" value="' + totalCycles + '" /></td>';
                html += '</tr>';

                jQuery("#billingCycleList").append(html);
            }
        };

        window.deleteRow = function(id) {
            jQuery('.' + id + 'Row').remove();
        };
    });

</script>
