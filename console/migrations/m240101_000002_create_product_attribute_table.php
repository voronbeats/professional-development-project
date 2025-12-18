<?php

use yii\db\Migration;

/**
 * Class m240101_000002_create_product_attribute_table
 */
class m240101_000002_create_product_attribute_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_attribute}}', [
            'id' => $this->primaryKey()->comment('ID атрибута'),
            'weight' => $this->decimal(10, 2)->null()->comment('Вес (кг)'),
            'width' => $this->decimal(10, 2)->null()->comment('Ширина (см)'),
            'height' => $this->decimal(10, 2)->null()->comment('Высота (см)'),
            'color' => $this->string(100)->null()->comment('Цвет'),
            'product_id' => $this->integer()->notNull()->comment('ID товара'),
            'created_at' => $this->integer()->notNull()->defaultValue(0),
            'updated_at' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->createIndex('idx_product_attribute_product_id', '{{%product_attribute}}', 'product_id', true);

        $this->createIndex('idx_product_attribute_color', '{{%product_attribute}}', 'color');
        $this->createIndex('idx_product_attribute_weight', '{{%product_attribute}}', 'weight');

        $this->addForeignKey(
            'fk_product_attribute_product',
            '{{%product_attribute}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_attribute_product', '{{%product_attribute}}');

        $this->dropTable('{{%product_attribute}}');
    }
}