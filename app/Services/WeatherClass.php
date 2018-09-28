<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 06/08/18
 * Time: 08:50
 */

namespace App\Services;

use Carbon\Carbon;
use Stevebauman\Location\Position;
use Naughtonium\LaravelDarkSky\DarkSky;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WeatherClass
{


    public function getWeather($weatherClass)
    {

        $lat = $weatherClass->getLocation()['lat'];
        $long = $weatherClass->getLocation()['long'];

        $currentTime = $weatherClass->getLocation()['currentTime'];
        $location = $weatherClass->getLocation()['city'];


        $units = 'si';
        $now = \DarkSky::location($lat, $long)->includes(['currently'])->units($units)->get();
        $windspeed = round($now->currently->windSpeed, 1);
        $humidity = ($now->currently->humidity) * 100;
        $summary = $now->currently->summary;
        $temp = round($now->currently->temperature, 0);
        $degree = $now->currently->windBearing;

        $icon = $now->currently->icon;
        $currentIcon = null;

        switch ($icon) {

            case  'clear-day':
                $currentImage = 'assets/images/weather/01.jpg';
                $currentIcon = 'assets/images/icons/weather/01.svg';
                break;
            case  'clear-night':
                $currentImage = 'assets/images/weather/01.jpg';
                $currentIcon = 'assets/images/icons/weather/01.svg';
                break;
            case  'partly-cloudy-day':
                $currentImage = 'assets/images/weather/02.jpg';
                $currentIcon = 'assets/images/icons/weather/02.svg';
                break;
            case  'cloudy':
                $currentImage = 'assets/images/weather/04.jpg';
                break;
            case  'partly-cloudy-night':
                $currentImage = 'assets/images/weather/02.jpg';
                $currentIcon = 'assets/images/icons/weather/03.svg';
                break;
            case  'rain':
                $currentImage = 'assets/images/weather/09.jpg';
                $currentIcon = 'assets/images/icons/weather/09.svg';
                break;
            case  'snow':
                $currentImage = 'assets/images/weather/13.jpg';
                $currentIcon = 'assets/images/icons/weather/13.svg';
                break;
            case  'sleet':
                $currentImage = 'assets/images/weather/104.jpg';
                $currentIcon = 'assets/images/icons/weather/13.svg';
                break;
            case  'fog':
                $currentImage = 'assets/images/weather/50.jpg';
                $currentIcon = 'assets/images/icons/weather/50.svg';
                break;
            case  'hail':
                $currentImage = 'assets/images/weather/104.jpg';
                $currentIcon = 'assets/images/icons/weather/104.svg';
                break;
            case  'thunderstorm':
                $currentImage = 'assets/images/weather/11.jpg';
                $currentIcon = 'assets/images/icons/weather/11.svg';
                break;
            case  'wind':
                $currentImage = 'assets/images/weather/103.jpg';
                $currentIcon = 'assets/images/icons/weather/103.svg';
                break;
            default:
                $currentImage = 'NotsetCurrent';


        }


        return (['time' => $currentTime, 'city' => $location,
            'lat' => $lat, 'long' => $long, 'windspeed' => $windspeed,
            'humidity' => $humidity, 'summary' => $summary, 'temp' => $temp, 'degree' => $degree, 'currentIcon' => $currentIcon, 'currentImage' => $currentImage]);

    }

    /**
     * @return array
     */
    public function getLocation()
    {

        $currentTime = null;
        $currentTime = Carbon::now()->toDayDateTimeString();
        $title = 'weather page';
        $ip = \Request::ip();

        if ($ip == "127.0.0.1") {

            $ip = '86.44.136.190';
        } else {

            $ip = \Request::ip();

        }

        $position = \Location::get($ip);

        $location = $position->cityName;

        $lat = $position->latitude;
        $long = $position->longitude;

        return (['lat' => $lat, 'long' => $long, 'currentTime' => $currentTime, 'city' => $location,]);

    }


    public function getDaily($weatherClass)
    {
        $lat = $weatherClass->getLocation()['lat'];
        $long = $weatherClass->getLocation()['long'];


        $weatherDaily = \DarkSky::location($lat, $long)->includes(['daily'])->get();


        $dailySummary = array();
        for ($count = 2; $count <= 6; $count++) {


            $dayofWeek = date('l jS', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->time)->subDay()));
            $dayofWeekday = date('l', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->time)->subDay()));


            $date = date('d/m/y', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->time)->subDay()));

            $sunrise = date('h:i', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->sunriseTime)->subDay()));
            $sunset = date('h:i', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->sunsetTime)->subDay()));

            $dailysummarytext = $weatherDaily->daily->data[$count]->summary;

            $humidity = ($weatherDaily->daily->data[$count]->humidity) * 100;

            $lowTemp = round($weatherDaily->daily->data[$count]->temperatureLow, 0);
            $highTemp = round($weatherDaily->daily->data[$count]->temperatureHigh, 0);


            $icon = $weatherDaily->daily->data[$count]->icon;


            $currentIcon = null;
            switch ($icon) {

                case  'clear-day':
                    $currentIcon = 'assets/images/icons/weather/01.svg';
                    break;
                case  'clear-night':
                    $currentIcon = 'assets/images/icons/weather/01.svg';
                    break;
                case  'partly-cloudy-day':
                    $currentIcon = 'assets/images/icons/weather/02.svg';
                    break;
                case  'cloudy':
                    $currentIcon = 'assets/images/icons/weather/03.svg';
                    break;
                case  'partly-cloudy-night':
                    $currentIcon = 'assets/images/icons/weather/04.svg';
                    break;
                case  'rain':
                    $currentIcon = 'assets/images/icons/weather/09.svg';
                    break;
                case  'snow':
                    $currentIcon = 'assets/images/icons/weather/13.svg';
                    break;
                case  'sleet':
                    $currentIcon = 'assets/images/icons/weather/13.svg';
                    break;
                case  'fog':
                    $currentIcon = 'assets/images/icons/weather/50.svg';
                    break;
                case  'sleet':
                    $currentIcon = 'assets/images/icons/weather/13.svg';
                    break;
                case  'hail':
                    $currentIcon = 'assets/images/icons/weather/104.svg';
                    break;
                case  'thunderstorm':
                    $currentIcon = 'assets/images/icons/weather/11.svg';
                    break;

                case  'wind':
                    $currentIcon = 'assets/images/icons/weather/103.svg';
                    break;
                default:
                    $currentIcon = 'NotSet';


            }

            $dailySummary[] = array('summary' => $dailysummarytext, 'day' => $dayofWeek, 'date' => $date, 'humidity' => $humidity,
                'low' => $lowTemp, 'high' => $highTemp, 'icon' => $currentIcon, 'weekDay' => $dayofWeekday,
                'sunrise' => $sunrise, 'sunset' => $sunset,);


        }
        //dd($dailySummary);
        return ($dailySummary);

    }


}
