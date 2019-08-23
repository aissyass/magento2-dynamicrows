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

namespace PHPAISS\DynamicRows\Block\Adminhtml\DynamicRows\Edit;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * SaveButton constructor.
     *
     * @param UrlInterface $urlBuilder
     */
    function __construct(
        UrlInterface $urlBuilder
    )
    {
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $url = $this->urlBuilder->getUrl('*/*/save');

        return [
            'label' => __('Save Rows'),
            'class' => 'save primary',
            'on_click' => "setLocation('". $url ."'')",
            'sort_order' => 90,
        ];
    }
}
