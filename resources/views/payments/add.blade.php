@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('User Payments') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ url('/payments/user/store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <select name="username" id="username" class="form-select @error('username') is-invalid @enderror selectpicker" aria-label="Default select example">
                                        <option value=""></option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->username}}</option>
                                        @endforeach
                                    </select>
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
                                        <option value=""></option>
                                        @foreach($branchs as $branch)
                                            <option value="{{$branch->value}}">{{$branch->branch}}</option>
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
                                <label for="ammount" class="col-md-4 col-form-label text-md-end">{{ __('Ammount') }}</label>

                                <div class="col-md-6">
                                    <input id="ammount" type="ammount" class="form-control @error('ammount') is-invalid @enderror" name="ammount" value="{{ old('ammount') }}" autocomplete="ammount">

                                    @error('ammount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-10 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
