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

namespace Paypal\Tests\Unit\Core;

use OxidEsales\TestingLibrary\UnitTestCase;
use OxidProfessionalServices\PayPal\Api\Model\Orders\OrderRequest;
use OxidProfessionalServices\PayPal\Core\OrderRequestFactory;
use OxidEsales\Eshop\Application\Model\Order;
use PHPUnit\Framework\MockObject\MockBuilder;

class OrderRequestFactoryTest extends UnitTestCase
{
    public function testGetRequest()
    {
        $this->markTestSkipped();
        $sut = new OrderRequestFactory();
        /** @var MockBuilder $orderMockBuilder */
        $orderMockBuilder = $this->getMockBuilder(Order::class);
        $orderMockBuilder->setMethods(['getId', 'getOrderCurrency', 'getTotalOrderSum']);
        $orderMock = $orderMockBuilder->getMock();

        $orderMock->method('getId')->willReturn('123');
        $currency = new stdClass();
        $currency->name = 'USD';
        $orderMock->method('getOrderCurrency')->willReturn($currency);
        $orderMock->method('getTotalOrderSum')->willReturn('123.00');

        $result = [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'reference_id' => '123',
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => '123.00'
                    ]
                ]
            ]
        ];

        $this->assertEquals(
            json_encode(
                $result
            ),
            json_encode(
                $sut->getRequest(
                    $orderMock,
                    OrderRequest::INTENT_CAPTURE
                )
            )
        );
    }
}
