<?php

use yii\db\Migration;

/**
 * Class m240101_000001_create_product_table
 */
class m240101_000001_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Для MySQL
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'title' => $this->string(255)->notNull()->comment('Название'),
            'description' => $this->text()->null()->comment('Описание'),
            'category_id' => $this->integer()->null()->comment('ID категории'),
            'model_id' => $this->integer()->null()->comment('ID модели'),
            'guid' => $this->string(36)->unique()->notNull()->comment('GUID'),
            'is_del' => $this->boolean()->defaultValue(false)->comment('Удален?'),
        ]);

        $this->createIndex('idx-product-category_id', '{{%product}}', 'category_id');
        $this->createIndex('idx-product-model_id', '{{%product}}', 'model_id');
        $this->createIndex('idx-product-is_del', '{{%product}}', 'is_del');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}