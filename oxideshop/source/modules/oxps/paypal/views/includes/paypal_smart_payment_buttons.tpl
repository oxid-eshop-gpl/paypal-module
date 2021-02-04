[{capture name="paypal_init"}]
[{if !$paymentStrategy}]
    [{assign var="paymentStrategy" value="continue"}]
[{/if}]
[{if !$aid}]
    [{assign var="aid" value=""}]
[{/if}]
[{assign var="sSelfLink" value=$oViewConf->getSelfLink()|replace:"&amp;":"&"}]
[{literal}]
paypal.Buttons({
    createOrder: function(data, actions) {
        return fetch('[{/literal}][{$sSelfLink|cat:"cl=PayPalProxyController&fnc=createOrder&context="|cat:$paymentStrategy|cat:"&aid="|cat:$aid}][{literal}]', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            [{/literal}]
            [{literal}]
            return data.id;
        })
    },
    onApprove: function(data, actions) {
        captureData = new FormData();
        captureData.append('orderID', data.orderID);
        return fetch('[{/literal}][{$sSelfLink|cat:"cl=PayPalProxyController&fnc=captureOrder&context="|cat:$paymentStrategy|cat:"&aid="|cat:$aid}][{literal}]', {
            method: 'post',
            body: captureData
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            [{/literal}]
            [{if $oViewConf->getTopActiveClassName()=="details" && $paymentStrategy=="continue"}]
                //location.reload();
                location.replace('[{$sSelfLink|cat:"cl=basket"}]');
            [{elseif $oViewConf->getTopActiveClassName()=="payment" && $paymentStrategy=="continue"}]
                if (data.id && data.status == "APPROVED") {
                    $("#payment_oxidpaypal").prop( "checked", true);
                    $('#paymentNextStepBottom').trigger("click");
                }
            [{/if}]
            [{literal}]
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