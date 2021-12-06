<?php

/**
 * This file is part of OXID eSales PayPal module.
 *
 * OXID eSales PayPal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales PayPal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales PayPal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */

namespace OxidProfessionalServices\PayPal\Core\Utils;

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Application\Model\Country;
use VIISON\AddressSplitter\AddressSplitter;
use VIISON\AddressSplitter\Exceptions\SplittingException;

class PayPalAddressResponseToOxidAddress
{
    /**
     * @param obj $response PayPal Response
     * @param string $DBTablePrefix
     * @return array
     */
    public static function mapAddress(\OxidProfessionalServices\PayPal\Api\Model\Orders\Order $response, string $DBTablePrefix): array
    {
        $country = oxNew(Country::class);
        $countryId = $country->getIdByCode($response->purchase_units[0]->shipping->address->country_code);
        $country->load($countryId);
        $countryName = $country->oxcountry__oxtitle->value;
        $street = '';
        $streetNo = '';
        try {
            $streetTmp = $response->purchase_units[0]->shipping->address->address_line_1;
            $addressData = AddressSplitter::splitAddress($streetTmp);
            $street = $addressData['streetName'] ?? '';
            $streetNo = $addressData['houseNumber'] ?? '';
        } catch (SplittingException $e) {
            // The Address could not be split
            $street = $streetTmp;
        }

        return [
            $DBTablePrefix . 'oxfname' => $response->payer->name->given_name,
            $DBTablePrefix . 'oxlname' => $response->payer->name->surname,
            $DBTablePrefix . 'oxstreet' => $street,
            $DBTablePrefix . 'oxstreetnr' => $streetNo,
            $DBTablePrefix . 'oxcity' => $response->purchase_units[0]->shipping->address->admin_area_2,
            $DBTablePrefix . 'oxcountryid' => $countryId,
            $DBTablePrefix . 'oxcountry' => $countryName,
            $DBTablePrefix . 'oxzip' => $response->purchase_units[0]->shipping->address->postal_code,
        ];
    }
}
