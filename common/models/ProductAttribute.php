<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute".
 *
 * @property int $id ID атрибута
 * @property float|null $weight Вес (кг)
 * @property float|null $width Ширина (см)
 * @property float|null $height Высота (см)
 * @property string|null $color Цвет
 * @property int $product_id ID товара
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Product $product
 */
class ProductAttribute extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weight', 'width', 'height', 'color'], 'default', 'value' => null],
            [['updated_at'], 'default', 'value' => 0],
            [['weight', 'width', 'height'], 'number'],
            [['product_id'], 'required'],
            [['product_id', 'created_at', 'updated_at'], 'integer'],
            [['color'], 'string', 'max' => 100],
            [['product_id'], 'unique'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weight' => 'Weight',
            'width' => 'Width',
            'height' => 'Height',
            'color' => 'Color',
            'product_id' => 'Product ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

}
