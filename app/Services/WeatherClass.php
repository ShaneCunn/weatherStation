<?php
/**
 * Created by PhpStorm.
 * User: shane
 * Date: 06/08/18
 * Time: 08:50
 */

namespace App\Services;


class WeatherClass
{
    public function getPrices()
    {
        return ['bronze' => 50, 'silver' => 100, 'gold' => 150];
    }
}
