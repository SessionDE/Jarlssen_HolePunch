<?php

class Jarlssen_HolePunch_Block_Catalog_Product_View extends Mage_Catalog_Block_Product_View
{

    protected function _construct()
    {
        $this->addData(array(
            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG . "_" . $this->getProduct()->getId()),
        ));
    }
    
    public function getCacheKey()
    {
        if (!$this->hasData('cache_key')) {
        	$cacheKey = $this->getNameInLayout().'_STORE_'.Mage::app()->getStore()->getId().'_PRODUCT_'.$this->getProduct()->getId();
        	$this->setCacheKey($cacheKey);
        }
        return $this->getData('cache_key');
    }
    
    public function getCacheLifetime()
    {
    	  if($this->getNameInLayout() != 'product.info'){
              return null;
          }
    	  return 300;
    }
    
}