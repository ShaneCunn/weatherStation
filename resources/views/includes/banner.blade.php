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

            <div class="wn-box wn-temperature">{{$temp}}° <img src="{{asset('assets/images/icons/weather/04.svg ')}}"
                                                        class="wn-icon"></div>

            <div class="wn-box wn-conditions">
                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                    <div class="wn-conditions-text">Conditions: {{$summary}}</div>
                </div>

                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/humidity.svg ')}}">
                    <div class="wn-conditions-text">Humidity: {{$humidity}}%</div>
                </div>
            </div>
            <div class="wn-box wn-conditions">
                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/speed.svg')}}">
                    <div class="wn-conditions-text">Wind speed: {{$windspeed}} km/h</div>
                </div>

                <div class="wn-box-condition-row"><img src="{{asset('assets/images/icons/conditions/direction.svg')}}"
                                                       style="transform: rotate(170deg);">
                    <div class="wn-conditions-text">Wind direction: {{$direction}}</div>
                </div>
            </div>
        </div>
    </div>
