<?php

namespace app\logic\services;

use app\logic\MessageManager;
use \Yii;

class ClientLogService extends BaseLogService
{
    public function log(array $payload) {
        $message = $payload['message']['text'] ?? '';
        Yii::info($message, MessageManager::CLIENT_MESSAGE_NAME);
    }
}