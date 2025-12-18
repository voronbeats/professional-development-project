<?php

namespace api\modules\frontApi\controllers;

use yii\rest\Controller;
use yii\filters\AccessControl;

class BaseApiController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => $this->accessRules(),
        ];
        return $behaviors;
    }

    protected function accessRules(): array
    {
        return [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ];
    }
}
