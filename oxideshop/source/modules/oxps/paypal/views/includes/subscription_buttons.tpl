[{oxscript include=$oViewConf->getPayPalJsSdkUrl($paymentStrategy, true)}]
[{capture assign="paypal_init"}]
    [{assign var="sSelfLink" value=$oViewConf->getSelfLink()|replace:"&amp;":"&"}]
    [{assign var="sCleanLink" value=$selfLink|replace:"?":""}]
    [{if !$aid}]
        [{assign var="aid" value=""}]
    [{/if}]
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
            [{/literal}]
                [{if $isLoggedIn}]
                    [{literal}]
                        return fetch('[{/literal}][{$sSelfLink|cat:"cl=PayPalProxyController&fnc=createSubscriptionOrder&aid="|cat:$aid|cat:"&stoken="|cat:$oViewConf->getSessionChallengeToken()}][{literal}]', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json'
                            }
                            }).then(function(data) {
                                return actions.subscription.create({"plan_id":"[{/literal}][{$subscriptionPlan->id}][{literal}]"});
                            })
                    [{/literal}]
                [{else}]
                    [{literal}]return window.location.href="[{/literal}][{$sCleanLink|cat:"/mein-konto?return="|cat:$currentUrl}][{literal}]"[{/literal}]
                [{/if}]
            [{literal}]
        },
        onApprove: function(data, actions) {
            document.getElementById("overlay").style.display = "block";
            let params = 'cl=PayPalProxyController&fnc=saveSubscriptionOrder&subscriptionId=' + data.subscriptionID;
            params += '&subscriptionPlanId=[{/literal}][{$subscriptionPlan->id}][{literal}]';
            params += '&aid=[{/literal}][{$aid}][{literal}]';
            params += '&showOverlay=1';
            params += '&stoken=[{/literal}][{$oViewConf->getSessionChallengeToken()}][{literal}]';
            fetch('[{/literal}][{$sSelfLink}][{literal}]' + params, {
                method: 'post',
                headers: {
                    'content-type': 'application/json'
                }
            }).then(function(data) {
                document.getElementById("overlay").style.display = "block";
                window.location.href="[{/literal}][{$sSelfLink|cat:"cl=order&func=doOrder&subscribe=1&showOverlay=1"|cat:"&stoken="|cat:$oViewConf->getSessionChallengeToken()}][{literal}]"
            })
        },
        onCancel: function(data, actions) {
            window.location.href="[{/literal}][{$sSelfLink}][{literal}]"
            console.log('Consumer cancelled the PayPal Subscription Flow. No action required.');
        }
    }).render('#[{/literal}][{$buttonId}][{literal}]');
    [{/literal}]
[{/capture}]
[{oxscript add=$paypal_init}]
