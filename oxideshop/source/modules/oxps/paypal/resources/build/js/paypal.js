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

// Short-Handle for document.ready
$(function () {
    var $oPaymentSelectionPaypal = $('#payment_oxidpaypal'),
        $oPaymentSelectionList = $('input[name ="paymentid"]'),
        $oPaymentSelectionNextStepBottom = $('#paymentNextStepBottom');

    $oPaymentSelectionList.click(function () {
        $oPaymentSelectionNextStepBottom.show();
    });

    $oPaymentSelectionPaypal.click(function () {
        if ($oPaymentSelectionPaypal.attr('data-paypal-checkoutsessionid') == "") {
            $oPaymentSelectionNextStepBottom.hide();
        }
    });
});