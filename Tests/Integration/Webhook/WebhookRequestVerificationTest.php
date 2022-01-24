<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidSolutionCatalysts\PayPal\Tests\Integration\Webhook;

use OxidEsales\Eshop\Core\Registry as EshopRegistry;
use OxidEsales\TestingLibrary\UnitTestCase;
use OxidSolutionCatalysts\PayPal\Core\ServiceFactory;
use OxidSolutionCatalysts\PayPal\Core\Webhook\Exception\EventVerificationException;
use OxidSolutionCatalysts\PayPal\Core\Webhook\EventVerifier as WebhookRequestValidator;
use OxidSolutionCatalysts\PayPalApi\Service\GenericService;

final class WebhookRequestVerificationTest extends UnitTestCase
{
    private  $defaultHeaders =  [
        'PAYPAL-CERT-URL' => '',
        'PAYPAL-AUTH-ALGO' => '',
        'PAYPAL-TRANSMISSION-ID' => '',
        'PAYPAL-TRANSMISSION-SIG' => '',
        'PAYPAL-TRANSMISSION-TIME' => ''
    ];

    public function testInvalidRequestNoHeaders(): void
    {
        $validator = oxNew(WebhookRequestValidator::class);

        $this->expectException(EventVerificationException::class);
        $this->expectExceptionMessage(EventVerificationException::missingHeaders()->getMessage());

        $validator->verify([], '');
    }

    public function testInvalidRequestIncorrectHeaders(): void
    {
        $validator = oxNew(WebhookRequestValidator::class);
        $headers = array_chunk($this->defaultHeaders, 2);

        $this->expectException(EventVerificationException::class);
        $this->expectExceptionMessage(EventVerificationException::missingHeaders()->getMessage());

        $validator->verify($headers, '');
    }

    public function testInvalidRequestCorrectHeadersMissingStatus(): void
    {
        $validator = oxNew(WebhookRequestValidator::class);
        $this->setServiceFactoryMock([]);

        $this->expectException(EventVerificationException::class);
        $this->expectExceptionMessage(EventVerificationException::verificationFailed()->getMessage());

        $validator->verify($this->defaultHeaders, '');
    }

    public function testInvalidRequestNoSuccessStatus(): void
    {
        $validator = oxNew(WebhookRequestValidator::class);
        $this->setServiceFactoryMock([]);

        $this->expectException(EventVerificationException::class);
        $this->expectExceptionMessage(EventVerificationException::verificationFailed()->getMessage());

        $validator->verify($this->defaultHeaders, '');
    }

    public function testValidRequest(): void
    {
        $validator = oxNew(WebhookRequestValidator::class);
        $this->setServiceFactoryMock(['verification_status' => 'SUCCESS']);

        $validator->verify($this->defaultHeaders, '');
    }

    private function setServiceFactoryMock(array $verificationResponse): void
    {
        $notificationServiceMock =  $this->getMockBuilder(GenericService::class)
            ->disableOriginalConstructor()
            ->getMock();
        $notificationServiceMock->expects($this->any())
            ->method('request')
            ->willReturn($verificationResponse);

        $serviceFactoryMock = $this->getMockBuilder(ServiceFactory::class)
            ->getMock();
        $serviceFactoryMock->expects($this->any())
            ->method('getNotificationService')
            ->willReturn($notificationServiceMock);

        EshopRegistry::set(ServiceFactory::class, $serviceFactoryMock);
    }
}