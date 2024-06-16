<?php

namespace app\logic;

use app\logic\services\BaseLogService;
use app\logic\services\BaseMessageService;
use app\logic\services\ClientLogService;
use app\logic\services\ClientMessageService;
use app\logic\services\OperatorLogService;
use app\logic\services\OperatorMessageService;
use yii\base\Exception;

class MessageManager
{
    public const OPERATOR_MESSAGE_NAME = 'operator';
    public const CLIENT_MESSAGE_NAME = 'client';

    static function createLogService(string $name): BaseLogService {
        switch ($name) {
            case self::OPERATOR_MESSAGE_NAME:
                return new OperatorLogService();
            case self::CLIENT_MESSAGE_NAME:
                return new ClientLogService();
            default: throw new Exception('Unexpected message name');
        }
    }

    static function createMessageService(string $name): BaseMessageService {
        switch ($name) {
            case self::OPERATOR_MESSAGE_NAME:
                return new OperatorMessageService();
            case self::CLIENT_MESSAGE_NAME:
                return new ClientMessageService();
            default: throw new Exception('Unexpected message name');
        }
    }
}