[{capture name="paypal_init"}]
[{literal}]
paypal.Buttons({
    createOrder: function(data, actions) {
        return fetch('[{/literal}][{$oViewConf->getSelfLink()|cat:"cl=PayPalProxyController&fnc=createOrder"}][{literal}]', {
            method: 'post',
            headers: {
                'content-type': 'application/json'
            }
        }).then(function(res) {
            return res.json();
        }).then(function(data) {
            [{/literal}]
            [{if $oViewConf->getTopActiveClassName()=="payment" && !$buttonCommit}]
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
        return fetch('[{/literal}][{$oViewConf->getSelfLink()|cat:"=PayPalProxyController&fnc=captureOrder"}][{literal}]', {
            method: 'post',
            body: captureData
        }).then(function(res) {
            return res.json();
        }).then(function(details) {
            alert('Transaction funds captured from ' + details.payer.name.given_name);
        })
    },
    onCancel: function(data, actions) {
    },
    onError: function () {
    }
}).render('#paypal-button-container');
[{/literal}]
[{/capture}]

<div id="paypal-button-container" class="[{$buttonClass}]"></div>

[{oxscript include=$oViewConf->getPayPalJsSdkUrl($buttonCommit)}]
[{oxscript add=$smarty.capture.paypal_init}]