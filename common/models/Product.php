<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id ID
 * @property string $title Название
 * @property string|null $description Описание
 * @property int|null $category_id ID категории
 * @property int|null $model_id ID модели
 * @property string $guid GUID
 * @property int|null $is_del Удален?
 *
 * @property ProductAttribute $productAttribute
 */
class Product extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'category_id', 'model_id'], 'default', 'value' => null],
            [['is_del'], 'default', 'value' => 0],
            [['title', 'guid'], 'required'],
            [['description'], 'string'],
            [['category_id', 'model_id', 'is_del'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['guid'], 'string', 'max' => 36],
            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'model_id' => 'Model ID',
            'guid' => 'Guid',
            'is_del' => 'Is Del',
        ];
    }

    /**
     * Gets query for [[ProductAttribute]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductAttribute()
    {
        return $this->hasOne(ProductAttribute::class, ['product_id' => 'id']);
    }

}
