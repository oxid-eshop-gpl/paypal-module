<div id="[{$buttonId}]" class="paypal-button-container [{$buttonClass}]"></div>
[{oxscript include=$oViewConf->getPayPalJsSdkUrl($paymentStrategy, false)}]
[{capture assign="paypal_init"}]
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
            [{if $paymentStrategy=="pay_now"}]
                location.replace('[{$sSelfLink|cat:"cl=order"}]');
            [{*elseif $paymentStrategy=="pay_later" @Todo PSPAYPAL-492*}]
            [{elseif $oViewConf->getTopActiveClassName()=="details" && $paymentStrategy=="continue"}]
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
    }).render('#[{/literal}][{$buttonId}][{literal}]');
    [{/literal}]
[{/capture}]
[{oxscript add=$paypal_init}]
