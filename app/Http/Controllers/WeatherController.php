<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Stevebauman\Location\Position;
use Naughtonium\LaravelDarkSky\DarkSky;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Gmopx\LaravelOWM\LaravelOWM;

use App\Services\WeatherClass;



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
//+latitude: "53.2519"
//  +longitude: "-9.1497"
        //  DarkSky::location(lat, lon)->get();
        $position = \Location::get($ip);

        // dd($position);
        $location = $position->cityName;

        //dd($location);
        $lat = $position->latitude;
        $long = $position->longitude;

        $units = 'si';
        $now = \DarkSky::location($lat, $long)->includes(['currently'])->units($units)->get();
        $windspeed = round($now->currently->windSpeed, 1);
        $humidity = ($now->currently->humidity) * 100;
        $summary = $now->currently->summary;
        $temp = round($now->currently->temperature, 0);
        $degree = $now->currently->windBearing;

        //  dd($windspeed);
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

            $iconNumber = $this->weatherIcon($icon);


            $dailySummary[] = array('summary' => $dailysummarytext, 'day' => $dayofWeek, 'date' => $date, 'humidity' => $humidity,
                'low' => $lowTemp, 'high' => $highTemp, 'icon' => $iconNumber, 'weekDay' => $dayofWeekday,
                'sunrise' => $sunrise, 'sunset' => $sunset);

            // dd($dailySummary);
            $dailyDay[] = $dayofWeek;


        }
        //  dd($dailySummary[0]['sunrise']);

        /* foreach ($dailySummary as $key => $value) {
             echo $value{'summary'};
             echo $value{'day'} . '<br>';
             echo $value{'weekDay'} . '<br>';

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
            'summary' => $summary, 'temp' => $temp, 'degree' => $degree]);


    }


    public function getModel()
    {

        $weatherClass = new WeatherClass();

        $lat = $weatherClass->getLocation()['lat'];
        $long = $weatherClass->getLocation()['long'];
        $currentTime = $weatherClass->getLocation()['currentTime'];

        $forecast = $weatherClass->getWeather($weatherClass);

        $daily = $weatherClass->getDaily($weatherClass);
        //  dd(compact('forecast', 'daily'));
        $cel = 22;
        $fah = $cel * 9 / 5 + 32;

        return view('weather.master', ['cel' => $cel, 'fah' => $fah], compact('forecast', 'daily'));


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


    public function getButton()
    {

        $title = 'Button Test';
        $cel = 22;
        $fah = $cel * 9 / 5 + 32;
        return view('button', ['title' => $title, 'cel' => $cel, 'fah' => $fah]);

    }


    public function getDay()
    {
        $currrentTime = Carbon::now()->toDayDateTimeString();
        $ip = \Request::ip();

        if ($ip == "127.0.0.1") {

            $ip = '86.44.136.190';
        } else {

            $ip = \Request::ip();

        }

        $position = \Location::get($ip);

        //dd($location);
        $lat = $position->latitude;
        $long = $position->longitude;

        $units = 'Metric';
        $dayhour = \DarkSky::location($lat, $long)->hourly();
       // $dailysummarytext = $dayhour->hourly->data->summary;
       // dd($dayhour);

        $apiKEy= 'd8c207a8f9644f4fe04d26bce82adbb2';

        $lowm = new LaravelOWM($apiKEy);
        $forecast = $lowm->getWeatherForecast('Galway');

       // dd($forecast);

        $forecast = $lowm->getWeatherForecast('Galway', $units,'', 5);
        var_dump($forecast);
         dd($forecast);
        echo "EXAMPLE 2<hr />\n\n\n";

        foreach ($forecast as $weather) {
            echo "Weather forecast at " . $weather->time->day->format('d.m.Y') . " from " . $weather->time->from->format('H:i') . " to " . $weather->time->to->format('H:i') . "<br />";
            echo $weather->temperature . "<br />\n";

          //  echo $weather->das
            echo "<br />\n";
            echo "Sun rise: " . $weather->sun->rise->format('d.m.Y H:i (e)');
            echo "<br />\n";
            echo "---<br />\n";
        }

        //return view('weather.master', ['time' => $currrentTime,]);
    }


}
