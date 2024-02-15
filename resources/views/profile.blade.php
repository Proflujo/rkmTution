@extends('layouts.app')

@php
    $branchId = $userDetails->branch;
@endphp

@section('content')
	  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">

                            <input id="userId" type="hidden" name="userId" value="{{ $userInfo[0]->id ?? '' }}">

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ $userDetails->username ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>

                                <div class="col-md-6">
                                    <select name="branch" id="branch" class="form-select selectpicker" aria-label="Default select example" disabled>
                                        <option></option>
                                        @foreach($branches as $branch)
                                            <option value="{{$branch->codelist_value}}" {{ $branch->codelist_value == $branchId ? "selected" : "" }}>{{ $branch->codelist_description }}</option>
                                        @endforeach                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="mobile" class="form-control" name="mobile" value="{{ $userDetails->mobile ?? '' }}" disabled>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $userDetails->email ?? '' }}" disabled>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection