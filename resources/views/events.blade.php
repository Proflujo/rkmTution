@extends('layouts.app')

@section('content')
	  <div class="row justify-content-center">
        <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Events') }}</div>
                    <div class="card-body" style="height:20%;text-align: center!important;">
                        <marquee direction="up" scrollamount="1"><center class="text-danger" style="font-weight: bold;font-size:25px;">This is Sample Events</center></marquee>
                    </div>
                </div>
        </div>                 
    </div>
@endsection
