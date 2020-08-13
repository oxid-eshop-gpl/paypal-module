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
            console.log(data);
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
        console.log("Customer cancelled the PayPal Checkout Flow");
    },
    onError: function () {
        console.log("An Error occurred as part of the PayPal JS SDK");
    }
}).render('#paypal-button-container');
[{/literal}]
[{/capture}]

<div id="paypal-button-container"></div>

[{oxscript include=$oViewConf->getPayPalJsSdkUrl($buttonCommit)}]
[{oxscript add=$smarty.capture.paypal_init}]