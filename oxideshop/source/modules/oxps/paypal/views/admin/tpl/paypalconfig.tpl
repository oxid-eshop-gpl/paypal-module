[{include file="headitem.tpl" title="paypal"}]
[{assign var="isSandBox" value=$config->isSandbox()}]
<script>
    window.isSandBox = '[{$isSandBox}]';
    window.selfLink = '[{$oViewConf->getSelfLink()|replace:"&amp;":"&"}]';
</script>

<div id="content" class="paypal-config">
    <h1>[{oxmultilang ident="paypal"}] [{oxmultilang ident="OXPS_PAYPAL_CONFIG"}]</h1>
    <div class="alert alert-[{if $Errors.paypal_error}]danger[{else}]success[{/if}]" role="alert">
        [{if $Errors.paypal_error}]
            [{oxmultilang ident="OXPS_PAYPAL_ERR_CONF_INVALID"}]
        [{else}]
            [{oxmultilang ident="OXPS_PAYPAL_CONF_VALID"}]
        [{/if}]
    </div>

    <form name="configForm" action="[{$oViewConf->getSelfLink()}]">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="save">

        <label for="opmode">[{oxmultilang ident="OXPS_PAYPAL_OPMODE"}]</label>
        <div class="controls">
            <select name="conf[blPayPalSandboxMode]" id="opmode" class="form-control">
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

        [{assign var='liveMerchantSignUpLink' value=$oView->getLiveSignUpMerchantIntegrationLink()}]
        <p class="live"><a target="_blank"
              href="[{$liveMerchantSignUpLink}]"
              data-paypal-button="PPLtBlue">
                [{oxmultilang ident="OXPS_PAYPAL_LIVE_BUTTON_CREDENTIALS"}]
           </a>
        </p>

        <h3 class="live">[{oxmultilang ident="OXPS_PAYPAL_LIVE_CREDENTIALS"}]</h3>

        <div class="form-group live">
            <label for="client-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-id" name="conf[sPayPalClientId]" value="[{$config->getLiveClientId()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group live">
            <label for="client-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-secret" name="conf[sPayPalClientSecret]" value="[{$config->getLiveClientSecret()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_CLIENT_SECRET"}]</span>
            </div>
        </div>

        [{assign var='sandboxMerchantSignUpLink' value=$oView->getSandboxSignUpMerchantIntegrationLink()}]

        <p class="sandbox"><a target="_blank"
              href="[{$sandboxMerchantSignUpLink}]"
              data-paypal-onboard-complete="onboardedCallbackSandbox"
              data-paypal-button="PPLtBlue">
                [{oxmultilang ident="OXPS_PAYPAL_SANDBOX_BUTTON_CREDENTIALS"}]
            </a>
        </p>

        <h3 class="sandbox">[{oxmultilang ident="OXPS_PAYPAL_SANDBOX_CREDENTIALS"}]</h3>

        <div class="form-group sandbox">
            <label for="client-sandbox-id">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_ID"}]</label>
            <div class="controls">
                <input type="text" class="form-control" id="client-sandbox-id" name="conf[sPayPalSandboxClientId]" value="[{$config->getSandboxClientId()}]" />
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID"}]</span>
            </div>
        </div>

        <div class="form-group sandbox">
            <label for="client-sandbox-secret">[{oxmultilang ident="OXPS_PAYPAL_CLIENT_SECRET"}]</label>
            <div class="controls">
                <div>
                    <input type="text" class="form-control" id="client-sandbox-secret" name="conf[sPayPalSandboxClientSecret]" value="[{$config->getSandboxClientSecret()}]" />
                </div>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label >[{oxmultilang ident="OXPS_PAYPAL_BUTTON_PLACEMEMT_TITLE"}]</label>
            <div class="controls">
                <div>
                    <div class="checkbox"><label><input type="checkbox" name="conf[blPayPalShowProductDetailsButton]" [{if $config->showPayPalProductDetailsButton()}]checked[{/if}] value="1">[{oxmultilang ident="OXPS_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT"}]</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="conf[blPayPalShowMiniBasketButton]" [{if $config->showPayPalMiniBasketButton()}]checked[{/if}] value="1">[{oxmultilang ident="OXPS_PAYPAL_MINI_BASKET_BUTTON_PLACEMENT"}]</label></div>
                    <div class="checkbox"><label><input type="checkbox" name="conf[blPayPalShowAddToBasketModalButton]" [{if $config->showPayPalAddToBasketModalButton()}]checked[{/if}] value="1">[{oxmultilang ident="OXPS_PAYPAL_ADD_TO_BASKET_MODAL_PLACEMENT"}]</label></div>
                </div>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_BUTTON_PLACEMEMT"}]</span>
            </div>
        </div>

        <h3>[{oxmultilang ident="OXPS_PAYPAL_WEBHOOK_TITLE"}]</h3>

        <div class="form-group">
            <label for="webhook-id">[{oxmultilang ident="OXPS_PAYPAL_WEBHOOK_ID"}]</label>
            <div class="controls">
                <div>
                    <input type="text" class="form-control" id="webhook-id" name="conf[sPayPalWebhookId]" value="[{$config->getWebhookId()}]" />
                </div>
                <span class="help-block">[{oxmultilang ident="OXPS_PAYPAL_WEBHOOK_ID_HELP"}]</span>
            </div>
        </div>

        <div class="form-group">
            <label for="webhook-url">[{oxmultilang ident="OXPS_PAYPAL_WEBHOOK_URL"}]</label>
            <div class="controls">
                <div class="input-group">
                    <input class="form-control" id="webhook-url" type="text" value="[{$oView->getWebhookControllerUrl()}]" readonly>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="copyToClipboard('#webhook-url')">Copy</button>
                    </span>
                </div>
                <span class="help-block">[{oxmultilang ident="HELP_OXPS_PAYPAL_WEBHOOK_URL"}]</span>
            </div>
        </div>

        <button type="submit" class="btn btn-default bottom-space">[{oxmultilang ident="SAVE"}]</button>
    </form>
</div>
[{include file="bottomitem.tpl"}]

<script id="paypal-js" src="https://www.sandbox.paypal.com/webapps/merchantboarding/js/lib/lightbox/partner.js"></script>
<script>
    jQuery(document).ready(function(){
        if(window.isSandBox) {
            displayByOpMode('sandbox');
        } else {
            displayByOpMode('live');
        }

        jQuery("#opmode").change(function() {
            if(jQuery("#opmode").val() == 'sandbox') {
                window.isSandBox = true;
            } else {
                window.isSandBox = false;
            }

            displayByOpMode(jQuery("#opmode").val());
        });
    });

    function displayByOpMode(opmode) {
        if(opmode === 'sandbox') {
            jQuery(".live").hide();
            jQuery(".sandbox").show();
        } else {
            jQuery(".sandbox").hide();
            jQuery(".live").show();
        }
    }
</script>