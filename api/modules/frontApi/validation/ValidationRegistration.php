<?php

namespace api\modules\frontApi\validation;

use yii\base\Model;

class ValidationRegistration extends Model
{
    public $phone;

    public function rules()
    {
        return [
            ['phone', 'required'],
            ['phone', 'string'],
            ['phone', 'match', 'pattern' => '/^\+?[0-9]{10,15}$/'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона',
        ];
    }
}
