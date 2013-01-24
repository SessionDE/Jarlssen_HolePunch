<?php

class Jarlssen_HolePunch_Model_Container_Cache_Catalog_Product_View_Type_Simple_Price extends Enterprise_PageCache_Model_Container_Abstract {

    /**
     * Get cache identifier
     *
     * @return string
     */
    protected function _getCacheId()
    {
        return 'JARLSSEN_CACHE_PRICE_SIMPLE_'  . $this->_getProductId();

        /* code for cleaning if cache is saved */
        /*
        $cacheInstance = Enterprise_PageCache_Model_Cache::getCacheInstance();
        $product = $cacheInstance->load('JARLSSEN_CACHE_PRICE_SIMPLE_46abe341545c5094852318d03f0289ad');
        $clean = $cacheInstance->remove('JARLSSEN_CACHE_PRICE_SIMPLE_46abe341545c5094852318d03f0289ad');
        */
    }


    protected function _renderBlock()
    {
        $productId = $this->_getProductId();
        #$categoryId = $this->_getCategoryId();

        $product = Mage::getSingleton('catalog/product')->load($productId);

        #$blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');

        $productBlock = Mage::app()->getLayout()->createBlock('jarlssen_holepunch/catalog_product_view_type_simple');
        $productBlock->setProduct($product);


        /*
         *  overrides default template
         */
        $productBlock->setTemplate('jarlssen/holepunch/price.phtml');


        /*
         *  overrides default template
         */
        #$productPrice->setTemplate($template);

        return $productBlock->toHtml();

    }


    protected function _saveCache($data, $id, $tags = array(), $lifetime = null)
    {
        return false;

    }

    /**
     * Generate placeholder content before application was initialized and apply to page content if possible
     *
     * @param string $content
     * @return bool
     */
    /*
    public function applyWithoutApp(&$content)
    {
        $blockCacheId = $this->_getCacheId();
        if ($blockCacheId) {
            $blockContent = $this->_loadCache($blockCacheId);
            if ($blockContent !== false) {
                #$blockContent = preg_replace('/(?<=\s|")(' . $regexp . ')(?=\s|")/u', '$1 active', $blockContent);
                $this->_applyToContent($content, $blockContent);
                return true;
            }
        }
        return false;
    }
    */

    /**
     * Save rendered block content to cache storage
     *
     * @param string $blockContent
     * @return Enterprise_PageCache_Model_Container_Abstract
     */
    /*
    public function saveCache($blockContent)
    {
        $blockCacheId = $this->_getCacheId();
        if ($blockCacheId) {
            $this->_saveCache($blockContent, $blockCacheId);
            if (!Enterprise_PageCache_Model_Cache::getCacheInstance()->getFrontend()->test($blockCacheId)) {
                $this->_saveCache($blockContent, $blockCacheId);
            }
        }

        return $this;
    }
    */
}