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
use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Patch;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;

/**
 * Controller for admin > Paypal/Configuration page
 */
class PaypalSubscribeController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->_sThisTemplate = 'subscribe.tpl';
    }

    public function render()
    {
        return parent::render();
    }

    public function isPayPalProductLinked()
    {
        return false;
    }

    public function getEditObject()
    {
        $article = oxNew(Article::class);
        $article->load(Registry::getRequest()->getRequestEscapedParameter('oxid'));
        return $article;
    }

    public function save(){
        /**
         * @var ServiceFactory $sf
         */
        $sf = Registry::get(ServiceFactory::class);
        $cs = $sf->getCatalogService();
        //@todo:
        $request = Registry::getRequest();
        $productId = $request->getRequestEscapedParameter('paypalProductId', "");
        if ($productId != "") {
            $patchRequest = new Patch();
            $patchRequest->op = Patch::OP_REPLACE;
            $patchRequest->value = $request->getRequestEscapedParameter('title');
            $patchRequest->path = 'title';
            $cs->updateProduct($productId, [$patchRequest]);
        } else {
            $cs->createProduct();
        }
    }
}
