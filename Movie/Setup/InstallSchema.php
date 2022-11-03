<?php

namespace Magenest\Movie\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('magenest_director')) {
            $table = $installer->getConnection()->newTable($installer->getTable('magenest_director'))
                ->addColumn(
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Director ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Director Name'
                )
                ->setComment('Director Table');
            $installer->getConnection()->createTable($table);
        }
        if (!$installer->tableExists('magenest_actor')) {
            $table = $installer->getConnection()->newTable($installer->getTable('magenest_actor'))
                ->addColumn(
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Actor ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Actor Name'
                )
                ->setComment('Actor Table');
            $installer->getConnection()->createTable($table);
        }
        if (!$installer->tableExists('magenest_movie')) {
            $table = $installer->getConnection()->newTable($installer->getTable('magenest_movie'))
                ->addColumn(
                    'movie_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Movie ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable => false'],
                    'Movie Name'
                )
                ->addColumn(
                    'description',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    [],
                    'Movie Desciption'
                )
                ->addColumn(
                    'rating',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [],
                    'Movie Rating'
                )
                ->addColumn(
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true],
                    'Derecto ID'
                )
                ->setComment('Movie Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('magenest_movie'),
                $setup->getIdxName(
                    $installer->getTable('magenest_movie'),
                    ['director_id'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
                ),
                ['director_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
            );

            $installer->getConnection()->addForeignKey(
                $installer->getFkName('magenest_movie', 'director_id', 'magenest_director', 'director_id'),
                $installer->getTable('magenest_movie'),
                'director_id',
                $installer->getTable('magenest_director'),
                'director_id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            );
        }
        if (!$installer->tableExists('magenest_movie_actor')) {
            $table = $installer->getConnection()->newTable($installer->getTable('magenest_movie_actor'))
                ->addColumn(
                    'movie_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true,
                    ],
                    'Movie ID'
                )
                ->addColumn(
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable' => false,
                        'unsigned' => true,
                    ],
                    'Actor ID'
                )
                ->setComment('Movie Actor Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('magenest_movie_actor'),
                $setup->getIdxName(
                    $installer->getTable('magenest_movie_actor'),
                    ['movie_id','actor_id'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
                ),
                ['movie_id','actor_id'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_INDEX
            );

            $installer->getConnection()
                ->addForeignKey(
		        $installer->getFkName('magenest_movie_actor', 'movie_id', 'magenest_movie', 'movie_id'),
		        $installer->getTable('magenest_movie_actor'),
		        'movie_id',
		        $installer->getTable('magenest_movie'),
		        'movie_id',
		        \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
             $installer->getConnection()
             	->addForeignKey(
                    $installer->getFkName('magenest_movie_actor', 'actor_id', 'magenest_actor', 'actor_id'),
                    $installer->getTable('magenest_movie_actor'),
                    'actor_id',
                    $installer->getTable('magenest_actor'),
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                );
        }
        $installer->endSetup();
    }
}

