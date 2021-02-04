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

function copyToClipboard(element)
{
    document.querySelector(element).select();
    document.execCommand('copy');
}

function onboardedCallbackLive(authCode, sharedId)
{
    callOnboardingControllerAutoConfigurationFromCallback(authCode, sharedId, false);
}

function onboardedCallbackSandbox(authCode, sharedId)
{
    callOnboardingControllerAutoConfigurationFromCallback(authCode, sharedId, true);
}

function callOnboardingControllerAutoConfigurationFromCallback(authCode, sharedId, isSandBox)
{
    fetch(window.selfLink + 'cl=OnboardingController&fnc=autoConfigurationFromCallback', {
        method: 'POST',
        headers: {
            'content-type': 'application/json'
        },
        body: JSON.stringify({
            authCode: authCode,
            sharedId: sharedId,
            isSandBox: isSandBox
        })
    })
    .then(
        function (response) {
            if (response.status !== 200) {
                return;
            }

            response.json().then(function (data) {
                if (window.isSandBox) {
                    jQuery("#client-sandbox-id").val(data.client_id);
                    jQuery("#client-sandbox-secret").val(data.client_secret);
                } else {
                    jQuery("#client-id").val(data.client_id);
                    jQuery("#client-secret").val(data.client_secret);
                }
            });
        }
    )
    .catch(function (err) {
    });
}
