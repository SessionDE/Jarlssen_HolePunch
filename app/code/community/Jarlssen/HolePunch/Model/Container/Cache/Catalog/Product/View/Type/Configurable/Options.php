<?php

class Jarlssen_HolePunch_Model_Container_Cache_Catalog_Product_View_Type_Configurable_Options extends Enterprise_PageCache_Model_Container_Abstract {

    /**
     * Get cache identifier
     *
     * @return string
     */
    protected function _getCacheId()
    {
        return 'JARLSSEN_CACHE_CONFIG_OPTIONS_'
            . md5($this->_placeholder->getAttribute('cache_id')
                    . '_' . $this->_getProductId()
            );
    }


    protected function _renderBlock()
    {
        
        $productId = $this->_getProductId();
        #$categoryId = $this->_getCategoryId();
        //Zend_Debug::dump($productId);
        
        //Zend_Debug::dump($this->_placeholder->getAttribute('cache_id'));
        $product = Mage::getSingleton('catalog/product')->load($productId);

        #$blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');

        $productBlock = Mage::app()->getLayout()->createBlock('jarlssen_holepunch/catalog_product_view_type_configurable_options');
        $productBlock->setProduct($product);
        
        
        
        
        /*
         *  overrides default template 
         */
        $productBlock->setTemplate('jarlssen/holepunch/configurable/options.phtml');
        
        
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
