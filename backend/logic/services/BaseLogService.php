<?php

namespace app\logic\services;

abstract class BaseLogService
{
    public static string $logCategory = '';
    abstract public function log(array $payload);
}