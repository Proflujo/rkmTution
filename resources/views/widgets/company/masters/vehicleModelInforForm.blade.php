@php

	$vehicleModelInfo = isset($vehicleModelInfo) ? $vehicleModelInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'brand' => old('brand') ? old('brand') : (isset($vehicleModelInfo->brand) ? $vehicleModelInfo->brand : ''),
		'model' => old('model') ? old('model') : (isset($vehicleModelInfo->model) ? $vehicleModelInfo->model : ''),
		'type' => old('type') ? old('type') : (isset($vehicleModelInfo->type) ? $vehicleModelInfo->type : ''),
		'segment' => old('segment') ? old('segment') : (isset($vehicleModelInfo->segment) ? $vehicleModelInfo->segment : '')
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($vehicleModelInfo->vehicle_model_id))
		<input type="hidden" name="vehicleModelId" value="{{ base64_encode($vehicleModelInfo->vehicle_model_id) }}">
	@endif

	<div class="form-group parent-model col-lg-6 {{ $errors->vehicleModelInfo->has('model') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="model">Model</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="model" name="model" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehModels as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['model'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleModelInfo->has('model'))
			<span class="help-block">{{ $errors->vehicleModelInfo->first('model') }}</span>
		@endif
	</div>

	<div class="form-group parent-brand col-lg-6 {{ $errors->vehicleModelInfo->has('brand') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="brand">Brand</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="brand" name="brand" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehBrands as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['brand'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleModelInfo->has('brand'))
			<span class="help-block">{{ $errors->vehicleModelInfo->first('brand') }}</span>
		@endif
	</div>
	

</div>

<div class="row">

	<div class="form-group parent-type col-lg-6 {{ $errors->vehicleModelInfo->has('type') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="type">Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="type" name="type" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleTypes as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['type'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleModelInfo->has('type'))
			<span class="help-block">{{ $errors->vehicleModelInfo->first('type') }}</span>
		@endif
	</div>

	<div class="form-group parent-segment col-lg-6 {{ $errors->vehicleModelInfo->has('segment') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="segment">Segment</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="segment" name="segment" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleSegments as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['segment'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleModelInfo->has('segment'))
			<span class="help-block">{{ $errors->vehicleModelInfo->first('segment') }}</span>
		@endif
	</div>


</div>

<script type="text/javascript">
	const defaultVehModelValues = {!! json_encode($data) !!};
</script>