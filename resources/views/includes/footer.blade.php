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
                        {{$daily[0]['sunrise']}}
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
                        {{$daily[0]['sunset']}}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var cel = "{{$forecast['temp']}}";
        var fah = Math.round({{$forecast['temp']}}  * 9 / 5 + 32
    )
        ;

        var maxNums = [];
        var lowNums = [];

        for (var i = 0; i <= 4; i++) {


            var maxNum = parseInt(document.getElementById("max" + i).textContent);
            var lowNum = parseInt(document.getElementById("low" + i).textContent);
            maxNums.push(maxNum);
            lowNums.push(lowNum);
        }


        $(".wn-temperature").prepend(cel + "°");

        $("#windSpeed").text("Wind speed: {{$forecast['windspeed']}} km/h");
        $('.format-c').click(function () {
            var $this = $(this);
            $this.toggleClass('format-c');

            if ($this.hasClass('format-c')) {
                $(this).removeClass('format-f');
                $(this).addClass('format-c');
                $(".wn-temperature").empty();
                $(".wn-temperature").prepend(cel + "° " + "<img\n" +
                    "                    src=\"{{asset($forecast['currentIcon'])}}\"\n" +
                    "                    class=\"wn-icon\">");
                $("#windSpeed").empty();
                $("#windSpeed").text("Wind speed: {{$forecast['windspeed']}} km/h");

                for (var i = 0; i <= 5; i++) {
                    $("#max" + i).text(maxNums[i] + "°");
                    $("#low" + i).text(lowNums[i] + "°");
                }


            } else {
                $(this).removeClass('format-c');
                $(this).toggleClass('format-f');
                $(".wn-temperature").empty();
                $(".wn-temperature").prepend(fah + "° " + "<img\n" +
                    "                    src=\"{{asset($forecast['currentIcon'])}}\"\n" +
                    "                    class=\"wn-icon\">")
                $("#windSpeed").text("Wind speed: " + Math.round({{$forecast['windspeed']}}* 0.6213711922) + " Mph"
            )
                ;

                for (var i = 0; i <= 4; i++) {

                    $("#max" + i).text(Math.round(maxNums[i] * 9 / 5 + 32) + "°");
                    $("#low" + i).text(Math.round(lowNums[i] * 9 / 5 + 32) + "°");
                }

            }
        });


    });


</script>
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

