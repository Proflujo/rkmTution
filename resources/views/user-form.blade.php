@extends('layouts.app')

@php
    $branchId = $userInfo[0]->branch ?? '';
    $headerName = $branchId ? 'Edit User' : 'Add User';
    $buttonName = $branchId ? 'Update' : 'Add';
@endphp

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $headerName }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ url('/create/user') }}">
                            @csrf

                            <input id="userId" type="hidden" name="userId" value="{{ $userInfo[0]->id ?? '' }}">

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $userInfo[0]->username ?? '' }}"  autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="branch" class="col-md-4 col-form-label text-md-end">{{ __('Branch') }}</label>

                                <div class="col-md-6">
                                    <select name="branch" id="branch" class="form-select @error('branch') is-invalid @enderror selectpicker" aria-label="Default select example">
                                        <option></option>
                                        @foreach($branches as $id => $name)
                                            <option value="{{ $id }}" {{ $id == $branchId ? "selected" : "" }}>{{ $name }}</option>
                                        @endforeach 
                                    </select>

                                    @error('branch')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $userInfo[0]->mobile ?? '' }}" autocomplete="mobile">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $userInfo[0]->email ?? '' }}" autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" value="{{ $userInfo[0]->password ?? ''}}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" value="{{ $userInfo[0]->password ?? '' }}">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ $buttonName }}
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
    </div>
@endsection