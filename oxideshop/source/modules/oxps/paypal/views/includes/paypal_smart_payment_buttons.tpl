[{assign var="config" value=$oViewConf->getPayPalConfig()}]
[{assign var="clientId" value=$config->getSandboxClientId()}]

[{capture name="paypal_init"}]
[{literal}]
paypal.Buttons({
    createOrder: function(data, actions) {
        return fetch('/index.php?cl=PayPalProxyController&fnc=createOrder', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {

        });
    },
    onApprove: function(data, actions) {
        return fetch('/index.php?cl=PayPalProxyController&fnc=captureOrder', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {

        });
    }
}).render('#paypal-button-container');
[{/literal}]
[{/capture}]

<div id="paypal-button-container"></div>

[{oxscript include="https://www.paypal.com/sdk/js?client-id="|cat:$clientId}]
[{oxscript add=$smarty.capture.paypal_init}]