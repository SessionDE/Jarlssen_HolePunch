<?php

class Jarlssen_HolePunch_Block_Catalog_Product_View extends Mage_Catalog_Block_Product_View_Abstract
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
}