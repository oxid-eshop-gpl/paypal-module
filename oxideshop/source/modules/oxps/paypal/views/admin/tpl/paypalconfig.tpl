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
                <option value="live" [{if !$config->isSandbox()}]selected[{/if}]>
                    [{oxmultilang ident="OXPS_PAYPAL_OPMODE_LIVE"}]
                </option>
            </select>
            <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_OPMODE"}]</span>
        </div>

        <h2>[{oxmultilang ident="OXPS_PAYPAL_CREDENTIALS"}]</h2>

        <p class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CREDENTIALS"}]</p>

        <p><a target="_blank" data-paypal-onboard-complete="onboardedCallbackLive"
            href="[{$oView->getLiveSignUpMerchantIntegrationLink()}]" data-paypal-button="PPLtBlue">
                [{oxmultilang ident="OXPS_PAYPAL_LIVE_BUTTON_CREDENTIALS"}]
           </a>
        </p>

        <p><a target="_blank" data-paypal-onboard-complete="onboardedCallbackSandbox"
            href="[{$oView->getLiveSignUpMerchantIntegrationLink()}]" data-paypal-button="PPLtBlue">
                [{oxmultilang ident="OXPS_PAYPAL_SANDBOX_BUTTON_CREDENTIALS"}]
            </a>
        </p>

        <h3>[{oxmultilang ident="OXPS_PAYPAL_LIVE_CREDENTIALS"}]</h3>

        <div class="form-group">
            <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-id" name="conf[sPaypalClientId]" value="[{$config->getClientId()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label for="client-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-secret" name="conf[sPaypalClientSecret]" value="[{$config->getClientSecret()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_SECRET"}]</span>
            </div>
        </div>

        <h3>[{oxmultilang ident="OXPS_PAYPAL_SANDBOX_CREDENTIALS"}]</h3>

        <div class="form-group">
            <label for="client-sandbox-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-sandbox-id" name="conf[sPaypalSandboxClientId]" value="[{$config->getSandboxClientId()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label for="client-sandbox-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-sandbox-secret" name="conf[sPaypalSandboxClientSecret]" value="[{$config->getSandboxClientSecret()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET"}]</span>
            </div>
        </div>

        <button type="submit" class="btn btn-default bottom-space">[{oxmultilang ident="SAVE"}]</button>
    </form>
</div>
[{include file="bottomitem.tpl"}]