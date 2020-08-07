<?php

namespace OxidProfessionalServices\PayPal\Model;

/**
 * Class PayPalArticle
 * created to manage the link between the oxid article and the paypal subscribable product
 * @package OxidProfessionalServices\PayPal\Model
 */
class PayPalArticle extends PayPalArticle_parent
{
    public function isPayPalProductLinked()
    {
        return $this->getPaypalProductId() !== "";
    }

    public function isThisOrParentPayPalProductLinked()
    {
        return $this->isPayPalProductLinked() || $this->getPaypalParentArticle()->isPayPalProductLinked();
    }

    public function getPaypalProductId(): string
    {
        return (string) $this->getFieldData("PaypalProductId");
    }

    public function isPayPalProductLinkedByParentOnly()
    {
        $parent = $this->getPaypalParentArticle();
        return (!$this->isPayPalProductLinked()) && $parent->isPayPalProductLinked();
    }

    public function getPaypalParentArticle(): self {
        $parent = $this->getParentArticle();
        assert($parent instanceof self);
        return $parent;
    }
}
