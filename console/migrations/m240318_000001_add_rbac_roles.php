<?php

use yii\db\Migration;

class m240318_000001_add_rbac_roles extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $roles = [
            'administrator' => 'Administrator role',
            'manager'       => 'Manager role',
            'user'          => 'User role',
            'guest'         => 'Guest role',
        ];

        foreach ($roles as $name => $description) {
            if ($auth->getRole($name) === null) {
                $role = $auth->createRole($name);
                $role->description = $description;
                $auth->add($role);
            }
        }
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        $roles = ['administrator', 'manager', 'user', 'guest'];

        foreach ($roles as $name) {
            $role = $auth->getRole($name);
            if ($role !== null) {
                $auth->remove($role);
            }
        }
    }
}