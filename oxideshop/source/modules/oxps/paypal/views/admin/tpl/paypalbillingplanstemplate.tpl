[{include file="headitem.tpl" title="paypal"}]

<div id="content" class="paypal-config">
    <h1>[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_MAIN"}]</h1>

    <form name="billingCycleForm" action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="save">
        <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_TYPE"}]</label>
        <div class="controls">
            <select name="" id="" class="form-control">
                <option value="FIXED">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_FIXED"}]
                </option>
                <option value="INFINITE">
                    [{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_INFINITE"}]
                </option>
            </select>
        </div>
        <br />
        <div class="form-group">
            <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_DESCRIPTION"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-id" name="conf[sPayPalClientId]" value="" />
            </div>
        </div>
        <br />
        <br />
        <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_BILLING_PLAN_DEFINITIONS"}]</label>
        <div class="controls">
            <select name="conf[blPayPalSandboxMode]" id="opmode" class="form-control">
            </select>
        </div>
        <br />
        <br />
        <button type="submit" class="btn btn-default bottom-space">[{oxmultilang ident="SAVE"}]</button>
    </form>
</div>
[{include file="bottomitem.tpl"}]
