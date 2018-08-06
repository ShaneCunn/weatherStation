@extends('layouts.app')

@section('content')
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

        <div class="col-md-8"><p>{{$forecast['title']}} </p></div>
    </div>
</div>
@endsection
