<?php

namespace app\logic\services;

abstract class BaseLogService
{
    abstract public function log(array $payload);
}