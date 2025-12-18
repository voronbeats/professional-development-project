<?php

use yii\db\Migration;

class m240318_000000_add_indexes_to_product_tables extends Migration
{
    public function safeUp()
    {
        $this->createIndex(
            'idx-product-category_id-model_is',
            '{{%product}}',
            ['category_id', 'model_id']
        );

        $this->createIndex(
            'idx-product_attribute-product_id',
            '{{%product_attribute}}',
            'product_id'
        );
    }

    public function safeDown()
    {
        $this->dropIndex(
            'idx-product-category_id-model_id',
            '{{%product}}'
        );

        $this->dropIndex(
            'idx-product_attribute-product_id',
            '{{%product_attribute}}'
        );
    }
}