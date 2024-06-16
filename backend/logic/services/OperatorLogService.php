<?php

namespace app\logic\services;

use app\logic\MessageManager;
use \Yii;

class OperatorLogService extends BaseLogService
{
    public function log(array $payload) {
        $message = $payload['text'] ?? '';
        Yii::info($message, MessageManager::CLIENT_MESSAGE_NAME);
    }
}