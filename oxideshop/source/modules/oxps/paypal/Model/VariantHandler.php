<?php

/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @category      module
 * @package       VariantSelection
 * @author        OXID Professional services
 * @link          http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Model;

use OxidEsales\Eshop\Application\Model\VariantSelectList;
use OxidEsales\Eshop\Application\Model\Article;

/**
 * Class VariantHandler
 *
 * @package OBO\VariantSelection\Application\Model
 */
class VariantHandler extends VariantHandler_parent
{
    /**
     * Builds variant selections list - array containing oxVariantSelectList
     *
     * @param array $aVarSelects variant selection titles
     * @param array $aSelections variant selections
     *
     * @return array
     * @deprecated underscore prefix violates PSR12, will be renamed to "buildVariantSelectionsList" in next major
     * @phpcs:disable PSR2.Methods.MethodDeclaration.Underscore
     */
    protected function _buildVariantSelectionsList($aVarSelects, $aSelections)
    {
        // creating selection lists
        foreach ($aVarSelects as $iKey => $sLabel) {
            $aVariantSelections[$iKey] = oxNew(VariantSelectList::class, $sLabel, $iKey);
        }

        // building variant selections
        foreach ($aSelections as $aId => $aLineSelections) {
            $variant = oxNew(Article::class);
            $variant->load($aId);
            foreach ($aLineSelections as $oPos => $aLine) {
                $aVariantSelections[$oPos]->addVariant(
                    $aLine['name'],
                    $aLine['hash'],
                    $aLine['disabled'],
                    $aLine['active'],
                    $variant->getLink()
                );
            }
        }

        return $aVariantSelections;
    }
}
