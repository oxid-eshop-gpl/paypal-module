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

namespace OxidProfessionalServices\PayPal\Controller\Admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Money;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\ShippingDetail;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionActivateRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCancelRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionCaptureRequest;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\SubscriptionSuspendRequest;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Subscription as PayPalSubscription;
use OxidProfessionalServices\PayPal\Model\Subscription;

class SubscriptionDetailsController extends AdminController
{
    /**
     * @var Subscription
     */
    private $subscription;

    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTemplateName('paypal_subscription_details.tpl');
    }

    /**
     * @inheritDoc
     */
    public function executeFunction($functionName)
    {
        try {
            parent::executeFunction($functionName);
        } catch (ApiException $exception) {
            $this->addTplParam('error', $exception->getErrorDescription());
            Registry::getLogger()->error($exception);
        }
    }

    /**
     * @inheritDoc
     *
     * @throws StandardException
     */
    public function render()
    {
        try {
            $paypalSubscription = $this->getPayPalSubscription();
            $product = $this->getSubscriptionProduct($paypalSubscription->id);
            $this->addTplParam('subscription', $this->getSubscription());
            $this->addTplParam('payPalSubscription', $paypalSubscription);
            $this->addTplParam('subscriptionProduct', $product);
        } catch (ApiException $exception) {
            if ($exception->shouldDisplay()) {
                $this->addTplParam('error', $exception->getErrorDescription());
            }
            Registry::getLogger()->error($exception);
        }

        return parent::render();
    }

    private function getSubscriptionProduct(string $paypalSubscriptionId)
    {
        $sql = 'SELECT OXPS_PAYPAL_PRODUCT_ID, 
                       OXPS_PAYPAL_OXARTICLE_ID
                  FROM oxps_paypal_subscription_product_order 
                 WHERE OXPS_PAYPAL_SESSION_ID = ?';

        $subscriptionProductId = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)
            ->getOne(
                $sql, [
                    $paypalSubscriptionId
                ]
            );

        return Registry::get(ServiceFactory::class)->getCatalogService()->showProductDetails($subscriptionProductId);
    }

    /**
     * Updates subscription
     *
     * @throws ApiException
     * @throws StandardException
     */
    public function update()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        $shippingAddress = $request->getRequestEscapedParameter('shippingAddress');
        $shippingAmount = $request->getRequestEscapedParameter('shippingAmount');
        $billingInfo = $request->getRequestEscapedParameter('billingInfo');

        $patches = [];

        if ($shippingAddress) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/subscriber/shipping_address',
                'value' => new ShippingDetail($shippingAddress),
            ]);
        }

        if ($shippingAmount) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/shipping_amount',
                'value' => new Money($shippingAmount),
            ]);
        }

        $outstandingBalance = $billingInfo['outstanding-balance'] ?? null;

        if ($outstandingBalance) {
            $patches[] = new Patch([
               'op' => Patch::OP_REPLACE,
               'path' => '/billing_info/outstanding_balance',
               'value' => new Money($outstandingBalance),
            ]);
        }

        $subscriptionService->updateSubscription($subscriptionId, $patches);
    }

    /**
     * Updates subscription status
     */
    public function updateStatus()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        if ($status = $request->getRequestEscapedParameter('status')) {
            $statusNote = $request->getRequestEscapedParameter('statusNote');
            switch ($status) {
                case 'ACTIVE':
                    $subscriptionService->activateSubscription(
                        $subscriptionId,
                        new SubscriptionActivateRequest(['reason' => $statusNote])
                    );
                    break;
                case 'SUSPENDED':
                    $subscriptionService->suspendSubscription(
                        $subscriptionId,
                        new SubscriptionSuspendRequest(['reason' => $statusNote])
                    );
                    break;
                case 'CANCELED':
                    $subscriptionService->cancelSubscription(
                        $subscriptionId,
                        new SubscriptionCancelRequest(['reason' => $statusNote])
                    );
                    break;
            }
        }
    }

    /**
     * Captures outstanding subscription fee
     */
    public function captureOutstandingFee()
    {
        $request = Registry::getRequest();
        $subscriptionId = $this->getPayPalSubscription()->id;

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        $params = [
            'note' => $request->getRequestEscapedParameter('captureNote'),
            'capture_type' => SubscriptionCaptureRequest::CAPTURE_TYPE_OUTSTANDING_BALANCE,
            'amount' => $request->getRequestEscapedParameter('outstandingFee')
        ];

        $subscriptionService->captureAuthorizedPaymentOnSubscription(
            $subscriptionId,
            new SubscriptionCaptureRequest($params)
        );
    }

    /**
     * @return string
     */
    public function getListLink()
    {
        $viewConfig = $this->getViewConfig();
        $request = Registry::getRequest();

        $params = [
            'cl' => 'PaypalSubscriptionController',
            'jumppage' => $request->getRequestEscapedParameter('jumppage'),
            'filters' => $request->getRequestEscapedParameter('filters') ?
                json_decode($request->getRequestEscapedParameter('filters')) : null,
        ];

        return $viewConfig->getSelfLink() . http_build_query(array_filter($params));
    }

    /**
     * Get active subscription
     *
     * @return Subscription
     * @throws StandardException
     */
    private function getSubscription(): Subscription
    {
        if (!$this->subscription) {
            $subscriptionId = $this->getEditObjectId();
            $subscription = oxNew(Subscription::class);
            if ($subscriptionId === null || !$subscription->load($subscriptionId)) {
                throw new StandardException('Subscription not found');
            }
            $this->subscription = $subscription;
        }

        return $this->subscription;
    }

    /**
     * Get associated PayPal subscription
     *
     * @return PayPalSubscription
     * @throws ApiException
     * @throws StandardException
     */
    private function getPayPalSubscription(): PayPalSubscription
    {
        $subscription = $this->getSubscription();

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        return $subscriptionService->showSubscriptionDetails($subscription->getPayPalId(), 'last_failed_payment');
    }
}
