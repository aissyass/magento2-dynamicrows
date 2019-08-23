<?php
/**
 * created: 2019
 *
 * @category  XXXXXXX
 * @package   Ayaline
 * @author    aYaline Magento <support.magento-shop@ayaline.com>
 * @copyright 2019 - aYaline Magento
 * @license   aYaline - http://shop.ayaline.com/magento/fr/conditions-generales-de-vente.html
 * @link      http://shop.ayaline.com/magento/fr/conditions-generales-de-vente.html
 */

namespace PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use PHPAISS\DynamicRows\Model\DynamicRows;

class Collection extends AbstractCollection
{
    /**
     * Row id field
     */
    protected $_idFieldName = DynamicRows::ROW_ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            'PHPAISS\DynamicRows\Model\DynamicRows',
            'PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows'
        );
    }
}
