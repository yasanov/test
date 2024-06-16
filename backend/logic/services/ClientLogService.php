<?php

namespace app\logic\services;

use app\logic\MessageManager;
use \Yii;

class ClientLogService extends BaseLogService
{
    public static string $logCategory = 'client';

    public function log(array $payload) {
        $message = $payload['message']['text'] ?? '';
        Yii::info($message, self::$logCategory);
    }
}