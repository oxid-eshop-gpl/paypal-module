<?php

namespace OxidProfessionalServices\PayPal\Model;

/**
 * Class PayPalArticle
 * created to manage the link between the oxid article and the paypal subscribable product
 * @package OxidProfessionalServices\PayPal\Model
 */
class PayPalArticle extends PayPalArticle_parent
{
    /**
     * @return bool
     */
    public function isPayPalProductLinked()
    {
        return $this->getPaypalProductId() !== "";
    }

    /**
     * @return bool
     */
    public function isThisOrParentPayPalProductLinked()
    {
        return $this->isPayPalProductLinked() || $this->getPaypalParentArticle()->isPayPalProductLinked();
    }

    /**
     * @return string
     */
    public function getPaypalProductId(): string
    {
        return (string) $this->getFieldData("PaypalProductId");
    }

    /**
     * @return bool
     */
    public function isPayPalProductLinkedByParentOnly()
    {
        $parent = $this->getPaypalParentArticle();
        return (!$this->isPayPalProductLinked()) && $parent->isPayPalProductLinked();
    }

    /**
     * @return $this
     */
    public function getPaypalParentArticle()
    {
        $parent = $this->getParentArticle();
        assert($parent instanceof self);
        return $parent;
    }
}
