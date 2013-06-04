<?php
/**
 * Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price
 *
 * Implements hole punch block for price block on catalog product grid page.
 *
 * License: GNU General Public License
 *
 * Copyright (c) 2012 Jarlssen GmbH. All rights reserved.
 * Note: Original work copyright to respective authors
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   Jarlssen
 * @package    Jarlssen_HolePunch
 * @subpackage Model
 * @copyright  Copyright (c) 1996-2012 Jarlssen GmbH (http://www.Jarlssen.com)
 * @license	   http://www.gnu.org/licenses/gpl.html GPL, version 3
 * @version    $Id:$
 * @link       http://www.Jarlssen.com
 * @since      File available since Release 0.1.0
 * @author     Jarlssen Core Team <core@Jarlssen.com>
 */

/**
 * Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price
 *
 * Implements hole punch block for price block on catalog product grid page.
 *
 * @category   Jarlssen
 * @package    Jarlssen_HolePunch
 * @subpackage Model
 * @copyright  Copyright (c) 1996-2012 Jarlssen GmbH (http://www.Jarlssen.com)
 * @license    http://www.gnu.org/licenses/gpl.html GPL, version 3
 * @version    Release: @package_version@
 * @since      Class available since Release 0.1.0
 * @author     Jarlssen Core Team <core@Jarlssen.com>
 */

class Jarlssen_HolePunch_Block_Catalog_Product_Grouped_Item_Price extends Mage_Catalog_Block_Product_Abstract
{

    /**
     * Path to template file in theme.
     *
     * @var string
     */
   protected $_template = 'catalog/product/list/item/price.phtml';


    /**
     * Set custom template for the block
     *
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate($this->_template);
    }


    /**
     * Get cache key informative items with the items ids
     *
     * @return array
     */
    public function getCacheKeyInfo()
    {
        $cacheKeyInfo = parent::getCacheKeyInfo();

        foreach (Mage::app()->getLayout()->getXpath('//action[@method="addPriceBlockType"]') as $element) {
            if (!empty($element->type)) {
                $prefix = 'price_block_type_' . (string)$element->type;
                $cacheKeyInfo[$prefix . '_block'] = empty($element->block) ? '' : (string)$element->block;
                $cacheKeyInfo[$prefix . '_template'] = empty($element->template) ? '' : (string)$element->template;
                $cacheKeyInfo['item_id'] = $this->getItem()->getId();
            }
        }

        return $cacheKeyInfo;
    }


    /**
     *  sets cache key prefix
     */
    protected $_defaultItemPriceCacheKey = 'JARLSSEN_CACHE_CATALOG_PRODUCT_GROUPED_ITEM_PRICE';


    /**
     *  generates JARLSSEN_CACHE_CATALOG_PRODUCT_LIST_ITEM_PRICE_PRODUCT_ID cache key
     *  which will be used for hole punching at
     *  Jarlssen_HolePunch_Model_Container_Cache_Catalog_ProductListPrice::_getCacheId()
     */
    public function getCacheKey()
    {
        if (!$this->hasData('cache_key')) {
            $cacheKey = $this->_defaultItemPriceCacheKey . '_' . $this->getItem()->getId();
            $this->setCacheKey($cacheKey);
        }
        return $this->getData('cache_key');
    }

}
