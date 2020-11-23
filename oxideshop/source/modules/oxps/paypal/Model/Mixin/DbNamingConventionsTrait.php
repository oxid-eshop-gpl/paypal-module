<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Model\Mixin;

/**
 * Converts short field names to longer ones that follow module column naming conventions
 */
trait DbNamingConventionsTrait
{
    private $prefix = 'oxpspaypal';

    private $ignoreFields = [
        'oxid',
        'oxtimestamp'
    ];

    /**
     * Adds behaviour that prepends field names with module name
     *
     * @param $fieldName
     *
     * @return string
     */
    protected function _getFieldLongName($fieldName)
    {
        if (
            array_search(strtolower($fieldName), $this->ignoreFields, true) === false &&
            strpos(strtolower($fieldName), $this->prefix) !== 0
        ) {
            $fieldName = $this->prefix . $fieldName;
        }

        return parent::_getFieldLongName($fieldName);
    }
}