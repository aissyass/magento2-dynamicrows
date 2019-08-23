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

namespace PHPAISS\DynamicRows\Model;

use Magento\Framework\Model\AbstractModel;

class DynamicRows extends AbstractModel
{
    /**
     * Row id field
     */
    const ROW_ID = 'row_id';

    /**
     * Name of object id field
     * @var string
     */
    protected $_idFieldName = self::ROW_ID;

    /**
     * Row Model
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(\PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows::class);
    }
}
