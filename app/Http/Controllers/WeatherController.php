<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Stevebauman\Location\Position;
use Naughtonium\LaravelDarkSky\DarkSky;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WeatherController extends Controller
{


    public function index()
    {


        $currrentTime = Carbon::now()->toDayDateTimeString();
        $title = 'weather page';
        $ip = \Request::ip();

        if ($ip == "127.0.0.1") {

            $ip = '86.44.136.190';
        } else {

            $ip = \Request::ip();

        }

        //  DarkSky::location(lat, lon)->get();
        $position = \Location::get($ip);

        // dd($position);
        $location = $position->cityName;

        //dd($location);
        $lat = $position->latitude;
        $long = $position->longitude;

        $units = 'si';
        $now = \DarkSky::location($lat, $long)->includes(['currently'])->units($units)->get();
        $windspeed = $now->currently->windSpeed;
        $humidity = ($now->currently->humidity) * 100;
        $summary = $now->currently->summary;
        $temp = round($now->currently->temperature, 1);

        //  dd($windspeed);
        $weather = \DarkSky::location($lat, $long)->get();

        $weatherDaily = \DarkSky::location($lat, $long)->includes(['daily'])->get();
        $test3[] = $weatherDaily->daily->data['0']->summary;

        $test7[] = $weatherDaily->daily->data;

        $dailySummary = array();
        for ($count = 2; $count <= 6; $count++) {


            $dayofWeek = date('l jS', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->time)->subDay()));
            $date = date('d/m/y', strtotime(Carbon::createFromTimestamp($weatherDaily->daily->data[$count]->time)->subDay()));

            $dailysummarytext = $weatherDaily->daily->data[$count]->summary;

            $humidity = ($weatherDaily->daily->data[$count]->humidity) * 100;

            $lowTemp = round($weatherDaily->daily->data[$count]->temperatureLow, 0);
            $highTemp = round($weatherDaily->daily->data[$count]->temperatureHigh, 0);


            $icon = $weatherDaily->daily->data[$count]->icon;

            //  dd($icon);
            //  clear-day clear-night rain snow sleet wind fog cloudy partly-cloudy-day partly-cloudy-night ,hail, thunderstorm
            $iconNumber = null;

            $iconNumber = $this->weatherIcon($icon);


            $dailySummary[] = array('summary' => $dailysummarytext, 'day' => $dayofWeek, 'date' => $date, 'humidity' => $humidity,
                'low' => $lowTemp, 'high' => $highTemp, 'icon' => $iconNumber);

            // dd($dailySummary);
            $dailyDay[] = $dayofWeek;


        }
        //  dd($dailySummary);

        /*   foreach ($dailySummary as $key => $value) {
               echo $value{'summary'};
               echo $value{'day'} . '<br>';

           }*/
        // dd($dailyDay);
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
        // dd($direction);


        return view('weather.master', ['time' => $currrentTime, 'title' => $title, 'loc' => $location,
            'lat' => $lat, 'long' => $long, 'weather' => $weather, 'direction' => $direction, 'ip' => $ip,
            'dailyS' => $dailySummary, 'days' => $dailyDay, 'windspeed' => $windspeed, 'humidity' => $humidity,
            'summary' => $summary, 'temp' => $temp,]);


    }

    /**
     * @param $icon
     * @return string
     */
    public function weatherIcon($icon): string
    {
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
