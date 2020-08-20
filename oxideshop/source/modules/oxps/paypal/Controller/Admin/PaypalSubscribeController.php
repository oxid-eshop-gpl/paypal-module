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
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsObject;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductRequestPOST;
use OxidProfessionalServices\Paypal\Core\Logger;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Model\Category;

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

    // needed?
    public function render()
    {
        return parent::render();
    }

    public function isPayPalProductLinked()
    {
        return false;
    }

    public function isPayPalProductLinkedByParentOnly()
    {
        return false;
    }

    /**
     * @return object
     */
    public function getEditObject()
    {
        $article = oxNew(Article::class);
        $request = Registry::getRequest();
        $article->load($request->getRequestParameter('oxid'));

        $products = $this->getCatalogEntries();

        return $article;
    }

    /**
     * @throws \OxidProfessionalServices\PayPal\Api\Exception\ApiException
     */
    public function getCatalogEntries()
    {
        /**
         * @var ServiceFactory $sf
         */
        $sf = Registry::get(ServiceFactory::class);
        $cs = $sf->getCatalogService();

        $products = $cs->listProducts();

        $filteredProducts = [];
        foreach($products as $product) {
            $filteredProducts = $product;
        }

        return $filteredProducts;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        $category = new Category();
        $categories = $category->getCategories();

        $categoryArray = [];
        foreach ($categories as $type => $value) {
            $categoryArray[] = $value;
        }

        return $categoryArray;
    }


    /**
     * @return array
     */
    public function getTypes()
    {
        $category = new Category();
        $types = $category->getTypes();

        $typeArray = [];
        foreach ($types as $type => $value) {
            $typeArray[] = $value;
        }

        return $typeArray;
    }

    /**
     * @return mixed
     */
    public function getProductUrl()
    {
        return $this->getEditObject()->getBaseStdLink($this->_iEditLang);
    }

    /**
     * @return array
     */
    public function getDisplayImages(): array
    {
        $editObject = $this->getEditObject();

        $images = [];

        for ($i = 1; $i < 10; $i++) {
            $field = 'oxarticles__oxpic' . $i;
            $rawValue = $editObject->$field->rawValue;

            if(empty($rawValue)) {
                continue;
            }

            $img = $this->formatImageUrl(
                $editObject->ssl_dimagedir,
                $editObject->$field->rawValue,
                $i
            );

            if($this->imgexists($img)) {
                $images[] = $img;
            }
        }

        return $images;
    }

    /**
     * @param $url
     * @return bool
     */
    private function imgexists($url) {
        if (!$fp = curl_init($url)) {
            return false;
        }
        return true;
    }

    /**
     * @param string $url
     * @param string $file
     * @param int $num
     * @return string
     */
    private function formatImageUrl($url, $file, int $num)
    {
        return str_replace(':/out', '/out', $url) . 'master/product/' . $num . '/' . $file;
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
            $productRequest = [];
            $productRequest['name'] = $request->getRequestParameter('title');
            $productRequest['description'] = $request->getRequestParameter('description');
            $productRequest['type'] = $request->getRequestParameter('productType');
            $productRequest['category'] = $request->getRequestParameter('category');
            $productRequest['image_url'] = $request->getRequestParameter('imageUrl');
            $productRequest['home_url'] = $request->getRequestParameter('homeUrl');

            $productRequestPost = new ProductRequestPOST($productRequest);

            /** @var Product $response */
            $response = $cs->createProduct($productRequestPost);

            $sql = 'INSERT INTO oxps_paypal_subscription_product (';
            $sql .= 'OXPS_PAYPAL_SUBSCRIPTION_PRODUCT_ID, OXPS_PAYPAL_OXSHOPID, OXPS_PAYPAL_OXARTICLE_ID, ';
            $sql .= 'OXPS_PAYPAL_PRODUCT_ID) VALUES(?,?,?,?)';

            DatabaseProvider::getDb()->execute($sql, [
                UtilsObject::getInstance()->generateUId(),
                $this->getConfig()->getShopId(),
                $this->getEditObject()->oxarticles__oxid->value,
                $response->id
            ]);
        }
    }
}
