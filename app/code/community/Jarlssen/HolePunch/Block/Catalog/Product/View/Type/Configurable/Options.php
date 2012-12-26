<?php

class Jarlssen_HolePunch_Block_Catalog_Product_View_Type_Configurable_Options extends Mage_Catalog_Block_Product_View_Type_Configurable
{
    /*
    protected function _construct()
    {
        $this->addData(array(
            'cache_lifetime'    => 120,
            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG),
            'cache_key'            => $this->getProduct()->getId(),
        ));
    }  
    */

    
    /*
    protected function _construct()
    {
        
        $this->addData(array(
            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG . "_" . $this->getProduct()->getId()),
        ));
    }
    */
    public function getCacheKey()
    {
        if (!$this->hasData('cache_key')) {
        	$cacheKey = 'PRODUCT_DETAILS_OPTIONS_'.$this->getProduct()->getId();
        	$this->setCacheKey($cacheKey);
        }
        return $this->getData('cache_key');
    }

    public function getCacheLifetime()
    {	
        return 9999999999;
        if($this->getNameInLayout() != 'product.info'){

            return null;
        }
        return 9999999999;
    }
    
}