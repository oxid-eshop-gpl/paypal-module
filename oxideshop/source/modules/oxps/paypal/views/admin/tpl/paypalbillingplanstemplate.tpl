[{include file="headitem.tpl" title="paypal"}]

<div id="content" class="paypal-config">
    <h1>Billing Cycles</h1>

    <form name="billingCycleForm" action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="save">

        <label for="client-id">Type</label>
        <div class="controls">
            <select name="" id="" class="form-control">
                <option value="FIXED">
                    FIXED
                </option>
                <option value="INFINITE">
                    INFINITE
                </option>
            </select>
        </div>
        <br />
        <div class="form-group">
            <label for="client-id">Description</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-id" name="conf[sPayPalClientId]" value="" />
            </div>
        </div>
        <br />
        <br />
        <label for="client-id">Payment Definitions</label>
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
