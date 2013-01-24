<?php

class Jarlssen_HolePunch_Model_Container_Cache_Catalog_Product_View_Type_Simple_Price extends Enterprise_PageCache_Model_Container_Abstract {

    /**
     * Get cache identifier
     *
     * @return string
     */
    protected function _getCacheId()
    {
        return 'JARLSSEN_CACHE_PRICE_GROUPED_'
            . md5($this->_placeholder->getAttribute('cache_id')
                    . '_' . $this->_getCategoryId()
                    . '_' . $this->_getProductId()
            );
    }


    protected function _renderBlock()
    {
        $productId = $this->_getProductId();
        #$categoryId = $this->_getCategoryId();

        $product = Mage::getSingleton('catalog/product')->load($productId);

        $blockClass = $this->_placeholder->getAttribute('block');
        #$template = $this->_placeholder->getAttribute('template');

        $productBlock = Mage::app()->getLayout()->createBlock($blockClass);
        $productBlock->setProduct($product);


        /*
         *  overrides default template
         */
        $productBlock->setTemplate('jarlssen/holepunch/grouped.phtml');


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

}