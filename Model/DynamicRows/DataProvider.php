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

namespace PHPAISS\DynamicRows\Model\DynamicRows;

use Magento\Ui\DataProvider\AbstractDataProvider;
use PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows\Collection;
use PHPAISS\DynamicRows\Model\ResourceModel\DynamicRows\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * DataProvider constructor.
     *
     * @param string            $name
     * @param string            $primaryFieldName
     * @param string            $requestFieldName
     * @param Collection        $collection
     * @param CollectionFactory $collectionFactory
     * @param array             $meta
     * @param array             $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $collection;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();
        $items = $collection->setOrder('position', 'ASC')->getItems();

        foreach ($items as $item) {
            $this->loadedData['stores']['dynamic_rows_container'][] = $item->getData();
        }

        return $this->loadedData;

    }
}
