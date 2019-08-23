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

namespace PHPAISS\DynamicRows\Controller\Adminhtml\Row;

use PHPAISS\DynamicRows\Controller\Adminhtml\DynamicRows;

class Save extends DynamicRows
{
    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        try {
            // Get data
            $dynamicRowData = $this->getRequest()->getParam('dynamic_rows_container');
            // Truncate table
            $this->dynamicRowsRepository->truncateTable();

            if (is_array($dynamicRowData) && !empty($dynamicRowData)) {
                foreach ($dynamicRowData as $dynamicRowDatum) {
                    /** @var \PHPAISS\DynamicRows\Model\DynamicRows $model */
                    $model = $this->rowFactory->create();
                    unset($dynamicRowDatum['row_id']);
                    $model->addData($dynamicRowDatum);

                    // Save model
                    $this->dynamicRowsRepository->save($model);
                }

            }

            $this->messageManager->addSuccessMessage(__('Rows have been saved successfully'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }

        $this->_redirect('*/*/index/scope/stores');
    }
}
