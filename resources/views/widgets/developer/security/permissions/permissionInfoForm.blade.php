@php

	$permissionInfo	=	isset($permissionInfo) ? $permissionInfo : (object) [];

	$data 			=	[
							"name" => old("name") ? old("name") : ( isset($permissionInfo->name) ? $permissionInfo->name : "" ),
							"display_name" => old("display_name") ? old("display_name") : ( isset($permissionInfo->display_name) ? $permissionInfo->display_name : "" ),
							"description" => old("description") ? old("description") : ( isset($permissionInfo->description) ? $permissionInfo->description : "" )
						];

@endphp

<div class="row">

	<div class="form-group parent-display_name required-field col-lg-6 {{ $errors->permissionInfo->has('display_name') ? 'has-error' : '' }}">
		<label for="display_name">{{ Lang::get("Display Name") }}</label>
		<input type="text" class="form-control" id="display_name" name="display_name" value="{{ $data['display_name'] }}" />
		@if($errors->permissionInfo->has('display_name'))
			<span class="help-block">{{ $errors->permissionInfo->first('display_name') }}</span>
		@endif
	</div>
	
</div>

<div class="row">

	<div class="form-group parent-name required-field col-lg-6 {{ $errors->permissionInfo->has('name') ? 'has-error' : '' }}">
		<label for="name">{{ Lang::get("Name") }}</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}" />
		@if($errors->permissionInfo->has('name'))
			<span class="help-block">{{ $errors->permissionInfo->first('name') }}</span>
		@endif
	</div>
	
</div>

<div class="row">

	<div class="form-group parent-description col-lg-6 {{ $errors->permissionInfo->has('description') ? 'has-error' : '' }}">
		<label for="description">{{ Lang::get("Description") }}</label>
		<textarea class="form-control" id="description" name="description" rows="5">{{ $data['description'] }}</textarea>
		@if($errors->permissionInfo->has('description'))
			<span class="help-block">{{ $errors->permissionInfo->first('description') }}</span>
		@endif
	</div>
	
</div>