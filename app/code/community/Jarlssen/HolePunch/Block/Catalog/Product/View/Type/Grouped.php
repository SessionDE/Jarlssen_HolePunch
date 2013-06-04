<?php
/**
 * Magento Enterprise Edition
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Enterprise Edition License
 * that is bundled with this package in the file LICENSE_EE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magentocommerce.com/license/enterprise-edition
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2012 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://www.magentocommerce.com/license/enterprise-edition
 */


/**
 * Catalog grouped product info block
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Jarlssen_HolePunch_Block_Catalog_Product_View_Type_Grouped extends Mage_Catalog_Block_Product_View_Type_Grouped
{
    /**
     *  class of the child block called in catalog/product/view.phtml template
     */
    protected $_defaultItemPriceBlock = 'jarlssen_holepunch/catalog_product_grouped_item_price';

    /**
     *  name in layout that is reference name for hole puncher
     */
    protected $_defaultItemPriceBlockName = 'catalog.product.grouped.item.price';


    /**
     *  Overrided template file loaded in layout
     */
    protected $_defaultTemplate = 'jarlssen/holepunch/catalog/product/view/type/grouped.phtml';


    /**
     * Override default template from here so we don't make any mess in layout.xml
     *
     * @param string $template
     * @return Mage_Core_Block_Template
     */
    public function setTemplate($template)
    {
        $this->_template = $this->_defaultTemplate;
        return $this;
    }

    /*
     *
     *  @return Jarlssen_HolePunch_Block_Catalog_Product_List_Item_Price
     */
    public function getGroupedItemPriceBlock()
    {
        $block = $this->getLayout()->createBlock($this->_defaultItemPriceBlock, $this->_defaultItemPriceBlockName);

        return $block;
    }
}
