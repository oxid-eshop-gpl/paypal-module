[{assign var="oxid" value=$oView->getEditObjectId()}]
[{assign var="edit" value=$oView->getEditObject()}]
[{assign var="categories" value=$oView->getCategories()}]
[{assign var="types" value=$oView->getTypes()}]
[{assign var="images" value=$oView->getDisplayImages()}]
[{assign var="imagesCount" value=$images|@count}]
[{math equation="x + y" x=$imagesCount y=1 assign="imagesCountPlus"}]
[{assign var="productUrl" value=$oView->getProductUrl()}]
[{assign var="hasLinkedObject" value=$oView->hasLinkedObject()}]
[{assign var="hasSubscriptionPlan" value=$oView->hasSubscriptionPlan()}]
[{assign var="defaultIntervals" value=$oView->getIntervalDefaults()}]
[{assign var="defaultTenureTypes" value=$oView->getTenureTypeDefaults()}]
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
<form name="subscriptionForm" id="subscriptionForm" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="PayPalSubscribeController">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="paypalProductId" value="[{ $oView->getPayPalProductId() }]">

    <table cellspacing="0" cellpadding="0" border="0" width="98%" style="border: 1px solid #cccccc; padding: 10px; margin: 10px; border-radius: 10px;">
        <tbody>
            <tr>
                <td colspan="[{$imagesCountPlus}]">
                    <h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_SUBSCRIPTION_PROD"}]</h3>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_NAME" suffix="COLON"}]
                </td>
                <td class="edittext" colspan="[{$imagesCount}]">
                    <input type="hidden" name="title" id="title" value="[{$title}]" [{ $readonly }]>
                    <b>[{$title}]</b>
                    [{oxinputhelp ident="HELP_OXPS_PAYPAL_PRODUCT_NAME"}]
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_DESCRIPTION" suffix="COLON"}]
                </td>
                <td class="edittext" colspan="[{$imagesCount}]">
                    <input type="hidden" name="description" id="description" value="[{$description}]" [{ $readonly }]>
                    <b>[{$description}]</b>
                    [{oxinputhelp ident="HELP_OXPS_PAYPAL_PRODUCT_DESCRIPTION"}]
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_TYPE" suffix="COLON"}]
                </td>
                <td class="edittext" colspan="[{$imagesCount}]">
                    <select name="productType" style="width: 200px" class="editinput pform">
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
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_TYPE_CATEGORY" suffix="COLON"}]
                </td>
                <td class="edittext" colspan="[{$imagesCount}]">
                    <select name="category" style="width:200px" class="editinput pform">
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
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_IMAGE"}]
                    [{oxinputhelp ident="HELP_OXPS_PAYPAL_PRODUCT_IMAGE"}]:
                </td>
                [{foreach from=$images item=image}]
                    <td class="edittext" style="float: left; margin-right: 10px; padding: 10px; border: 1px solid #cccccc;">
                        <label>
                            <input type="radio" name="imageUrl" value="[{$image.masterUrl}]" class="pform"[{if $image.masterUrl == $imageUrl }] checked[{/if}] />
                            <img style="height: 100px" src="[{$image.imageUrl}]" />
                        </label>
                    </td>
                [{/foreach}]
            </tr>
            <tr>
                <td class="edittext">
                    [{oxmultilang ident="OXPS_PAYPAL_PRODUCT_URL" suffix="COLON"}]
                </td>
                <td class="edittext" colspan="[{$imagesCount}]">
                    <p>[{$homeUrl}]</p>
                    <input type="hidden" name="homeUrl" value="[{$homeUrl}]">
                </td>
            </tr>
            <tr>
                <td colspan="[{$imagesCountPlus}]">
                    <h3>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_ACTIONS"}]</h3>
                </td>
            </tr>
            <tr>
                <td class="edittext" colspan="[{$imagesCountPlus}]">
                    [{if $hasLinkedObject }]
                        <input type="button" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="window.validateSubscriptionProductForm('saveProduct')">&nbsp;
                        <input type="button" class="edittext" name="unlink" value='[{ oxmultilang ident="ARTICLE_REVIEW_DELETE" }]' onClick="window.validateSubscriptionProductForm('unlink')"><br>
                    [{else}]
                        <input type="button" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="window.validateSubscriptionProductForm('saveProduct')"><br>
                    [{/if}]
                </td>
            </tr>
        </tbody>
    </table>
</form>
[{capture assign="sPayPalSubscriptionFormJS"}]
    [{strip}]
        jQuery(document).ready(function(){
            window.validateSubscriptionProductForm = function(saveType) {
                let isValid = false;
                document.subscriptionForm.fnc.value=saveType;
                if(saveType === 'saveProduct') {
                    jQuery('#subscriptionForm *').filter(':input').each(function(){
                        let thisElement = jQuery(this);
                        if (thisElement.attr('required') === true) {
                            if(thisElement.val().length < 1) {
                                thisElement.css('border', '1px solid #ff0000');
                                return false;
                            } else {
                                isValid = true;
                                thisElement.css('border', '1px solid #cccccc');
                            }
                        }
                    });

                    if (isValid) {
                        jQuery("#subscriptionForm").submit();
                    }
                };

                if(saveType === 'patch') {
                    jQuery('#subscriptionForm *').filter(':input').each(function(){
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

                    if (isValid) {
                        jQuery("#subscriptionForm").submit();
                    }
                }

                if(saveType === 'unlink') {
                    jQuery("#subscriptionForm").submit();
                }
            };
        });
    [{/strip}]
[{/capture}]

[{oxscript add=$sPayPalSubscriptionFormJS}]
