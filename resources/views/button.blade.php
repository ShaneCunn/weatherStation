@extends('layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            $("#test").text("{{$cel." C"}}");
            $('.btn').click(function () {
                var $this = $(this);
                $this.toggleClass('btn');
                if ($this.hasClass('btn')) {
                    $this.text('Cel');
                    $("#test").text("{{$cel." C"}}");

                } else {
                    $this.text('Fah');
                    $("#test").text("{{$fah.' F'}}");

                }
            });


        });


    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Model Dashboard</div>

                    <div class="card-body">


                        Model Section
                    </div>
                </div>
            </div>

            <div class="col-md-8"><p id="testtitle">{{$title}} </p>
                <div class="button-round-container" onclick="alert('temp event triggered')">
                    <div class="button-round format-c"></div>
                </div>


                <button type="button" class="btn btn-primary" id="weatherTemp">Cel</button>


                <p id="test">

                </p>

            </div>

        </div>
    </div>
@endsection
