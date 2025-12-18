<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Удаляем старые данные
        $auth->removeAll();

        // Создаем роли
        $admin = $auth->createRole('administrator');
        $manager = $auth->createRole('manager');
        $user = $auth->createRole('user');
        $guest = $auth->createRole('guest');

        $auth->add($admin);
        $auth->add($manager);
        $auth->add($user);
        $auth->add($guest);

        // Пример разрешения
        $viewDashboard = $auth->createPermission('viewDashboard');
        $auth->add($viewDashboard);

        // Привязка разрешений к ролям
        $auth->addChild($user, $viewDashboard);
        $auth->addChild($manager, $viewDashboard);
        $auth->addChild($admin, $viewDashboard);

        echo "RBAC initialized.\n";
    }
}