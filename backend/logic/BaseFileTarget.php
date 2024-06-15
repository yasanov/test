<?php

namespace app\logic;

use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\log\FileTarget;

class BaseFileTarget extends FileTarget
{
    public function formatMessage($message)
    {
        $text = $message[0];
        $timestamp = $message[3];
        if (!is_string($text)) {
            throw new Exception('text must be string type');
        }
        return $this->getTime($timestamp) . ' ' . $text;
    }
}