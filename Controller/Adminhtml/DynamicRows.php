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

namespace PHPAISS\DynamicRows\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use PHPAISS\DynamicRows\Model\DynamicRowsFactory;
use PHPAISS\DynamicRows\Model\DynamicRowsRepository;
use PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows\Collection;

abstract class DynamicRows extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'PHPAISS_DynamicRows::dynamic_rows';

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var DynamicRowsRepository
     */
    protected $dynamicRowsRepository;

    /**
     * @var DynamicRowsFactory
     */
    protected $rowFactory;

    /**
     * DynamicRows constructor.
     *
     * @param Action\Context        $context
     * @param PageFactory           $pageFactory
     * @param Collection            $collection
     * @param DynamicRowsFactory    $rowFactory
     * @param DynamicRowsRepository $dynamicRowsRepository
     */
    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        Collection $collection,
        DynamicRowsFactory $rowFactory,
        DynamicRowsRepository $dynamicRowsRepository
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->collection = $collection;
        $this->dynamicRowsRepository = $dynamicRowsRepository;
        $this->rowFactory = $rowFactory;
    }

    /**
     * @param \Magento\Backend\Model\View\Result\Page $resultPage
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function initDynamicRows($resultPage)
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage->setActiveMenu('PHPAISS_DynamicRows::dynamic_rows')
                   ->addBreadcrumb(__('DYNAMIC ROWS'), __('DYNAMIC ROWS'))
                   ->addBreadcrumb(__('Manage Dynamic Rows'), __('Manage Dynamic Rows'))
                   ->getConfig()->getTitle()->prepend(__('Dynamic Rows'));
        return $resultPage;
    }
}
