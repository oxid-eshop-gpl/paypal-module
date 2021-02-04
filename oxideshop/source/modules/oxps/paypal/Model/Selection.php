<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidProfessionalServices\PayPal\Model;

/**
 * Variant selection container class
 *
 */
class Selection extends Selection_parent
{
    /**
     * Selection value
     *
     * @var string
     */
    protected $sLink = null;

    /**
     * Initializes oxSelection object
     *
     * @param string $sName      selection name
     * @param string $sValue     selection value
     * @param string $blDisabled selection state - disabled/enabled
     * @param string $blActive   selection state - active/inactive
     * @param string $sLink      selection link
     * @phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
     */
    public function __construct($sName, $sValue, $blDisabled, $blActive, $sLink = null)
    {
        $this->_sName = $sName;
        $this->_sValue = $sValue;
        $this->_blDisabled = $blDisabled;
        $this->_blActive = $blActive;
        $this->sLink = $sLink;
    }

    /**
     * Returns selection link (currently returns "#")
     * Return selection link or #
     *
     * @return string
     */
    public function getLink()
    {
        if (!empty($this->sLink)) {
            return $this->sLink;
        }
        return "#";
    }
}
