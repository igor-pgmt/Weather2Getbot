<?php
class TelegramBot
{
    const TOKEN    = 'XXXXXXXXX:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    const BASE_URL = 'https://api.telegram.org/bot'.self::TOKEN.'/';

    protected $updateID = 0;

    public function sendRequest($method, $params = [])
    {
        if (!empty($params)) {
            $url = self::BASE_URL.$method.'?'.http_build_query($params);
        } else {
            $url = self::BASE_URL.$method;
        }

        return json_decode(file_get_contents($url));
    }

    public function sendMessage($chat_id, $text)
    {
        return $this->sendRequest('sendMessage', ['chat_id' => $chat_id, 'text' => $text]);
    }
}

