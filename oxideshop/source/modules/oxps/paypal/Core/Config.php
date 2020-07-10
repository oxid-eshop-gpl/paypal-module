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

namespace OxidProfessionalServices\PayPal\Core;

use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class Config
 */
class Config
{
    /**
     * Checks if module configurations are valid
     *
     * @throws StandardException
     */
    public function checkHealth(): void
    {
        if (
            (
                !$this->isSandbox() &&
                !$this->getClientId() &&
                !$this->getClientSecret()
            ) ||
            (
                $this->isSandbox() &&
                !$this->getSandboxClientId() &&
                !$this->getSandboxClientSecret()
            )
        ) {

            throw oxNew(StandardException::class);
        }
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return (bool) Registry::getConfig()->getConfigParam('blPaypalSandboxMode');
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return (string) Registry::getConfig()->getConfigParam('sPaypalClientId');
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return (string) Registry::getConfig()->getConfigParam('sPaypalClientSecret');
    }

    /**
     * @return string
     */
    public function getSandboxClientId(): string
    {
        return (string) Registry::getConfig()->getConfigParam('sPaypalSandboxClientId');
    }

    /**
     * @return string
     */
    public function getSandboxClientSecret(): string
    {
        return (string) Registry::getConfig()->getConfigParam('sPaypalSandboxClientSecret');
    }
}
