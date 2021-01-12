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
[{assign var="existingVariants" value=$oView->getVariantProducts()}]
[{assign var="subscriptionPlansList" value=$oView->getSubscriptionPlans()}]

[{if $hasLinkedObject }]
    [{assign var="linkedObject" value=$oView->getLinkedObject()}]
[{/if}]

[{if $hasSubscriptionPlan }]
    [{assign var="linkedSubscriptionPlan" value=$oView->getSubscriptionPlan()}]
[{/if}]

[{if !empty($error)}]
    <div class="alert alert-danger" role="alert">
        [{$error}]
    </div>
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

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="PaypalSubscribeController">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>


    <h3>[{ oxmultilang ident="PAYPAL_SUBSCRIBE_MAIN" }]</h3>

    <table style="width: 100%;">
        <tr>
            <td style="vertical-align: top; width: 50%">
                [{include file="subscription_form.tpl"}]
                [{if $oView->hasLinkedObject() }]
                    [{include file="billing_plan.tpl" title="billingplan"}]
                [{/if}]

            </td>
            <td style="vertical-align: top;">
                [{if $oView->hasLinkedObject() }]
                    [{include file="billing_plan_data.tpl"}]
                [{/if}]
            </td>
        </tr>
    </table>


[{include file="bottomitem.tpl"}]
