<?php

/**
 * Weather class is for https://openweathermap.org/ service
 */
class OpenWeather
{

    // You can register account at openweathermap.org and get your API token https://home.openweathermap.org/api_keys
    private $TOKEN = 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    private $lang  = 'en';// en, ru, etc.
    private $mode  = 'json';// html, xml, json
    private $units = 'metric';// metric, imperial

    /**
	 * This function gets all informations about your location
	 */
    public function getWeather($lat, $lon)
    {
        $url = 'https://api.openweathermap.org/data/2.5/weather';

        $params          = [];
        $params['appid'] = $this->TOKEN;
        $params['lat']   = $lat;
        $params['lon']   = $lon;
        $params['lang']  = $this->lang;
        $params['mode']  = $this->mode;
        $params['units'] = $this->units;

        $url .= '?'.http_build_query($params);

        $result = json_decode(file_get_contents($url));

        return $result;

    }
}

