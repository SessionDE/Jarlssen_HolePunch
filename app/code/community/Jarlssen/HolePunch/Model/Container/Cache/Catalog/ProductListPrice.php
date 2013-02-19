<?php
/**
 * Jarlssen_HolePunch_Model_Container_Cache_Catalog_ProductListPrice
 *
 * Placeholder container for catalog product items.
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
 * Jarlssen_HolePunch_Model_Container_Cache_Catalog_ProductListPrice
 *
 * Placeholder container for catalog product items.
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

class Jarlssen_HolePunch_Model_Container_Cache_Catalog_ProductListPrice extends Enterprise_PageCache_Model_Container_Abstract {

    /**
     * Get cache identifier from Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price::getCacheKey()
     *
     *  format: JARLSSEN_CACHE_CATALOG_PRODUCT_LIST_ITEM_PRICE_ . $product_id
     *
     * @return string
     */
    protected function _getCacheId()
    {
        return $this->_placeholder->getAttribute('cache_id');
    }


    /**
     *  Gets itemId from Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price::getCacheKeyInfo()
     *
     *  @return string
     */
    protected function _getItemId()
    {
        return $this->_placeholder->getAttribute('item_id');
    }


    /**
     *  Renders cached block
     *
     *  @return Jarlssen_HolePunch_Model_Container_Cache_Catalog_ProductListPrice
     */
    protected function _renderBlock()
    {

        /** @var $item Mage_Catalog_Model_Product */
        $item = Mage::getModel('catalog/product')
            ->setStoreId(Mage::app()->getStore()->getId())
            ->load($this->_getItemId());

        /* @var $block Mage_Catalog_Block_Product_List_Item_Price */
        $block = $this->_getPlaceHolderBlock();

        #$block->setTemplate($this->_placeholder->getAttribute('template'));
        $block->setTemplate('jarlssen/holepunch/catalog/product/list/item/price.phtml');

        $block->setItem($item);

        $priceBlock = $this->_placeholder->getAttribute('price_block_type_' . $item->getTypeId() . '_block');
        if (!empty($priceBlock)) {
            $block->addPriceBlockType(
                $item->getTypeId(),
                $priceBlock,
                $this->_placeholder->getAttribute('price_block_type_' . $item->getTypeId() . '_template')
            );
        }

        return $block->toHtml();
    }


    /**
     * Get Place Holder Block
     *
     * @return Mage_Core_Block_Abstract
     */
    protected function _getPlaceHolderBlock()
    {
        $blockName = $this->_placeholder->getAttribute('block');
        $block = new $blockName;
        $block->setLayout(Mage::app()->getLayout());
        $block->setSkipRenderTag(true);
        return $block;
    }


    protected function _saveCache($data, $id, $tags = array(), $lifetime = null)
    {
        return false;

    }
}
