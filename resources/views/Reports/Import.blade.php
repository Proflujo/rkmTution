@extends('layouts.app')

@section('content')
    <div class="custom-datatable">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Import ') }}</div>

                    <div class="card-body">  
                        <div class="col-md-4 mt-4">
                           	<form  method="post" action="{{ url('/users/import')}}" enctype="multipart/form-data">
                                @csrf

                           		<input id="importFile" type="file" class="form-control" name="importFile" autofocus>

                           		<div class="mt-4">
	                                <div class="col-md-10 md-2">
	                                    <button type="submit" class="btn btn-primary">
	                                        Submit
	                                    </button>
	                                </div>
	                            </div>
                           	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection