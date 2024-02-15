@php

	$vehicleTypeInfo = isset($vehicleTypeInfo) ? $vehicleTypeInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'name' => old('name') ? old('name') : (isset($vehicleTypeInfo->name) ? $vehicleTypeInfo->name : ''),
		'vehicle_segment' => old('vehicle_segment') ? old('vehicle_segment') : (isset($vehicleTypeInfo->vehicle_segment) ? $vehicleTypeInfo->vehicle_segment : ''),
		'packages' => old('packages') ? old('packages') : (isset($vehicleTypeInfo->packages) ? $vehicleTypeInfo->packages : [])
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	<div class="form-group parent-name col-lg-6 {{ $errors->vehicleTypeInfo->has('name') ? 'has-error' : '' }}">
		<label for="name">Name</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleTypeInfo->has('name'))
			<span class="help-block">{{ $errors->vehicleTypeInfo->first('name') }}</span>
		@endif
	</div>

	<fieldset class="fieldset-group col-lg-6 parent-packages">
		<legend>Packages</legend>
		<div class="form-group col-lg-6 {{ $errors->vehicleTypeInfo->has('packages') ? 'has-error' : '' }}">
			@foreach($packages as $packageId => $package)
				<div class="custom-control col-md-12 custom-checkbox">
					<input type="checkbox" id="packages_{{ $packageId }}" name="packages[]" class="custom-control-input" value="{{ $packageId }}" {{ in_array($packageId, $data["packages"]) ? "checked" : "" }}>
					<label class="custom-control-label" for="packages_{{ $packageId }}">{{ $package }}</label>
				</div>
			@endforeach
			@if($errors->vehicleTypeInfo->has('packages'))
				<span class="help-block">{{ $errors->vehicleTypeInfo->first('packages') }}</span>
			@endif
		</div>
	</fieldset>

</div>

<div class="row">

	<div class="form-group parent-vehicle_segment col-lg-6 {{ $errors->vehicleTypeInfo->has('vehicle_segment') ? 'has-error' : '' }}">
		<label for="vehicle_segment">Vehicle Segment</label>
		<select class="form-control selectpicker" data-placeholder="" id="vehicle_segment" name="vehicle_segment" {{ $disabledAttribute }}>
			<option></option>
			@foreach($segments as $code => $text)
				<option value="{{ $code }}" {{ $code == $data['vehicle_segment'] ? "selected" : "" }}>{{ $text }}</option>
			@endforeach
		</select>
		@if($errors->vehicleTypeInfo->has('vehicle_segment'))
			<span class="help-block">{{ $errors->vehicleTypeInfo->first('vehicle_segment') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	//
</script>