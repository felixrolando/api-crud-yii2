<?php

namespace app\controllers;

use yii\filters\Cors;

class PerfilController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Perfil';

    public function behaviors()
    {

        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [

            'class' => Cors::class,

            'cors' => [

                'Origin' => ['*'],

                'Access-Control-Allow-Origin' => ['*'],

                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE'],

                'Access-Control-Request-Headers' => ['*'],

                'Access-Control-Allow-Credentials' => null,

                'Access-Control-Max-Age' => 86400,

                'Access-Control-Expose-Headers' => []

            ]

        ];

        return $behaviors;;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
