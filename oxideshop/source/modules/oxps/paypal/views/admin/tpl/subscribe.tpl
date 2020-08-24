[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{assign var="oxid" value=$oView->getEditObjectId()}]
[{assign var="edit" value=$oView->getEditObject()}]
[{assign var="categories" value=$oView->getCategories()}]
[{assign var="types" value=$oView->getTypes()}]
[{assign var="images" value=$oView->getDisplayImages()}]
[{assign var="productUrl" value=$oView->getProductUrl()}]
[{assign var="hasLinkedObject" value=$oView->hasLinkedObject()}]

[{if $hasLinkedObject }]
    [{assign var="linkedObject" value=$oView->getLinkedObject()}]
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


                    <input type="text" class="editinput" size="80" name="title" value="[{$title}]" [{ $readonly }]>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    Description:
                </td>
                <td class="edittext">
                    <textarea class="editinput" style="width: 500px" rows="10" name="description">[{$description}]</textarea>
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
                        PAYPAL ID:
                    </td>
                    <td class="edittext">
                        <p>[{$linkedObject->id}]</p>
                        <input type="hidden" name="id" value="[{$linkedObject->id}]">
                        <input type="hidden" name="paypalProductId" value="[{$linkedObject->id}]">
                    </td>
                </tr>
            [{/if}]
            <tr>
                <td class="edittext">
                    <input type="submit" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="Javascript:document.myedit.fnc.value='save'" [{ $readonly }]><br>
                </td>
                [{if $hasLinkedObject }]
                <td class="edittext">
                    <input type="submit" class="edittext" name="unlink" value='[{ oxmultilang ident="ARTICLE_REVIEW_DELETE" }]' onClick="Javascript:document.myedit.fnc.value='unlink'" [{ $readonly }]><br>
                </td>
                [{/if}]
            </tr>
        </tbody>
    </table>
</form>

[{include file="bottomitem.tpl"}]