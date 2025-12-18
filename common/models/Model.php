<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property int $id ID модели
 * @property string $name Название модели
 * @property string|null $description Описание модели
 * @property string|null $image Путь к изображению
 * @property int $created_at Дата создания
 * @property int $updated_at Дата обновления
 * @property int $is_active Активна?
 */
class Model extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'image'], 'default', 'value' => null],
            [['updated_at'], 'default', 'value' => 0],
            [['is_active'], 'default', 'value' => 1],
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at', 'is_active'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_active' => 'Is Active',
        ];
    }

}
