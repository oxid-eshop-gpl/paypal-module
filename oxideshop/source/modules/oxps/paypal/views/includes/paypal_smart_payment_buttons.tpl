[{capture name="paypal_init"}]

[{if !$paymentStrategy}]
    [{assign var="paymentStrategy" value="continue"}]
[{/if}]

[{literal}]
paypal.Buttons({
    createOrder: function(data, actions) {
        return fetch('[{/literal}][{$oViewConf->getSelfLink()|cat:"cl=PayPalProxyController&fnc=createOrder&context="|cat:$paymentStrategy}][{literal}]', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            [{/literal}]
            [{if $oViewConf->getTopActiveClassName()=="payment" && $paymentStrategy=="continue"}]
                if (data.id && data.status == "CREATED") {
                    $("#payment_oxidpaypal").prop( "checked", true);
                    $('#paymentNextStepBottom').trigger("click");
                }
            [{/if}]
            [{literal}]
            return data.id;
        })
    },
    onApprove: function(data, actions) {
        captureData = new FormData();
        captureData.append('orderID', data.orderID);
        return fetch('[{/literal}][{$oViewConf->getSelfLink()|cat:"cl=PayPalProxyController&fnc=captureOrder&context="|cat:$paymentStrategy}][{literal}]', {
            method: 'post',
            body: captureData
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            console.log('Transaction funds captured from ' + data.payer.name.given_name);
        })
    },
    onCancel: function(data, actions) {
    },
    onError: function (data) {
    }
}).render('#paypal-button-container');
[{/literal}]
[{/capture}]

<div id="paypal-button-container" class="[{$buttonClass}]"></div>

[{oxscript include=$oViewConf->getPayPalJsSdkUrl($paymentStrategy)}]
[{oxscript add=$smarty.capture.paypal_init}]