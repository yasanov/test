<?php

namespace app\controllers;

use app\logic\MessageManager;
use Yii;
use yii\helpers\Json;
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
        $payload = Json::decode(Yii::$app->request->post('payload') ?? '{}');

        Yii::info($name, 'clients');
        if (isset($payload['text'])) {
            Yii::info($payload['text'], 'clients');
        }
        if (isset($payload['dialogId'])) {
            Yii::info($payload['dialogId'], 'clients');
        }

        return $name;

        $logService = MessageManager::createLogService($name);
        $messageService = MessageManager::createMessageService($name);

        $logService->log($payload);
        $messageService->answer($payload);

        return $name;
    }
}
