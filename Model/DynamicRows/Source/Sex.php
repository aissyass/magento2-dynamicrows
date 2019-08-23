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

namespace PHPAISS\DynamicRows\Model\DynamicRows\Source;

use Magento\Framework\Option\ArrayInterface;

class Sex implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $maleFemale[] = [
            'label' => __('Male'),
            'value' => 0,
        ];

        $maleFemale[] = [
            'label' => __('Female'),
            'value' => 1,
        ];

        return $maleFemale;
    }
}
