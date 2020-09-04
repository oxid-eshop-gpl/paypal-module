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
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Money;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Subscriptions\ShippingDetail;
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
            $this->addTplParam('subscription', $this->getSubscription());
            $this->addTplParam('payPalSubscription', $this->getPayPalSubscription());
        } catch (ApiException $exception) {
            if ($exception->shouldDisplay()) {
                $this->addTplParam('error', $exception->getErrorDescription());
            }
            Registry::getLogger()->error($exception);
        }

        return parent::render();
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
        $shippingAddress = $request->getRequestEscapedParameter('shippingAddress');
        $shippingAmount = $request->getRequestEscapedParameter('shippingAmount');
        $statusChangeNote = $request->getRequestEscapedParameter('statusChangeNote');

        $patches = [];

        if ($shippingAddress) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/subscriber/shipping_address/address',
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



        if ($statusChangeNote) {
            $patches[] = new Patch([
                'op' => Patch::OP_REPLACE,
                'path' => '/status_change_note',
                'value' => $statusChangeNote,
            ]);
        }

        /** @var ServiceFactory $serviceFactory */
        $serviceFactory = Registry::get(ServiceFactory::class);
        $subscriptionService = $serviceFactory->getSubscriptionService();

        $subscriptionService->updateSubscription($this->getPayPalSubscription()->id, $patches);
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
