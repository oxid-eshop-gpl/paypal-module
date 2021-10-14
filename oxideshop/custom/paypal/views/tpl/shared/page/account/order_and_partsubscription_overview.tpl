[{assign var="payPalParentSubscription" value=$order->getPayPalParentSubscription()}]
[{if $payPalParentSubscription}]
<p>
    [{oxmultilang ident="OXPS_PAYPAL_SUBSCRITION_PART_NOTE" suffix="COLON"}]
    [{$payPalParentSubscription.oxorder__oxordernr->value}]
</p>
