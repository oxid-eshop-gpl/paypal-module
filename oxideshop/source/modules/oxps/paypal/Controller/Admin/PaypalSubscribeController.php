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
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Patch;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\Product;
use OxidProfessionalServices\PayPal\Api\Model\Catalog\ProductRequestPOST;
use OxidProfessionalServices\PayPal\Core\ServiceFactory;
use OxidProfessionalServices\PayPal\Model\Category;
use OxidProfessionalServices\PayPal\Repository\SubscriptionRepository;

/**
 * Controller for admin > Paypal/Configuration page
 */
class PaypalSubscribeController extends AdminController
{
    /**
     * The Product from Paypal's API
     * Caching the linked object to reduce calls to paypal api
     * @var Product
     */
    private $linkedObject;

    /**
     * The Linked data stored in OXID db
     * Caching the linked object to reduce calls to paypal api
     * @var array
     */
    private $linkedProduct;

    /**
     * @var SubscriptionRepository
     */
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->_sThisTemplate = 'subscribe.tpl';
        $this->repository = new SubscriptionRepository();
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
        return $this->repository->getEditObject(Registry::getRequest()->getRequestParameter('oxid'));
    }

    public function hasLinkedObject()
    {
        $this->setLinkedObject();
        if (!empty($this->linkedObject)) {
            return true;
        }

        return false;
    }

    public function getLinkedObject()
    {
        $this->setLinkedObject();
        return $this->linkedObject;
    }

    public function setLinkedObject()
    {
        if (!empty($this->linkedObject)) {
            return;
        }

        $article = oxNew(Article::class);
        $oxid = Registry::getRequest()->getRequestParameter('oxid');
        $article->load($oxid);

        try {
            $this->getLinkedProductByOxid($oxid);
        } catch (DatabaseConnectionException $e) {
            return;
        } catch (DatabaseErrorException $e) {
            return;
        }

        if (empty($this->linkedProduct)) {
            return;
        }

        $this->linkedObject = $this->getPaypalProductDetail($this->linkedProduct[0]['OXPS_PAYPAL_PRODUCT_ID']);
    }

    public function unlink()
    {
        $this->setLinkedObject();

        if(empty($this->linkedObject)) {
            return;
        }

        $this->repository->deleteLinkedProduct($this->linkedObject->id);
    }

    /**
     * @param $id
     * @return Product
     * @throws \OxidProfessionalServices\PayPal\Api\Exception\ApiException
     */
    public function getPaypalProductDetail($id): Product
    {
        /**
         * @var ServiceFactory $sf
         */
        $sf = Registry::get(ServiceFactory::class);
        $cs = $sf->getCatalogService();

        return $cs->showProductDetails($id);
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
        foreach ($products as $product) {
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

            if (empty($rawValue)) {
                continue;
            }

            $img = $this->formatImageUrl(
                $editObject->ssl_dimagedir,
                $editObject->$field->rawValue,
                $i
            );

            if ($this->imgexists($img)) {
                $images[] = $img;
            }
        }

        return $images;
    }

    /**
     * @param $url
     * @return bool
     */
    private function imgexists($url)
    {
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

    public function save()
    {
        /**
         * @var ServiceFactory $sf
         */
        $sf = Registry::get(ServiceFactory::class);
        $cs = $sf->getCatalogService();
        $request = Registry::getRequest();
        $productId = $request->getRequestEscapedParameter('paypalProductId', "");

        if ($this->hasLinkedObject()) {
             $this->setLinkedObject();

            if ($this->linkedObject->description !== $request->getRequestEscapedParameter('description')) {
                $patchRequest = new Patch();
                $patchRequest->op = Patch::OP_REPLACE;
                $patchRequest->value = $request->getRequestEscapedParameter('description');
                $patchRequest->path = '/description';
                $cs->updateProduct($productId, [$patchRequest]);
            }

            if ($this->linkedObject->category !== $request->getRequestEscapedParameter('category')) {
                $patchRequest = new Patch();
                $patchRequest->op = Patch::OP_REPLACE;
                $patchRequest->value = $request->getRequestEscapedParameter('category');
                $patchRequest->path = '/category';
                $cs->updateProduct($productId, [$patchRequest]);
            }

            if ($this->linkedObject->image_url !== $request->getRequestEscapedParameter('imageUrl')) {
                $patchRequest = new Patch();
                $patchRequest->op = Patch::OP_REPLACE;
                $patchRequest->value = $request->getRequestEscapedParameter('imageUrl');
                $patchRequest->path = '/image_url';
                $cs->updateProduct($productId, [$patchRequest]);
            }

            if ($this->linkedObject->home_url !== $request->getRequestEscapedParameter('homeUrl')) {
                $patchRequest = new Patch();
                $patchRequest->op = Patch::OP_REPLACE;
                $patchRequest->value = $request->getRequestEscapedParameter('homeUrl');
                $patchRequest->path = '/home_url';
                $cs->updateProduct($productId, [$patchRequest]);
            }

        } else {
            $productRequest = [];
            $productRequest['name'] = utf8_encode($request->getRequestParameter('title'));
            $productRequest['description'] = utf8_encode($request->getRequestParameter('description'));
            $productRequest['type'] = $request->getRequestParameter('productType');
            $productRequest['category'] = $request->getRequestParameter('category');
            $productRequest['image_url'] = $request->getRequestParameter('imageUrl');
            $productRequest['home_url'] = $request->getRequestParameter('homeUrl');

            $productRequestPost = new ProductRequestPOST($productRequest);

            /** @var Product $response */
            $response = $cs->createProduct($productRequestPost);

            $this->repository->saveLinkedProduct(
                $response,
                Registry::getRequest()->getRequestParameter('oxid')
            );
        }
    }

    /**
     * @param $oxid
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    private function getLinkedProductByOxid($oxid): void
    {
        if (!empty($this->linkedProduct)) {
            return;
        }

        $this->linkedProduct = $this->repository->getLinkedProductByOxid($oxid);
    }
}
