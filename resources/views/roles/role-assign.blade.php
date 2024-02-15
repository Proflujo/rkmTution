@extends('layouts.app')

@php
    
@endphp

@section('title', "Users Listing")

@section('content')
 <div class="custom-datatable">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Assign roles to - {{$userInfo->username}}
                </div>

                <div class="card-body">
                    <form method="post" action="{{ url('/assign/role') }}">
                        @csrf

                        <input id="userId" type="hidden" name="userId" value="{{ $userInfo->id }}">

                        <div class="@error('roles') is-invalid @enderror">
                            @if(isset($roles) && !empty($roles))
                                @foreach($roles as $id => $name)
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="custom-control col-md-6 custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="role-{{ $id }}" name="role[{{ $id }}]" value="{{ $id }}"><label class="custom-control-label w-100" for="role-{{ $id }}">
                                                <h5>{{ $name }}</h5>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                        </div>
                        
                        <div class="row">
                            <div class="col-md-11 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                                <a type="submit" class="btn btn-primary" href="{{ url('users/list') }}">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>
<div>
@endsection

@section('bottom-scripts')

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection