[{include file="headitem.tpl" title="paypal"}]
<div id="content" class="paypal-config">
    <h1>[{oxmultilang ident="paypal"}] [{oxmultilang ident="OXPS_PAYPAL_CONFIG"}]</h1>
    <div class="alert alert-[{if $Errors.paypal_error}]danger[{else}]success[{/if}]" role="alert">
        [{if $Errors.paypal_error}]
            [{oxmultilang ident="OXPS_PAYPAL_ERR_CONF_INVALID"}]
        [{else}]
            [{oxmultilang ident="OXPS_PAYPAL_CONF_VALID"}]
        [{/if}]
    </div>

    <form action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="save">

        <label for="opmode">[{oxmultilang ident="OXPS_PAYPAL_OPMODE"}]</label>
        <div class="controls">
            <select name="conf[blPaypalSandboxMode]" id="opmode" class="form-control">
                <option value="sandbox" [{if $config->isSandbox()}]selected[{/if}]>
                    [{oxmultilang ident="OXPS_PAYPAL_OPMODE_SANDBOX"}]
                </option>
                <option value="prod" [{if !$config->isSandbox()}]selected[{/if}]>
                    [{oxmultilang ident="OXPS_PAYPAL_OPMODE_PROD"}]
                </option>
            </select>
            <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_OPMODE"}]</span>
        </div>

        <h3>[{oxmultilang ident="OXPS_PAYPAL_LIVE_CREDENTIALS"}]</h3>

        <div class="form-group">
            <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <textarea id="client-id" name="conf[sPaypalClientId]">[{$config->getClientId()}]</textarea>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label for="client-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <textarea id="client-secret" name="conf[sPaypalClientSecret]">[{$config->getClientSecret()}]</textarea>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_SECRET"}]</span>
            </div>
        </div>

        <h3>[{oxmultilang ident="OXPS_PAYPAL_SANDBOX_CREDENTIALS"}]</h3>

        <div class="form-group">
            <label for="client-sandbox-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <textarea id="client-sandbox-id" name="conf[sPaypalSandboxClientId]">[{$config->getSandboxClientId()}]</textarea>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label for="client-sandbox-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <textarea id="client-sandbox-secret" name="conf[sPaypalSandboxClientSecret]">[{$config->getSandboxClientSecret()}]</textarea>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET"}]</span>
            </div>
        </div>

        <button type="submit" class="btn btn-default bottom-space">[{oxmultilang ident="SAVE"}]</button>
    </form>
</div>
[{include file="bottomitem.tpl"}]