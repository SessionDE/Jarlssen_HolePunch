<?php

class Jarlssen_HolePunch_Block_Catalog_Product_View_Type_Virtual extends Mage_Catalog_Block_Product_View_Abstract
{

    /**
     * Return true if product has options
     *
     * @return bool
     */
    public function hasOptions()
    {
        if ($this->getProduct()->getTypeInstance(true)->hasOptions($this->getProduct())) {
            return true;
        }
        return false;
    }
    
//    protected function _construct()
//    {
//        $this->addData(array(
//            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG . "_" . $this->getProduct()->getId()),
//        ));
//    }
//    
//    public function getCacheKey()
//    {
//        if (!$this->hasData('cache_key')) {
//        	$cacheKey = $this->getNameInLayout().'_STORE'.Mage::app()->getStore()->getId().'_PRODUCT'.$this->getProduct()->getId();
//        	$this->setCacheKey($cacheKey);
//        }
//        return $this->getData('cache_key');
//    }
//    
//    public function getCacheLifetime()
//    {	  
//    	  if($this->getNameInLayout()!='product.info') return null;
//    	  return 9999999999;
//    }
    
}