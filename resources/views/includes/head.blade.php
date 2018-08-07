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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var cel = "{{$forecast['temp']}}" ;
            var fah = Math.round({{$forecast['temp']}}  * 9 / 5 + 32);

            $(".wn-temperature").prepend(cel + "°");

            $("#windSpeed").text("Wind speed: {{$forecast['windspeed']}} km/h");
            $('.format-c').click(function () {
                var $this = $(this);
                $this.toggleClass('format-c');

                if ($this.hasClass('format-c')) {
                    $(this).removeClass('format-f');
                    $(this).addClass('format-c');
                    $(".wn-temperature").empty();
                    $(".wn-temperature").prepend(cel + "° "+"<img\n" +
                        "                    src=\"{{asset($forecast['currentIcon'])}}\"\n" +
                        "                    class=\"wn-icon\">");
                    $("#windSpeed").empty();
                    $("#windSpeed").text("Wind speed: {{$forecast['windspeed']}} km/h");


                } else {
                    $(this).removeClass('format-c');
                    $(this).toggleClass('format-f');
                    $(".wn-temperature").empty();
                    $(".wn-temperature").prepend(fah + "° "+"<img\n" +
                        "                    src=\"{{asset($forecast['currentIcon'])}}\"\n" +
                        "                    class=\"wn-icon\">")
                    $("#windSpeed").text("Wind speed: " + Math.round({{$forecast['windspeed']}}* 0.6213711922) + " Mph"
                )
                    ;

                }
            });


        });


    </script>
</head>
