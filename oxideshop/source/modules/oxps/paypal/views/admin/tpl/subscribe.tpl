[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{assign var="oxid" value=$oView->getEditObjectId()}]
[{assign var="edit" value=$oView->getEditObject()}]

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="PayPal">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="paypalProductId" value="[{ $paypalProductId }]">
    <h3>[{ oxmultilang ident="PAYPAL_SUBSCRIBE_MAIN" }]</h3>

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

    <div class="[{$class}]">
        Name: <input name="title" value="[{$editval[title]}]" [{ $readonly }]>
        Description: <textarea name="description">[{$editval[description]}]" </textarea>
        Product Type:  <select><option>xx</option></select>
        Category:  <select><option>xx</option></select>
    </div>
    <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="GENERAL_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'" [{ $readonly }]><br>
</form>

[{include file="bottomitem.tpl"}]