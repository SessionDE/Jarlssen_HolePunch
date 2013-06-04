<?php
/**
 * Jarlssen_HolePunch_Block_Catalog_Product_List
 *
 * Rewrites Mage_Catalog_Block_Product_List and adds child block output.
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
 * Jarlssen_HolePunch_Block_Catalog_Product_List
 *
 * Rewrites Mage_Catalog_Block_Product_List and adds child block output.
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
class Jarlssen_HolePunch_Block_Catalog_Product_List extends Mage_Catalog_Block_Product_List
{

    /**
     *  class of the child block called in catalog/product/view.phtml template
     */
    protected $_defaultItemPriceBlock = 'jarlssen_holepunch/catalog_product_list_item_price';

    /**
     *  name in layout that is reference name for hole puncher
     */
    protected $_defaultItemPriceBlockName = 'catalog.product.list.item.price';


    /**
     *  Overrided template file loaded in layout
     */
    protected $_defaulTemplate = 'jarlssen/holepunch/catalog/product/list.phtml';


    /**
     * Override default template from here so we don't make any mess in layout.xml
     *
     * @param string $template
     * @return Mage_Core_Block_Template
     */
    public function setTemplate($template)
    {
        $this->_template = $this->_defaulTemplate;
        return $this;
    }

    /*
     *
     *  @return Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price
     */
    public function getItemPriceBlock()
    {
        $block = $this->getLayout()->createBlock($this->_defaultItemPriceBlock, $this->_defaultItemPriceBlockName);

        return $block;
    }
}