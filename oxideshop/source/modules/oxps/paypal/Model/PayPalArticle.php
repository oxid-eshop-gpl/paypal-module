<?php

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Application\Model\Article;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\BillingCycle;

/**
 * Class PayPalArticle
 * created to manage the link between the oxid article and the paypal subscribable product
 * @mixin Article
 */
class PayPalArticle extends PayPalArticle_parent
{
    /**
     * @return bool
     */
    public function isPayPalProductLinked()
    {
        return $this->getPayPalProductId() !== "";
    }

    /**
     * @return bool
     */
    public function isThisOrParentPayPalProductLinked()
    {
        return $this->isPayPalProductLinked() || $this->getPayPalParentArticle()->isPayPalProductLinked();
    }

    /**
     * @return string
     */
    public function getPayPalProductId(): string
    {
        return (string) $this->getFieldData("PayPalProductId");
    }

    /**
     * @return bool
     */
    public function isPayPalProductLinkedByParentOnly()
    {
        $parent = $this->getPayPalParentArticle();
        return (!$this->isPayPalProductLinked()) && $parent->isPayPalProductLinked();
    }

    /**
     * @return $this
     */
    public function getPayPalParentArticle()
    {
        $parent = $this->getParentArticle();
        assert($parent instanceof self);
        return $parent;
    }

    /**
     * @param PayPalArticle $product
     * @param array $billingCycles
     * @return BillingCycle|null
     */
    public function getVariantData(PayPalArticle $product, array $billingCycles)
    {
        $return = null;

        /** @var BillingCycle $cycle */
        foreach ($billingCycles as $cycle) {
            $tenure = $cycle->frequency->interval_count . ' ' . $cycle->frequency->interval_unit .
                ' (' . $cycle->tenure_type . ')';
            $oxvarselect = $product->oxarticles__oxvarselect->value;

            if ($tenure == $oxvarselect) {
                $return = $cycle;
                break;
            }
        }

        return $return;
    }
}
