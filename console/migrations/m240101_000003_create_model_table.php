<?php

use yii\db\Migration;

/**
 * Class m240101_000003_create_model_table
 */
class m240101_000003_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%model}}', [
            'id' => $this->primaryKey()->comment('ID модели'),
            'name' => $this->string(255)->notNull()->comment('Название модели'),
            'description' => $this->text()->null()->comment('Описание модели'),
            'image' => $this->string(500)->null()->comment('Путь к изображению'),
            'created_at' => $this->integer()->notNull()->defaultValue(0)->comment('Дата создания'),
            'updated_at' => $this->integer()->notNull()->defaultValue(0)->comment('Дата обновления'),
            'is_active' => $this->boolean()->notNull()->defaultValue(true)->comment('Активна?'),
        ]);
        $this->createIndex('idx_model_name', '{{%model}}', 'name');
        $this->createIndex('idx_model_is_active', '{{%model}}', 'is_active');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%model}}');
    }
}