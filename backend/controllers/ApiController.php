<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['post'],
                ],
            ],
        ];
    }

   /**
     * Entry point
     *
     * @return string
     */
    public function actionIndex()
    {
        $name = Yii::$app->request->post('name');

        Yii::info($name, 'clients');
        Yii::info($name . '!', 'operators');

        return $name;
    }
}
