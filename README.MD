# Weather2Getbot

This Telegram bot is written on PHP, works on WebHooks and shows information about location: weather description and temperature.
Default language: English.
You can try it: [@Weather2Getbot](https://t.me/Weather2Getbot)
See GOlang version [here](https://github.com/igor-pgmt/WeatherGetbot).

### How to interact with bot
Just send to him your location (tap on the attachment button and choose Location).

### How to install it on your server
  - [Create Your bot](https://core.telegram.org/bots#6-botfather) with [@Botfather](https://t.me/BotFather)
  - Register account on the [openweathermap.org](https://home.openweathermap.org/users/sign_up) ang get your API key [here](https://home.openweathermap.org/api_keys).
  - Generate certificate pair with FQDN name (or ip) of your server. You can [use self-signed certificates](https://core.telegram.org/bots/self-signed):
```sh
mkdir /etc/apache2/ssl && cd /etc/apache2/ssl
openssl req -newkey rsa:2048 -sha256 -nodes -keyout YOURPRIVATE.key -x509 -days 365 -out YOURPUBLIC.pem -subj "/C=RU/ST=MSC/L=Moscow/O=No/CN=YOURDOMAIN.COM"
```
  - Set WebHook with your pubic certificate and Telegram bot's API
```sh
curl -F "url=https://YOURDOMAIN.COM:443/weatherInfo" -F "certificate=@YOURPUBLIC.pem" "https://api.telegram.org/botXXXXXXXXX:AAAAAAAAAAAAAAAAAAAAAAAA/setwebhook"
```
  - Get files from github:
```sh
git clone https://github.com/igor-pgmt/Weather2Getbot.git
```
  - Specify some parameters:

**/eta/apache2/sites-available/YOURDOMAIN.conf:**
```conf
<VirtualHost *:443>
    ServerName YOURDOMAIN.COM
    DocumentRoot /var/www/html/YOURDOMAIN.COM
    SSLEngine on
    SSLCertificateFile ssl/YOURPUBLIC.pem
    SSLCertificateKeyFile ssl/YOURPRIVATE.key
</VirtualHost>
```
If you want, you can specify another port to listen: 80, 8080 or 8443 instead of 443
More info: https://core.telegram.org/bots/api

**TelegramBot.php:** specify your Telegram token
```PHP
    const TOKEN    = 'XXXXXXXXX:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
```
**OpenWeather.php:** specify your OpenWeather token
```PHP
    private $TOKEN = 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
```
Also you can change Bot's answers language:
```PHP
    private $lang  = 'en'; // en, ru, etc.
```
  - Then just move files to your web-server dir and restart Apache:
```bash
cd Weather2Getbot
mv *.php /var/www/html/YOURDOMAIN.COM/
sudo service apache2 restart
```

#### More information

[Telegram's API](https://core.telegram.org/bots/api)

[OpenWeatherMap's API](https://openweathermap.org/current)