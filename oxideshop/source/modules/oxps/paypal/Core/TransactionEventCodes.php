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

namespace OxidProfessionalServices\PayPal\Core;

/**
 * Class TransactionEventCodes
 * @package OxidProfessionalServices\PayPal\Core
 * @see https://developer.paypal.com/docs/integration/direct/transaction-search/transaction-event-codes/
 */
class TransactionEventCodes
{
    public const EVENT_CODES = [
        'T00' => ['T0000','T0001','T0002','T0003','T0004','T0005','T0006','T0007','T0008','T0009','T0010','T0011',
                  'T0012','T0013','T0014','T0015','T0016','T0017','T0018','T0019'],
        'T01' => ['T0100','T0101','T0102','T0103','T0104','T0105','T0106','T0107','T0108','T0109','T0110','T0111',
                  'T0112','T0113'],
        'T02' => ['T0200', 'T0201','T0202'],
        'T03' => ['T0300','T0301','T0302','T0303'],
        'T04' => ['T0400','T0401'],
        'T05' => ['T0500','T0501','T0502','T0503','T0504','T0505'],
        'T06' => ['T0600'],
        'T07' => ['T0700','T0701'],
        'T08' => ['T0800','T0801','T0802','T0803','T0804','T0805','T0806','T0807','T0808'],
        'T09' => ['T0900','T0901','T0902','T0903','T0904','T0905'],
        'T10' => ['T1000'],
        'T11' => ['T1100','T1101','T1102','T1103','T1104','T1105','T1106','T1107','T1108','T1109','T1110','T1111',
                  'T1112','T1113','T1114','T1115','T1116','T1117','T1118','T1119'],
        'T12' => ['T1200','T1201','T1202','T1203','T1204','T1205','T1207','T1208','T1300','T1301','T1302',
                  'T1400','T1500','T1501','T1502','T1503'],
        'T16' => ['T1600','T1601','T1602','T1603'],
        'T17' => ['T1700','T1701'],
        'T18' => ['T1800','T1801'],
        'T19' => ['T1900'],
        'T20' => ['T2000','T2001','T2002','T2003'],
        'T21' => ['T2101','T2102','T2103','T2104','T2105','T2106','T2107','T2108','T2109','T2110','T2111',
                  'T2112','T2113'],
        'T22' => ['T2201'],
        'T30' => ['T3000'],
        'T50' => ['T5000','T5001'],
        'T97' => ['T9700','T9701','T9702'],
        'T98' => ['T9800'],
        'T99' => ['T9900']
    ];
}
