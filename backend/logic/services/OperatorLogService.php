<?php

namespace app\logic\services;

use app\logic\MessageManager;
use \Yii;

class OperatorLogService extends BaseLogService
{
    public static string $logCategory = 'operator';

    public function log(array $payload) {
        $message = $payload['message']['text'] ?? '';
        Yii::info($message, self::$logCategory);
    }
}