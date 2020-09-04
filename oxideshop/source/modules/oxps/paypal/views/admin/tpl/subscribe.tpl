[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

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

[{if $hasLinkedObject }]
    [{assign var="linkedObject" value=$oView->getLinkedObject()}]
[{/if}]

[{if $hasSubscriptionPlan }]
    [{assign var="linkedSubscriptionPlan" value=$oView->getSubscriptionPlan()}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="PaypalSubscribeController">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="PaypalSubscribeController">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="paypalProductId" value="[{ $paypalProductId }]">
    <h3>[{ oxmultilang ident="PAYPAL_SUBSCRIBE_MAIN" }]</h3>

    <table cellspacing="0" cellpadding="0" border="0" width="98%">
        <tbody>
            [{if $oView->isPayPalProductLinkedByParentOnly() }]
                [{* a button that shows form values to save a new paypal subcribable product to be linked to the specific variation.
                 JS will be responsible to remove class "alreadyLinked" from the the div below to show it *}]
                <input type="button" value="uniq">
            [{/if}]
            [{if $oView->isPayPalProductLinked() }]
                <input type="button" value="unlink">
                [{assign name="class" value="alreadyLinked"}]
            [{/if}]
            [{if $readonly}]
                [{assign var="readonly" value="readonly disabled"}]
            [{else}]
                [{assign var="readonly" value=""}]
            [{/if}]

            [{if $hasLinkedObject }]
                [{assign var="title" value=$linkedObject->name}]
                [{assign var="description" value=$linkedObject->description}]
                [{assign var="productType" value=$linkedObject->type}]
                [{assign var="category" value=$linkedObject->category}]
                [{assign var="imageUrl" value=$linkedObject->image_url}]
                [{assign var="homeUrl" value=$linkedObject->home_url}]
                [{assign var="id" value=$linkedObject->id}]
            [{else}]
                [{assign var="title" value=$edit->oxarticles__oxtitle->value}]
                [{assign var="description" value=$edit->oxarticles__oxshortdesc->value}]
                [{assign var="productType" value=''}]
                [{assign var="category" value=''}]
                [{assign var="imageUrl" value=''}]
                [{assign var="homeUrl" value=$productUrl}]
            [{/if}]

            <tr>
                <td class="edittext">
                    Name:
                </td>
                <td class="edittext">
                    <input type="text" class="editinput" size="80" required="required" name="title" id="title" value="[{$title}]" [{ $readonly }]>
                </td>
            </tr>
            <tr>
                <td>
                    Description:
                </td>
                <td class="edittext">
                    <textarea class="editinput" style="width: 500px" rows="10" required="required" name="description" id="description">[{$description}]</textarea>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    Product Type:
                </td>
                <td class="edittext">
                     <select name="productType" style="width: 500px" class="editinput">
                         [{foreach from=$types item=value key=name}]
                            [{if $productType == $value }]
                                 <option value="[{$value}]" selected>[{$value}]</option>
                            [{else}]
                                 <option value="[{$value}]">[{$value}]</option>
                            [{/if}]
                         [{/foreach}]
                     </select>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    Category:
                </td>
                <td class="edittext">
                    <select name="category" style="width: 500px" class="editinput">
                        [{foreach from=$categories item=value key=name}]
                            [{if $category == $value }]
                                <option value="[{$value}]" selected>[{$value}]</option>
                            [{else}]
                                <option value="[{$value}]">[{$value}]</option>
                            [{/if}]
                        [{/foreach}]
                    </select>
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    Image URL:
                </td>
                [{foreach from=$images item=url}]
                    <td class="edittext" style="float: left; margin-right: 10px; padding: 10px; border: 1px solid #cccccc;">
                        <label>
                            [{if $url == $imageUrl }]
                                <input type="radio" name="imageUrl" value="[{$url}]" checked>
                            [{else}]
                                <input type="radio" name="imageUrl" value="[{$url}]">
                            [{/if}]
                            <img style="height: 100px" src="[{$url}]">
                        </label>
                    </td>
                [{/foreach}]
            </tr>

            <tr>
                <td class="edittext">
                    Product URL:
                </td>
                <td class="edittext">
                    <p>[{$homeUrl}]</p>
                    <input type="hidden" name="homeUrl" value="[{$homeUrl}]">
                </td>
            </tr>

            [{if $oView->hasLinkedObject() }]
                <tr>
                    <td class="edittext">
                        PayPal ID:
                    </td>
                    <td class="edittext">
                        <p>[{$linkedObject->id}]</p>
                        <input type="hidden" name="id" value="[{$linkedObject->id}]">
                        <input type="hidden" name="paypalProductId" value="[{$linkedObject->id}]">
                    </td>
                </tr>

                <tr>
                    <td colspan="100"><h3>Billing Cycles</h3></td>
                </tr>

            <tr>
                <td colspan="100">
                    <table id="billingCycleList" style="width: 50%;">
                        <tr>
                            <th style="width: 20%; text-align: left">Price</th>
                            <th style="width: 20%; text-align: left">Frequency</th>
                            <th style="width: 20%; text-align: left">Tenure</th>
                            <th style="width: 20%; text-align: left">Sequence</th>
                            <th style="width: 20%; text-align: left">Cycles</th>
                        </tr>

                        [{if $hasSubscriptionPlan }]
                            <script>let cycleCount=0;</script>
                            [{foreach from=$linkedSubscriptionPlan->billing_cycles item=billing_cycle key=name}]
                                <tr class="cycleData">
                                    <td align="left">[{$billing_cycle->pricing_scheme->fixed_price->currency_code}] [{$billing_cycle->pricing_scheme->fixed_price->value}]</td>
                                    <td align="left">[{$billing_cycle->frequency->interval_count}] [{$billing_cycle->frequency->interval_unit}]</td>
                                    <td align="left">[{$billing_cycle->tenure_type}]</td>
                                    <td align="left">[{$billing_cycle->sequence}]</td>
                                    <td align="left">[{$billing_cycle->total_cycles}]</td>
                                    <input type="hidden" required="required" name="fixed_price[]" value="[{$billing_cycle->pricing_scheme->fixed_price->value}]" />
                                    <input type="hidden" required="required" name="interval[]" value="[{$billing_cycle->frequency->interval_count}]" />
                                    <input type="hidden" required="required" name="tenure[]" value="[{$billing_cycle->tenure_type}]" />
                                    <input type="hidden" required="required" name="sequence[]" value="[{$billing_cycle->sequence}]" />
                                    <input type="hidden" required="required" name="total_cycles[]" value="[{$billing_cycle->total_cycles}]" />
                                </tr>
                                <script>cycleCount++;</script>
                            [{/foreach}]
                        [{/if}]
                    </table>
                </td>
            </tr>

            [{if !$hasSubscriptionPlan }]
                <tr>
                    <td colspan="100"><h3>Add Billing Cycles</h3></td>
                </tr>
                <tr>
                    <td class="edittext">
                        Price:
                    </td>
                    <td class="edittext">
                        <input type="text" required="required" class="editinput" size="80" name="fixed_price_val" id="fixed_price_val" value=""/>
                    </td>
                </tr>

                <tr>
                    <td class="edittext">
                        Frequency:
                    </td>
                    <td class="edittext">
                        <select name="interval_val" id="interval_val" style="width: 500px" class="editinput">
                            [{foreach from=$defaultIntervals item=value key=name}]
                                <option value="[{$value}]">[{$value}]</option>
                            [{/foreach}]
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="edittext">
                        Tenure:
                    </td>
                    <td class="edittext">
                        <select name="tenure_val" id="tenure_val" style="width: 500px" class="editinput">
                            [{foreach from=$defaultTenureTypes item=value key=name}]
                                <option value="[{$value}]">[{$value}]</option>
                            [{/foreach}]
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="edittext">
                        Sequence:
                    </td>
                    <td class="edittext">
                        <select name="sequence_val" id="sequence_val" style="width: 500px" class="editinput">
                            [{foreach from=$defaultSequences item=value key=name}]
                                <option value="[{$value}]">[{$value}]</option>
                            [{/foreach}]
                        </select>
                    </td>
                </tr>

            <tr>
                <td class="edittext">
                    Total Cycles:
                </td>
                <td class="edittext">
                    <select name="total_cycles_val" id="total_cycles_val" style="width: 500px" class="editinput">
                        [{foreach from=$defaultTotalCycles item=value key=name}]
                            <option value="[{$value}]">[{$value}]</option>
                        [{/foreach}]
                    </select>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    <input type="button" class="edittext" name="addBillingCycle" value='Add' onClick="window.addCycle()" [{ $readonly }]><br>
                </td>
            </tr>

        [{/if}]

        <tr>
            <td colspan="100"><h3>Payment Preferences</h3></td>
        </tr>

        <tr>
            <td class="edittext">
                Automatically Bill Outstanding:
            </td>
            <td class="edittext">
                <select name="auto_bill_outstanding" id="auto_bill_outstanding" style="width: 500px" class="editinput">
                    <option value="true"[{if $linkedSubscriptionPlan->payment_preferences->auto_bill_outstanding == true}]selected[{/if}]>Yes</option>
                    <option value="false"[{if $linkedSubscriptionPlan->payment_preferences->auto_bill_outstanding == false}]selected[{/if}]>No</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Setup Fee Failure Action:
            </td>
            <td class="edittext">
                <select name="setup_fee_failure_action" id="setup_fee_failure_action" style="width: 500px" class="editinput">
                    <option value="CONTINUE"[{if $linkedSubscriptionPlan->payment_preferences->setup_fee_failure_action == 'CONTINUE'}]selected[{/if}]>Continue</option>
                    <option value="CANCEL"[{if $linkedSubscriptionPlan->payment_preferences->setup_fee_failure_action == 'CANCEL'}]selected[{/if}]>Cancel</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Setup Fee
            </td>
            <td class="edittext">
                <input type="text" required="required" class="editinput" size="80" name="setup_fee" value="[{$linkedSubscriptionPlan->payment_preferences->setup_fee->value}]">
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Setup Fee currency:
            </td>
            <td class="edittext">
                [{if !$hasSubscriptionPlan }]
                <select name="setup_fee_currency" id="setup_fee_currency" style="width: 500px" class="editinput">
                    [{foreach from=$currencyCodes item=value key=name}]
                        <option value="[{$value}]"[{if $linkedSubscriptionPlan->payment_preferences->setup_fee->currency_code == $value}]selected[{/if}]>[{$value}]</option>
                    [{/foreach}]
                </select>
                [{else}]
                    <p>[{$linkedSubscriptionPlan->payment_preferences->setup_fee->currency_code}]</p>
                [{/if}]
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Payment Failure Threshold:
            </td>
            <td class="edittext">
                <select name="payment_failure_threshold" id="payment_failure_threshold" style="width: 500px" class="editinput">
                    [{foreach from=$defaultTotalCycles item=value key=name}]
                    <option value="[{$value}]"[{if $linkedSubscriptionPlan->payment_preferences->payment_failure_threshold == $value}]selected[{/if}]>[{$value}]</option>
                    [{/foreach}]
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="100"><h3>Subscription Plans</h3></td>
        </tr>

        <tr>
            <td class="edittext">
                [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_NAME"}]:
            </td>
            <td class="edittext">
                [{if !$hasSubscriptionPlan }]
                    <input type="text" required="required" class="editinput" size="80" name="billing_plan_name" value="[{$title}] Billing Plan">
                [{else}]
                    [{$linkedSubscriptionPlan->name}]
                [{/if}]
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Description:
            </td>
            <td class="edittext">
                <input type="text" required="required" class="editinput" size="80" name="billingPlanDescription" value="[{$linkedSubscriptionPlan->description}]">
            </td>
        </tr>

        <tr>
            <td colspan="100"><h3>Taxes</h3></td>
        </tr>

        <tr>
            <td class="edittext">
                Percentage:
            </td>
            <td class="edittext">
                <input type="text" required="required" class="editinput" size="80"  name="tax_percentage" value="[{$linkedSubscriptionPlan->taxes->percentage}]">
            </td>
        </tr>

        <tr>
            <td class="edittext">
                Inclusive:
            </td>
            <td class="edittext">
                [{if !$hasSubscriptionPlan }]
                    <select name="tax_inclusive" id="tax_inclusive" style="width: 500px" class="editinput">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                [{else}]
                    [{$linkedSubscriptionPlan->taxes->inclusive}]
                [{/if}]
            </td>
        </tr>

        [{/if}]

            <tr>
                [{if $hasLinkedObject }]
                    <td class="edittext">
                        <input type="button" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="window.validatePPForm('patch')" [{ $readonly }]><br>
                    </td>
                    <td class="edittext">
                        <input type="button" class="edittext" name="unlink" value='[{ oxmultilang ident="ARTICLE_REVIEW_DELETE" }]' onClick="window.validatePPForm('unlink')" [{ $readonly }]><br>
                    </td>
                [{else}]
                    <td class="edittext">
                        <input type="button" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="window.validatePPForm('save')" [{ $readonly }]><br>
                    </td>
                [{/if}]
            </tr>
        </tbody>
    </table>
</form>

<script>
    jQuery(function() {
        window.validatePPForm = function(saveType) {
            let isValid = true;
            document.myedit.fnc.value=saveType;
            if(saveType === 'save') {
                jQuery('#myedit *').filter(':input').each(function(){
                    let thisElement = jQuery(this);
                    if (thisElement.attr('required') === true) {
                        if(thisElement.val().length < 1) {
                            console.log(thisElement.val());
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
                    jQuery("#myedit").submit();
                }
            };

            if(saveType === 'patch') {
                jQuery('#myedit *').filter(':input').each(function(){
                    let thisElement = jQuery(this);
                    if (thisElement.attr('required') === true) {
                        if(thisElement.val().length < 1) {
                            console.log(thisElement.val());
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
                    jQuery("#myedit").submit();
                }
            }

            if(saveType === 'unlink') {
                jQuery("#myedit").submit();
            }
        };

        window.addCycle = function() {
            if (typeof cycleCount !== "undefined") {
                cycleCount++;
            }

            let price = jQuery('#fixed_price_val').val();
            let frequency = jQuery('#interval_val option:selected').text();
            let tenure = jQuery('#tenure_val option:selected').text();
            let sequence = jQuery('#sequence_val option:selected').text();
            let totalCycles = jQuery('#total_cycles_val option:selected').text();

            if(price.length < 1) {
                jQuery('#fixed_price_val').css('border', '1px solid #ff0000');
            } else {
                jQuery('#fixed_price_val').css('border', '1px solid #cccccc');
                let html = '<tr class="cycleData">';
                html += '<td align="left">' + price + '</td>';
                html += '<td align="left">' + frequency + '</td>';
                html += '<td align="left">' + tenure + '</td>';
                html += '<td align="left">' + sequence + '</td>';
                html += '<td align="left">' + totalCycles + '</td>';
                html += '</tr>';

                html += '<input type="hidden" name="fixed_price[]" value="' + price + '" />';
                html += '<input type="hidden" name="interval[]" value="' + frequency + '" />';
                html += '<input type="hidden" name="tenure[]" value="' + tenure + '" />';
                html += '<input type="hidden" name="sequence[]" value="' + sequence + '" />';
                html += '<input type="hidden" name="total_cycles[]" value="' + totalCycles + '" />';

                jQuery("#billingCycleList").append(html);

            }
        };
    });

</script>

[{include file="bottomitem.tpl"}]