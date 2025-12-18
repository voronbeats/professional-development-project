<?php


namespace api\modules\frontApi\controllers;

use Yii;
use yii\rest\Controller;
use api\modules\frontApi\validation\ValidationRegistration;
use yii\web\BadRequestHttpException;

class UserController extends Controller
{
    public function actionRegistration()
    {
        $model = new ValidationRegistration();

        // принимаем данные с фронта
        $model->load(Yii::$app->request->bodyParams, '');

        if (!$model->validate()) {
            throw new BadRequestHttpException(json_encode($model->errors));
        }

        // если данные валидны — логика дальше
        return [
            'status' => 'ok',
        ];
    }
}
