<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Application\Model\Selection;

/**
 * Variant selection lists manager class
 *
 */
class VariantSelectList extends VariantSelectList_parent
{
    /**
     * Adds given variant info to current variant selection list
     *
     * @param string $sName             selection name
     * @param string $sValue            selection value
     * @param string $blDisabled        selection state - disabled/enabled
     * @param string $blActive          selection state - active/inactive
     * @param string $variantLink       selection value
     */
    public function addVariant($sName, $sValue, $blDisabled, $blActive, $variantLink = null)
    {
        $sName = trim($sName);
        //#6053 Allow "0" as a valid value.
        if (!empty($sName) || $sName === '0') {
            $sKey = $sValue;

            // creating new
            if (!isset($this->_aList[$sKey])) {
                // Passing here $variantLink value to set actual link in the variant selection list
                $this->_aList[$sKey] = oxNew(Selection::class, $sName, $sValue, $blDisabled, $blActive, $variantLink);
            } else {
                // overriding states
                if ($this->_aList[$sKey]->isDisabled() && !$blDisabled) {
                    $this->_aList[$sKey]->setDisabled($blDisabled);
                }

                if (!$this->_aList[$sKey]->isActive() && $blActive) {
                    $this->_aList[$sKey]->setActiveState($blActive);
                }
            }

            // storing active selection
            if ($this->_aList[$sKey]->isActive()) {
                $this->_oActiveSelection = $this->_aList[$sKey];
            }
        }
    }
}
