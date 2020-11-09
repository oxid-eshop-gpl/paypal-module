[{if $aVariantSelections.blPerfectFit}]
    [{oxscript include=$oViewConf->getPayPalJsSdkUrl($paymentStrategy, true)}]
    [{capture name="paypal_init"}]
    [{assign var="sSelfLink" value=$oViewConf->getSelfLink()|replace:"&amp;":"&"}]
    [{literal}]

    paypal.Buttons({
        style: {
            color: 'gold',
            shape: 'rect',
            label: 'subscribe',
            height: 55
        },
        onInit: function() {
            console.log("PayPal JS SDK was initialized. No action required.");
        },
        createSubscription: function(data, actions) {
            return fetch('[{/literal}][{$sSelfLink|cat:"cl=PayPalProxyController&fnc=createOrder&context="|cat:$paymentStrategy|cat:"&aid="|cat:$aid}][{literal}]', {
            method: 'post',
            headers: {
            'content-type': 'application/json'
            }
            }).then(function(data) {
                return actions.subscription.create({"plan_id":"[{/literal}][{$subscriptionPlan->id}][{literal}]"});
            })
        },
        onApprove: function(data, actions) {
            console.log(data);
            console.log(actions);
            window.location.href="[{/literal}][{$sSelfLink|cat:"cl=order"}][{literal}]"
        },
        onCancel: function(data, actions) {
            console.log('Consumer cancelled the PayPal Subscription Flow. No action required.');
        }
    }).render('#paypal-button-container');

    $(document).ready(function() {
        $('#variants .dropdown-menu li a').off('click');
        $('#variants .dropdown-menu li a').click(function (e) {
            e.preventDefault();
            var href = $(this).attr('href');
            window.location.href=href;
        });
    });

    [{/literal}]
    [{/capture}]

    [{else}]
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
        location.replace('[{$sSelfLink|cat:"cl=basket&subscribe=1"}]');
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
    [{oxscript include=$oViewConf->getPayPalJsSdkUrl($paymentStrategy, false)}]
    [{/if}]

<div id="paypal-button-container" class="[{$buttonClass}]"></div>
[{oxscript add=$smarty.capture.paypal_init}]
