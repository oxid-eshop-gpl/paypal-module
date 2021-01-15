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

namespace PayPal\Tests\Unit\Core;

use OxidEsales\TestingLibrary\UnitTestCase;
use OxidProfessionalServices\PayPal\Core\Logger;
use OxidProfessionalServices\PayPal\Repository\LogRepository;

class LoggerTest extends UnitTestCase
{
    /** @var Logger */
    private $logger;

    /** @var string */
    private $testLogFile = 'paypal_test.log';

    protected function setUp()
    {
        $this->logger = new Logger($this->testLogFile);
    }

    public function testLogMessage(): void
    {
        $identifier = 'unit_test_' . time();

        $this->logger->info('test info message', [
            'userId' => 'unit_test_user_id',
            'orderId' => 'unit_test_order_id',
            'shopId' => 'unit_test_shop_id',
            'statusCode' => '200',
            'identifier' => $identifier,
            'amount' => '120.97'
        ]);

        $fileContents = file_get_contents(getcwd() . '/../../../source/log/' . $this->testLogFile);
        $this->assertContains($identifier, $fileContents);

        $this->markTestIncomplete("More testing needed here");
    }

    public function testGetRepository(): void
    {
        $this->assertInstanceOf(LogRepository::class, $this->logger->getRepository());
    }
}
