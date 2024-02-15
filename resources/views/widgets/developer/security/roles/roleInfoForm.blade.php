@php

	$roleInfo 	=	isset($roleInfo) ? $roleInfo : (object) [];
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$data 		=	[
						"name" => old("name") ? old("name") : ( isset($roleInfo->name) ? $roleInfo->name : "" ),
						"display_name" => old("display_name") ? old("display_name") : ( isset($roleInfo->display_name) ? $roleInfo->display_name : "" ),
						"description" => old("description") ? old("description") : ( isset($roleInfo->description) ? $roleInfo->description : "" ),
						"permissions" => old("permissions") ? old("permissions") : ( isset($roleInfo->permissions) ? explode(",", $roleInfo->permissions) : [] )
					];

@endphp
<style type="text/css">
	.parent-permissions
	{
		height: auto;
	}

	.permission
	{
		margin-bottom: 10px;
	}

	.permission-desc
	{
		display: block;
	}
</style>

<fieldset {{$disabledAttribute}}>
<div class="row col-lg-12">

<div class="col-lg-6">
	
	<div class="row">
		<div class="form-group parent-display_name required-field col-lg-12 {{ $errors->roleInfo->has('display_name') ? 'has-error' : '' }}">
			<label for="display_name">{{ Lang::get("Name") }}</label>
			<input type="text" class="form-control" id="display_name" name="display_name" value="{{ $data['display_name'] }}" />
			@if($errors->roleInfo->has('display_name'))
				<span class="help-block">{{ str_replace("display name","name",$errors->roleInfo->first('display_name')) }}</span>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="form-group parent-name required-field col-lg-12 {{ $errors->roleInfo->has('name') ? 'has-error' : '' }}">
			<label for="name">{{ Lang::get("Slug") }}</label>
			<input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}" />
			@if($errors->roleInfo->has('name'))
				<span class="help-block">{{str_replace("name","slug",$errors->roleInfo->first('name')) }}</span>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="form-group parent-description col-lg-12 {{ $errors->roleInfo->has('description') ? 'has-error' : '' }}">
			<label for="description">{{ Lang::get("Description") }}</label>
			<textarea class="form-control" id="description" name="description" rows="5">{{ $data['description'] }}</textarea>
			@if($errors->roleInfo->has('description'))
				<span class="help-block">{{ $errors->roleInfo->first('description') }}</span>
			@endif
		</div>
	</div>

</div>

<div class="col-lg-6">

	<fieldset class="fieldset-group col-lg-12 parent-permissions required-field">
		<legend>{{ Lang::get("Permissions") }}</legend>
		<div class="form-group col-lg-12 {{ $errors->roleInfo->has('permissions') ? 'has-error' : '' }}">
			@foreach($permissions as $permission)
				@php
					$id 	= $permission->id;
					$name 	= $permission->display_name;
					$desc 	= $permission->description;
				@endphp
				<div class="custom-control col-md-12 custom-checkbox permission">
					<input type="checkbox" class="custom-control-input" id="permission_{{ $id }}" name="permissions[]" value="{{ $id }}" {{ in_array($id, $data['permissions']) ? 'checked' : '' }}>
					<label class="custom-control-label" for="permission_{{ $id }}">{{ $name }}</label>
					<span class="permission-desc very-small-text">
						{{ $desc }}
					</span>
				</div>
			@endforeach
			@if($errors->roleInfo->has('permissions'))
				<span class="help-block mt-2">{{ $errors->roleInfo->first('permissions') }}</span>
			@endif
		</div>
	</fieldset>
	
</div>

</div>
</fieldset>
