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
    public function getPrices()
    {
        return ['bronze' => 50, 'silver' => 100, 'gold' => 150];


    }


    public function getWeather()
    {


        $currrentTime = Carbon::now()->toDayDateTimeString();
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

        $units = 'si';
        $now = \DarkSky::location($lat, $long)->includes(['currently'])->units($units)->get();
        $windspeed = round($now->currently->windSpeed, 1);
        $humidity = ($now->currently->humidity) * 100;
        $summary = $now->currently->summary;
        $temp = round($now->currently->temperature, 0);
        $degree = $now->currently->windBearing;


        $weather = \DarkSky::location($lat, $long)->get();

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


            $iconNumber = null;

            //  $iconNumber = $this->weatherIcon($icon);

            switch ($icon) {

                case  'clear-day':
                    $iconNumber = 'assets/images/icons/weather/01.svg';
                    break;
                case  'clear-night':
                    $iconNumber = 'assets/images/icons/weather/01.svg';
                    break;
                case  'partly-cloudy-day':
                    $iconNumber = 'assets/images/icons/weather/02.svg';
                    break;
                case  'cloudy':
                    $iconNumber = 'assets/images/icons/weather/03.svg';
                    break;
                case  'partly-cloudy-night':
                    $iconNumber = 'assets/images/icons/weather/04.svg';
                    break;
                case  'rain':
                    $iconNumber = 'assets/images/icons/weather/09.svg';
                    break;
                case  'snow':
                    $iconNumber = 'assets/images/icons/weather/13.svg';
                    break;
                case  'sleet':
                    $iconNumber = 'assets/images/icons/weather/13.svg';
                    break;
                case  'fog':
                    $iconNumber = 'assets/images/icons/weather/50.svg';
                    break;
                case  'sleet':
                    $iconNumber = 'assets/images/icons/weather/13.svg';
                    break;
                case  'hail':
                    $iconNumber = 'assets/images/icons/weather/104.svg';
                    break;
                case  'thunderstorm':
                    $iconNumber = 'assets/images/icons/weather/11.svg';
                    break;

            }


            $dailySummary[] = array('summary' => $dailysummarytext, 'day' => $dayofWeek, 'date' => $date, 'humidity' => $humidity,
                'low' => $lowTemp, 'high' => $highTemp, 'icon' => $iconNumber, 'weekDay' => $dayofWeekday,
                'sunrise' => $sunrise, 'sunset' => $sunset);

            $dailyDay[] = $dayofWeek;


        }

        $direction = null;

        $bearing = $weather->currently->windBearing;


        function windRose($item)
        {
            $winddir[] = "North";
            $winddir[] = "North North East";
            $winddir[] = "North East";
            $winddir[] = "East North East";
            $winddir[] = "East";
            $winddir[] = "East South East";
            $winddir[] = "South East";
            $winddir[] = "South South East";
            $winddir[] = "South";
            $winddir[] = "South South West";
            $winddir[] = "South West";
            $winddir[] = "West South West";
            $winddir[] = "West";
            $winddir[] = "West North West";
            $winddir[] = "North West";
            $winddir[] = "North North West";
            $winddir[] = "North";
            return $winddir[round($item * 16 / 360)];
        }


        $direction = windRose($bearing);

        return (['time' => $currrentTime, 'title' => $title, 'loc' => $location,
            'lat' => $lat, 'long' => $long, 'weather' => $weather, 'direction' => $direction, 'ip' => $ip,
            'dailyS' => $dailySummary, 'days' => $dailyDay, 'windspeed' => $windspeed, 'humidity' => $humidity,
            'summary' => $summary, 'temp' => $temp, 'degree' => $degree]);

    }


    public function weatherIcon($icon): string
    {

        $iconNumber = '';
        switch ($icon) {

            case  'clear-day':
                $iconNumber = 'assets/images/icons/weather/01.svg';
                break;
            case  'clear-night':
                $iconNumber = 'assets/images/icons/weather/01.svg';
                break;
            case  'partly-cloudy-day':
                $iconNumber = 'assets/images/icons/weather/02.svg';
                break;
            case  'cloudy':
                $iconNumber = 'assets/images/icons/weather/03.svg';
                break;
            case  'partly-cloudy-night':
                $iconNumber = 'assets/images/icons/weather/04.svg';
                break;
            case  'rain':
                $iconNumber = 'assets/images/icons/weather/09.svg';
                break;
            case  'snow':
                $iconNumber = 'assets/images/icons/weather/13.svg';
                break;
            case  'sleet':
                $iconNumber = 'assets/images/icons/weather/13.svg';
                break;
            case  'fog':
                $iconNumber = 'assets/images/icons/weather/50.svg';
                break;
            case  'sleet':
                $iconNumber = 'assets/images/icons/weather/13.svg';
                break;
            case  'hail':
                $iconNumber = 'assets/images/icons/weather/104.svg';
                break;
            case  'thunderstorm':
                $iconNumber = 'assets/images/icons/weather/11.svg';
                break;

        }
        return $iconNumber;
    }


}
