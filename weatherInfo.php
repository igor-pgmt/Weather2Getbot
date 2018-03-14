<?php

include 'TelegramBot.php';
include 'Weather.php';

$telegramApi = new TelegramBot();
$weatherApi  = new Weather();

// Getting Telegram Webhooks
$update = json_decode(file_get_contents('php://input'));

$chat_id = $update->message->chat->id;
$time    = date('H:i:s');

// If a message contains location, we grab some weather info about it
if (isset($update->message->location)) {
    $info    = $weatherApi->getWeather($update->message->location->latitude, $update->message->location->longitude);
    $message = $info->name.' '.$time.' '.$info->weather[0]->description.' '.$info->main->temp.'°C';
    $telegramApi->sendMessage($chat_id, $message);
} else {
    $message = $time.' '.'Please send your location';
    $telegramApi->sendMessage($chat_id, $message);
}

