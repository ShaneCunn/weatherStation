<div class="row">
    <div class="weather-forecast daily">
        <div class="wf-title">Daily Forecast</div>
        <div><?php $count = 0; ?>
            @foreach($daily as $key => $value)
                <a href="https://meteo.test/location/2964180/day/02" class="wf-list">
                    <div class="wf-list-col wf-date">
                        <div class="wf-day">{{$value['day']}}</div>
                        <div class="wf-date">{{$value['date']}}</div>
                    </div>

                    <div class="wf-list-col wf-conditions">
                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/condition.svg')}}">
                            <div class="wf-conditions-text">Conditions: {{$value['summary']}}</div>
                        </div>

                        <div class="wf-condition-row"><img
                                src="{{asset('assets/images/icons/conditions/humidity.svg')}}">
                            <div class="wf-conditions-text">Humidity: {{$value['humidity']}}%</div>
                        </div>
                    </div>
                    <div class="wf-list-col wf-temp-icon">
                        <div class="wf-icon"><img
                                src="{{asset($value['icon'])}}"
                                class="wf-icon"></div>
                        <div class="wf-temp">
                            <div class="wf-temp-max" id="max{{$count}}">{{$value['high']}}°</div>
                            <div class="wf-temp-min"id="low{{$count}}">{{$value['low']}}°</div>

                        </div>
                    </div>
                </a>
                <?php $count++; ?>
            @endforeach

        </div>
    </div>
</div>
