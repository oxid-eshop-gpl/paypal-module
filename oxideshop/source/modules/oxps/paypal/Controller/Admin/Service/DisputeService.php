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

namespace OxidProfessionalServices\PayPal\Controller\Admin\Service;

use OxidProfessionalServices\PayPal\Api\Exception\ApiException;
use OxidProfessionalServices\PayPal\Api\Model\Disputes\ResponseSubsequentAction;
use OxidProfessionalServices\PayPal\Api\Service\Disputes;

class DisputeService extends Disputes
{
    /**
     * Provides evidence for a dispute, by ID. A merchant can provide evidence for disputes with the
     * <code>WAITING_FOR_SELLER_RESPONSE</code> status while customers can provide evidence for disputes with the
     * <code>WAITING_FOR_BUYER_RESPONSE</code> status. Evidence can be a proof of delivery or proof of refund
     * document or notes, which can include logs. A proof of delivery document includes a tracking number while a
     * proof of refund document includes a refund ID. The following rules apply to document file types and
     * sizes:<ul><li>The merchant can upload up to 50 MB of files for a case.</li><li>Individual files must be
     * smaller than 10 MB.</li><li>The supported file formats are JPG, GIF, PNG, and PDF.</li></ul><br/>To make this
     * request, specify the dispute ID in the URI and specify the evidence in the JSON request body. For information
     * about dispute reasons, see <a
     * href="/docs/integration/direct/customer-disputes/integration-guide/#dispute-reasons">dispute reasons</a>.
     *
     * @param $disputeId string The ID of the dispute for which to submit evidence.
     *
     * @param $evidence mixed
     *
     * @param $evidence file A file with evidence.
     *
     * @return ResponseSubsequentAction
     * @throws ApiException
     */
    public function provideEvidence($disputeId, $evidence): ResponseSubsequentAction
    {
        $path = "/disputes/{$disputeId}/provide-evidence";

        $headers = [];
        $headers['Content-Type'] = 'multipart/related; boundary=---- WebKitFormBoundary7MA4YWxkTrZu0gW';


        $body = json_encode($evidence, true);
        $response = $this->send('POST', $path, [], $headers, $body);
        $jsonData = json_decode($response->getBody(), true);
        return new ResponseSubsequentAction($jsonData);
    }
}
