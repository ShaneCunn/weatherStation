<div class="row">
    <div class="weather-forecast daily">
        <div class="wf-title">Daily Forecast</div>
        <div>


            @foreach($dailyS as $key => $value)







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
                            <div class="wf-temp-max">{{$value['high']}}°</div>
                            <div class="wf-temp-min">{{$value['low']}}°</div>
                        </div>
                    </div>
                </a>

            @endforeach
            {{--  <a href="https://meteo.test/location/2964180/day/03" class="wf-list">
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
              </a>--}}
        </div>
    </div>
</div>
