<?php

class Jarlssen_HolePunch_Model_Container_Cache_Catalog_Category_List extends Enterprise_PageCache_Model_Container_Abstract {

    /**
     * Get cache identifier
     *
     * @return string
     */
    protected function _getCacheId()
    {
        return 'JARLSSEN_CACHE_CATEGORY_LIST'
            . md5($this->_placeholder->getAttribute('cache_id')
                    . '_' . $this->_getCategoryId()
            );
    }


    protected function _renderBlock()
    {
        $categoryId = $this->_getCategoryId();
        
        $category = Mage::getSingleton('catalog/category')->load($categoryId);

        $blockClass = $this->_placeholder->getAttribute('block');
        $template = $this->_placeholder->getAttribute('template');

        
        /* @var $productBlock Mage_Catalog_Block_Product_List */
        $productBlock = Mage::app()->getLayout()->createBlock($blockClass);
        
        /* @var $layer Mage_Catalog_Model_Layer */
        $layer = $productBlock->getLayer();

        /* @var $category Mage_Catalog_Model_Category */
        $category = Mage::getSingleton('catalog/category')->load($categoryId);
        
        if ($category->getId()) {
            $layer->setCurrentCategory($category);
        }
        
        /*
         *  overrides default template 
         */
        $productBlock->setTemplate('jarlssen/holepunch/catalog/product/list.phtml');
        
        
        /*
         *  overrides default template 
         */
        //$productBlock = Mage::app()->getLayout()->createBlock($blockClass);
        //$productBlock->setTemplate($template);
        
        return $productBlock->toHtml();
        
    }

    protected function _saveCache($data, $id, $tags = array(), $lifetime = null) 
    { 
        return false; 
        
    }   

}