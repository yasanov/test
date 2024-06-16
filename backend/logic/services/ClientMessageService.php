<?php

namespace app\logic\services;

use \Yii;
use yii\base\Exception;
use yii\httpclient\Client;

class ClientMessageService extends BaseMessageService
{
    const REQUEST_MESSAGE = 'ping?';
    const RESPONSE_MESSAGE = 'pong!';

    public function answer(array $payload): void {
        if (str_contains($payload['text'] ?? '', self::REQUEST_MESSAGE) && isset($payload['dialogId'])) {
            $client = new Client();
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl(Yii::$app->params['teletypeApiBaseUrl'] . '/message/send')
                ->addHeaders(['X-Auth-Token' => Yii::$app->params['teletypeToken']])
                ->setData([
                    'dialogId' => $payload['dialogId'],
                    'text' => self::RESPONSE_MESSAGE,
                    ])
                ->send();
            if (!$response->isOk) {
                throw new Exception('Can not send the request to remote server');
            }
        }
    }
}