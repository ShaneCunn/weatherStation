<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Weather App</title>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">


    <link href="{{asset('assets/images/favicon.png')}}" rel="icon" type="image/png">
    <link href="{{asset('assets/css/chartist.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('assets/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/chartist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/functions.js')}}"></script>
</head>
<body>
<div id="loading-bar"></div>
<div id="header" class="header">
    <div class="header-content">
        <div class="header-col header-col-logo"><a href="https://meteo.test/">
                <div class="logo"></div>
            </a></div>
        <div class="header-col-content">
            <div class="search-content">
                <div class="search-container">
                    <input type="text" name="search" id="search-input" class="search-input" tabindex="1"
                           autocomplete="off" autocapitalize="off" autocorrect="off"
                           data-search-url="https://meteo.test/requests/search"
                           data-token-id="aa0520bfe3855ed4de2e828720f347ae7c60ec27d77304d592607564c654cb6b"
                           data-autofocus="0" placeholder="City name">
                    <div id="clear-button" class="clear-button"></div>
                    <div id="search-button" class="search-button"></div>
                    <div class="fav-list">
                        <div class="fav-list-icon fav-list-close" onclick="closeFavorites()"></div>
                        <div class="fav-list-title">Favorites</div>
                        <div class="fav-list-container">
                        </div>
                    </div>
                    <div class="search-list">
                        <div class="search-list-icon search-list-close" onclick="closeSearchResults()"></div>
                        <div class="search-list-title">Search Results</div>
                        <div class="search-list-container" id="search-results"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-col header-col-menu">
            <div class="header-menu-el">
                <div class="icon header-icon icon-menu menu-button" id="db-menu" data-db-id="menu"></div>
                <div class="menu" id="dd-menu">
                    <div class="menu-content">
                        <div class="menu-title">Preferences</div>
                        <div class="divider"></div>

                        <a href="https://meteo.test/preferences/language">
                            <div class="menu-icon icon-language"></div>
                            Language</a>
                        <a href="https://meteo.test/preferences/theme">
                            <div class="menu-icon icon-theme"></div>
                            Theme</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="content content-home">

    <div class="row">
        <div
            style="background-image: linear-gradient(var(--cover-top), var(--cover-bottom)), url('{{asset('assets/images/weather/04.jpg')}}');"
            class="weather-now">
            <div class="wn-title">Weather
                <form id="format">
                    <input type="hidden" name="token_id"
                           value="aa0520bfe3855ed4de2e828720f347ae7c60ec27d77304d592607564c654cb6b"> <input
                        type="hidden" name="format" value="1">
                </form>
                <div class="button-round-container" onclick="post('format')">
                    <div class="button-round format-c"></div>
                </div>

                <form id="favorite">
                    <input type="hidden" name="token_id"
                           value="aa0520bfe3855ed4de2e828720f347ae7c60ec27d77304d592607564c654cb6b"> <input
                        type="hidden" name="favorite">
                    <input type="hidden" name="id" value="2964180">
                    <input type="hidden" name="name" value="Galway, IE">
                </form>
                <div class="button-round-container" onclick="post('favorite')">
                    <div class="button-round favorite"></div>
                </div>
            </div>
            <div class="wn-location"><a href="https://meteo.test/location/2964180">Galway, IE</a></div>

            <div class="wn-box wn-temperature">17° <img src="{{asset('assets/images/icons/weather/04.svg ')}}"
                                                        class="wn-icon"></div>

            <div class="wn-box wn-conditions">
                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                    <div class="wn-conditions-text">Conditions: broken clouds</div>
                </div>

                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/humidity.svg ')}}">
                    <div class="wn-conditions-text">Humidity: 88%</div>
                </div>
            </div>
            <div class="wn-box wn-conditions">
                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/speed.svg')}}">
                    <div class="wn-conditions-text">Wind speed: 9.36 km/h</div>
                </div>

                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/direction.svg')}}"
                                                       style="transform: rotate(170deg);">
                    <div class="wn-conditions-text">Wind direction: 170°</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="weather-forecast daily">
            <div class="wf-title">Daily Forecast</div>
            <div>
                <a href="https://meteo.test/location/2964180/day/02" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">Thursday</div>
                        <div class="wf-date">08/02/2018</div>
                    </div>

                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: light rain</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg')}}">
                            <div class="wf-conditions-text">Humidity: 99%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img src="{{asset('assets/images/icons/weather/10.svg')}}"
                                                  class="wf-icon"></div>
                        <div class="wf-temp">
                            <div class="wf-temp-max">19°</div>
                            <div class="wf-temp-min">16°</div>
                        </div>
                    </div>
                </a>
                <a href="https://meteo.test/location/2964180/day/03" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">Friday</div>
                        <div class="wf-date">08/03/2018</div>
                    </div>
                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: light rain</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg')}}">
                            <div class="wf-conditions-text">Humidity: 97%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img src="{{asset('assets/images/icons/weather/10.svg')}}" class="wf-icon">
                        </div>
                        <div class="wf-temp">
                            <div class="wf-temp-max">20°</div>
                            <div class="wf-temp-min">15°</div>
                        </div>
                    </div>
                </a>
                <a href="https://meteo.test/location/2964180/day/04" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">Saturday</div>
                        <div class="wf-date">08/04/2018</div>
                    </div>

                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: clear sky</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg ')}}">
                            <div class="wf-conditions-text">Humidity: 97%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img
                                src="{{asset('assets/images/icons/weather/01.svg')}}"
                                class="wf-icon"></div>
                        <div class="wf-temp">
                            <div class="wf-temp-max">20°</div>
                            <div class="wf-temp-min">13°</div>
                        </div>
                    </div>
                </a>
                <a href="https://meteo.test/location/2964180/day/05" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">Sunday</div>
                        <div class="wf-date">08/05/2018</div>
                    </div>
                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: few clouds</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg')}}">
                            <div class="wf-conditions-text">Humidity: 94%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img
                                src="{{asset('assets/images/icons/weather/02.svg')}}"
                                class="wf-icon"></div>
                        <div class="wf-temp">
                            <div class="wf-temp-max">21°</div>
                            <div class="wf-temp-min">11°</div>
                        </div>
                    </div>
                </a>
                <a href="https://meteo.test/location/2964180/day/06" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">Monday</div>
                        <div class="wf-date">08/06/2018</div>
                    </div>
                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: light rain</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg ')}}">
                            <div class="wf-conditions-text">Humidity: 82%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img
                                src="{{asset('assets/images/icons/weather/10.svg')}}"
                                class="wf-icon"></div>
                        <div class="wf-temp">
                            <div class="wf-temp-max">20°</div>
                            <div class="wf-temp-min">14°</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="weather-evolution daily">
            <div class="we-title">Evolution</div>
            <div class="chart-container">
                <div class="chart-title">Daily Forecast Evolution (°C)</div>
                <div class="ct-chart">
                    <script>
                        new Chartist.Line('.ct-chart', {
                            labels: ['Thursday', 'Friday', 'Saturday', 'Sunday', 'Monday',],
                            series: [
                                ['19', '20', '20', '21', '20',],
                                ['16', '15', '13', '11', '14',]
                            ]
                        }, {
                            axisY: {
                                labelInterpolationFnc: function (value) {
                                    return (value) + '°';
                                }
                            },
                            fullWidth: true,
                            lineSmooth: false,
                            chartPadding: {
                                right: 50,
                                top: 20
                            },
                            height: 200
                        });
                    </script>
                </div>
                <div class="chart-legends">
                    <div class="chart-legend">
                        <div class="legend-color legend-min"></div>
                        <div class="legend-name">Lowest temperature</div>
                    </div>
                    <div class="chart-legend">
                        <div class="legend-color legend-max"></div>
                        <div class="legend-name">Highest temperature</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="weather-info">
            <div class="wi-title">Info</div>
            <div class="wi-content">
                <div class="wi-item">
                    <div class="wi-icon">
                        {{asset('')}}
                        <img src="{{asset('assets/images/icons/sunrise.svg')}}" class="wf-icon">
                    </div>
                    <div class="wi-description">
                        <div class="wi-name">
                            Sunrise
                        </div>
                        <div class="wi-value">
                            04:54
                        </div>
                    </div>
                </div>
                <div class="wi-item">
                    <div class="wi-icon">
                        <img src="{{asset('assets/images/icons/sunset.svg')}}" class="wf-icon">
                    </div>
                    <div class="wi-description">
                        <div class="wi-name">
                            Sunset
                        </div>
                        <div class="wi-value">
                            20:29
                        </div>
                    </div>
                </div>
                <div class="wi-item">
                    <div class="wi-icon">
                        <img src="{{asset('assets/images/icons/latitude.svg')}}" class="wf-icon">
                    </div>
                    <div class="wi-description">
                        <div class="wi-name">
                            Latitude
                        </div>
                        <div class="wi-value">
                            53.271938
                        </div>
                    </div>
                </div>
                <div class="wi-item">
                    <div class="wi-icon">
                        <img src="{{asset('assets/images/icons/longitude.svg')}}" class="wf-icon">
                    </div>
                    <div class="wi-description">
                        <div class="wi-name">
                            Longitude
                        </div>
                        <div class="wi-value">
                            -9.048890
                        </div>
                    </div>
                </div>
            </div>
            <div class="timezone">Timezone: GMT+00:00</div>
        </div>
    </div>

</div>
<footer id="footer" class="footer">
    <div class="footer-content">
        <div class="footer-menu">
            <a href="https://meteo.test/info/contact">Contact</a>
            <a href="https://meteo.test/info/about">About</a>
            <a href="https://meteo.test/admin">Admin</a>
        </div>
        Copyright &copy; 2018 Weather App. All rights reserved.
    </div>
</footer>
</body>
</html>
