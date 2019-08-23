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

namespace PHPAISS\DynamicRows\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'phpaiss_dynamic_rows'
         */

        $tableName = $installer->getTable('phpaiss_dynamic_rows');
        $tableComment = 'PHPAISS Dynamic Rows';
        $columns = [
            'row_id' => [
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'comment' => 'Row Id',
            ],
            'row_name' => [
                'type' => Table::TYPE_TEXT,
                'size' => 255,
                'options' => ['nullable' => false],
                'comment' => 'Row name',
            ],
            'row_birthday' => [
                'type' => Table::TYPE_DATE,
                'size' => null,
                'options' => ['nullable' => false],
                'comment' => 'Date of birth',
            ],
            'sex' => [
                'type' => Table::TYPE_BOOLEAN,
                'size' => null,
                'options' => ['nullable' => false],
                'comment' => 'Sex',
            ],
            'position' => [
                'type' => Table::TYPE_INTEGER,
                'size' => null,
                'options' => ['nullable' => false],
                'comment' => 'Row Position',
            ],
            'creation_time' => [
                'type' => Table::TYPE_TIMESTAMP,
                'size' => null,
                'options' => ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'comment' => 'Creation time',
            ],
            'update_time' => [
                'type' => Table::TYPE_TIMESTAMP,
                'size' => null,
                'options' => ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'comment' => 'Update time',
            ],
        ];

        $indexes = [
            'row_name',
        ];

        $foreignKeys = [
            // No foreign keys for this table
        ];

        /**
         *  We can use the parameters above to create our table
         */

        // Table creation
        $table = $installer->getConnection()->newTable($tableName);

        // Columns creation
        foreach($columns AS $name => $values) {
            $table->addColumn(
                $name,
                $values['type'],
                $values['size'],
                $values['options'],
                $values['comment']
            );
        }

        // Indexes creation
        foreach($indexes AS $index) {
            $table->addIndex(
                $installer->getIdxName($tableName, [$index]),
                [$index]
            );
        }

        // Foreign keys creation
        foreach($foreignKeys AS $column => $foreignKey) {
            $table->addForeignKey(
                $installer->getFkName($tableName, $column, $foreignKey['ref_table'], $foreignKey['ref_column']),
                $column,
                $foreignKey['ref_table'],
                $foreignKey['ref_column'],
                $foreignKey['on_delete']
            );
        }

        // Table comment
        $table->setComment($tableComment);

        // Execute SQL to create the table
        $installer->getConnection()->createTable($table);

        // End Setup
        $installer->endSetup();
    }
}