<?php

class Jarlssen_HolePunch_Block_Catalog_Product_View extends Mage_Catalog_Block_Product_View
{

    protected function _construct()
    {
        $this->addData(array(
        	//'cache_key' 		=>	
            //'cache_lifetime'  => 
            'cache_tags'        => array(Mage_Catalog_Model_Product::CACHE_TAG . "_" . $this->getProduct()->getId()),
        ));
    }
    
    public function getCacheKey()
    {
        if (!$this->hasData('cache_key')) {
       		//$cacheKey = LAYOUTNAME_STORE+ID_PRODUCT+ID
        	$cacheKey = $this->getNameInLayout().'_STORE'.Mage::app()->getStore()->getId().'_PRODUCT'.$this->getProduct()->getId();
        	//.'_'.Mage::getDesign()->getPackageName().'_'.Mage::getDesign()->getTheme('template'). //_PACKAGE_THEME ?
        	$this->setCacheKey($cacheKey);
        }
        return $this->getData('cache_key');
    }
    
    public function getCacheLifetime()
    {	  //to prevent sub-blocks caching
    	  if($this->getNameInLayout()!='product.info') return null;
    	  //return false; //false creates default lifetime (7200)
    	  return 9999999999;
    }
    
}