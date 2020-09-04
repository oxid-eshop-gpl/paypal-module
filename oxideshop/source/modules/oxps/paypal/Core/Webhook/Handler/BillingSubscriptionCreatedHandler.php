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

namespace OxidProfessionalServices\PayPal\Core\Webhook\Handler;

use OxidProfessionalServices\PayPal\Core\Webhook\Event;
use OxidProfessionalServices\PayPal\Model\Subscription;

class BillingSubscriptionCreatedHandler implements HandlerInterface
{
    /**
     * @inheritDoc
     */
    public function handle(Event $event): void
    {
        $data = $event->getData()['resource'];
        $subscription = oxNew(Subscription::class);
        $fieldValues = [
            'id' => $data['id'] ?? '',
            'planid' => $data['plan_id'] ?? '',
            'email' => $data['subscriber']['email_address'] ?? '',
            'status' => $data['status'] ?? '',
            'createtime' => $data['create_time'] ?? '',
            'updatetime' => $data['upate_time'] ?? '',
            'starttime' => $data['start_time'] ?? '',
            'statusupdatetime' => $data['status_update_time'] ?? '',
        ];
        $subscription->assign($fieldValues);
        $subscription->save();
    }
}
