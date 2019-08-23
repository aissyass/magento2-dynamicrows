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

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use PHPAISS\DynamicRows\Model\DynamicRowsFactory;
use PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows;

class DynamicRowsRepository
{
    /**
     * @var DynamicRowsFactory
     */
    private $rowFactory;
    /**
     * @var DynamicRows
     */
    private $resource;

    /**
     * DynamicRowsRepository constructor.
     *
     * @param DynamicRowsFactory $rowFactory
     * @param DynamicRows        $resource
     */
    function __construct(
        DynamicRowsFactory $rowFactory,
        DynamicRows $resource
    )
    {
        $this->rowFactory = $rowFactory;
        $this->resource = $resource;
    }

    /**
     * Save row.
     *
     * @param \PHPAISS\DynamicRows\Model\DynamicRows $row
     * @return \PHPAISS\DynamicRows\Model\DynamicRows
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\PHPAISS\DynamicRows\Model\DynamicRows $row)
    {
        try {
            /** @var \PHPAISS\DynamicRows\Model\DynamicRows $row */
            $this->resource->save($row);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
        return $row;
    }

    /**
     * Retrieve row.
     *
     * @param int $rowId
     * @return \PHPAISS\DynamicRows\Model\DynamicRows
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($rowId)
    {
        /** @var \PHPAISS\DynamicRows\Model\DynamicRows $row */
        $row = $this->rowFactory->create();
        $this->resource->load($row, $rowId);
        if (!$row->getId()) {
            throw new NoSuchEntityException(__('Dynamic row with id "%1" does not exist.', $rowId));
        }
        return $row;
    }

    /**
     * Delete row.
     *
     * @param \PHPAISS\DynamicRows\Model\DynamicRows $row
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\PHPAISS\DynamicRows\Model\DynamicRows $row)
    {
        try {
            /** @var \PHPAISS\DynamicRows\Model\DynamicRows $row */
            $this->resource->delete($row);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete row by ID.
     *
     * @param int $rowId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($rowId)
    {
        return $this->delete($this->getById($rowId));
    }

    /**
     * Truncate table
     *
     * @throws \Exception
     */
    public function truncateTable()
    {
        try {
            $this->resource->getConnection()->truncateTable(
                $this->resource->getMainTable()
            );
        } catch (\Exception $e) {
            throw new \Exception(__($e->getMessage()));
        }
    }
}
