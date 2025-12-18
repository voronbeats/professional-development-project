<?php

namespace api\modules\frontApi;

/**
 * frontApi module definition class
 */
class frontApi extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'api\modules\frontApi\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::configure($this, require '/app/api'. '/config/main.php');
        // custom initialization code goes here
    }
}
