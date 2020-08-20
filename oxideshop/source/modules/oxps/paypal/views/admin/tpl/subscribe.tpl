[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{assign var="oxid" value=$oView->getEditObjectId()}]
[{assign var="edit" value=$oView->getEditObject()}]
[{assign var="categories" value=$oView->getCategories()}]
[{assign var="types" value=$oView->getTypes()}]
[{assign var="images" value=$oView->getDisplayImages()}]
[{assign var="productUrl" value=$oView->getProductUrl()}]

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

            <tr>
                <td class="edittext">
                    Name:
                </td>
                <td class="edittext">
                    <input type="text" class="editinput" size="80" name="title" value="[{$edit->oxarticles__oxtitle->value}]" [{ $readonly }]>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    Description:
                </td>
                <td class="edittext">
                    <textarea class="editinput" style="width: 500px" rows="10" name="description">[{$edit->oxarticles__oxshortdesc->value}]</textarea>
                </td>
            </tr>
            <tr>
                <td class="edittext">
                    Product Type:
                </td>
                <td class="edittext">
                     <select name="productType" style="width: 500px" class="editinput">
                         [{foreach from=$types item=value key=name}]
                             <option value="[{$value}]">[{$value}]</option>
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
                            <option value="[{$value}]">[{$value}]</option>
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
                            <input type="radio" name="imageUrl" value="[{$url}]" checked>
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
                    <p>[{$productUrl}]</p>
                    <input type="hidden" name="homeUrl" value="[{$productUrl}]">
                </td>
            </tr>

            <tr>
                <td class="edittext">
                    <input type="submit" class="edittext" name="save" value='[{ oxmultilang ident="GENERAL_SAVE" }]' onClick="Javascript:document.myedit.fnc.value='save'" [{ $readonly }]><br>
                </td>
            </tr>

        </tbody>
    </table>
</form>

[{include file="bottomitem.tpl"}]