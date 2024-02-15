@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Role</div>

                    <div class="card-body">
                        <form method="post" action="{{ url('/create/role') }}">
                            @csrf

                            <input id="roleId" type="hidden" name="roleId" value="{{ $roleInfo->id ?? '' }}">

                            <div class="row col-lg-12">

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-lg-12 ">
                                            <label for="display_name">Name</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ $roleInfo->name ?? ''}}" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-12 ">
                                            <label for="slug_name">Slug</label>
                                            <input type="text" class="form-control  @error('slug_name') is-invalid @enderror" id="slug_name" name="slug_name" value="{{ $roleInfo->guard_name ?? ''}}" />
                                            @error('slug_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                       <div class="form-group col-lg-12">
                                        <label for="description">Description</label>
                                        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ $roleInfo->description ?? ''}}</textarea>
                                        @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                    <a type="submit" class="btn btn-primary" href="{{ url('roles') }}">
                                        {{ __('Back') }}
                                    </a>
                                </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <fieldset class="border p-1">
                                        <legend  class="float-none w-auto p-1">Permissions</legend>
                                        <div class="@error('permissions') is-invalid @enderror">
                                        @foreach($permissions as $id => $name)
                                        
                                        <div class="custom-control col-md-6 custom-checkbox permission">
                                            <input type="checkbox" id="permission_{{ $id }}" name="permissions[]
                                            " class="" value="{{ $id }}" {{ in_array($id, $roleHasPermissionsInfo) ? 'checked' : '' }}>
                                            <label for="permission_{{ $id }}">{{ $name }}</label>


                                        </div>

                                        @endforeach

                                    </div>
                                            @error('permissions')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </fieldset>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection