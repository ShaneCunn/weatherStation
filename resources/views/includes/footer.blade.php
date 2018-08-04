<div class="row">
    <div class="weather-info">
        <div class="wi-title">Info</div>
        <div class="wi-content">
            <div class="wi-item">
                <div class="wi-icon">
                  
                    <img src="{{asset('assets/images/icons/sunrise.svg')}}" class="wf-icon">
                </div>
                <div class="wi-description">
                    <div class="wi-name">
                        Sunrise
                    </div>
                    <div class="wi-value">
                        {{$dailyS[0]['sunrise']}}
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
                        {{$dailyS[0]['sunset']}}
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

