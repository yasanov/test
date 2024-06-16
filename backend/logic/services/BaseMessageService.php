<?php

namespace app\logic\services;

abstract class BaseMessageService
{
    abstract public function answer(array $payload): void;
}