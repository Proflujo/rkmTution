@php

	$vehMaintParamInfo = isset($vehMaintParamInfo) ? $vehMaintParamInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'name' => old('name') ? old('name') : ( isset($vehMaintParamInfo->name) ? $vehMaintParamInfo->name : (isset($defaultValues['name']) ? $defaultValues['name'] : '') ),
		'description' => old('description') ? old('description') : ( isset($vehMaintParamInfo->description) ? $vehMaintParamInfo->description : (isset($defaultValues['description']) ? $defaultValues['description'] : '') ),
		'maintKm' => old('maintKm') ? old('maintKm') : ( isset($vehMaintParamInfo->maintKm) ? $vehMaintParamInfo->maintKm : (isset($defaultValues['maintKm']) ? $defaultValues['maintKm'] : '') ),
		'maintTimePeriod' => old('maintTimePeriod') ? old('maintTimePeriod') : ( isset($vehMaintParamInfo->maintTimePeriod) ? $vehMaintParamInfo->maintTimePeriod : (isset($defaultValues['maintTimePeriod']) ? $defaultValues['maintTimePeriod'] : '') ),
		'maintTimeUnit' => old('maintTimeUnit') ? old('maintTimeUnit') : ( isset($vehMaintParamInfo->maintTimeUnit) ? $vehMaintParamInfo->maintTimeUnit : (isset($defaultValues['maintTimeUnit']) ? $defaultValues['maintTimeUnit'] : '') ),
		'remKm' => old('remKm') ? old('remKm') : ( isset($vehMaintParamInfo->remKm) ? $vehMaintParamInfo->remKm : (isset($defaultValues['remKm']) ? $defaultValues['remKm'] : '') ),
		'remTimePeriod' => old('remTimePeriod') ? old('remTimePeriod') : ( isset($vehMaintParamInfo->remTimePeriod) ? $vehMaintParamInfo->remTimePeriod : (isset($defaultValues['remTimePeriod']) ? $defaultValues['remTimePeriod'] : '') ),
		'remTimeUnit' => old('remTimeUnit') ? old('remTimeUnit') : ( isset($vehMaintParamInfo->remTimeUnit) ? $vehMaintParamInfo->remTimeUnit : (isset($defaultValues['remTimeUnit']) ? $defaultValues['remTimeUnit'] : '') ),
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<style type="text/css">
	table
	{
		table-layout: fixed;
	}
</style>

<div class="row">

	@if(isset($vehMaintParamInfo->parameter_id))
		<input type="hidden" name="paramId" value="{{ base64_encode($vehMaintParamInfo->parameter_id) }}">
	@endif

	<div class="form-group parent-name col-lg-6 required-field">
		<div class="row {{ $errors->vehMaintParamInfo->has('name') ? 'has-error' : '' }}">
			<label class="col-lg-5" for="name">Name</label>
			<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }}>
			@if($errors->vehMaintParamInfo->has('name'))
				<span class="help-block">{{ $errors->vehMaintParamInfo->first('name') }}</span>
			@endif
		</div>

		<div class="row">
			<fieldset class="fieldset-group col-lg-12">
				<legend>Milestone <span class="text-danger">*</span></legend>

				<div class="form-group">

					<div class="row">
						<div class="col-lg-2 p-0"></div>
						<div class="col-lg-5"></div>
						<div class="col-lg-5 text-center">Reminder Before</div>
					</div>

					<div class="row form-group margin-h-0">
						<div class="col-lg-2 p-0">After Every</div>
						<div class="col-lg-5 {{ $errors->vehMaintParamInfo->has('maintKm') ? 'has-error' : '' }}">
							<input type="text" class="form-control col-lg-10 d-inline-block lakhs-format" id="maintKm" name="maintKm" value="{{ $data['maintKm'] }}" {{ $disabledAttribute }}>
							<span class="ml-1"> Km</span>
							@if($errors->vehMaintParamInfo->has('maintKm'))
								<span class="help-block">{{ $errors->vehMaintParamInfo->first('maintKm') }}</span>
							@endif
						</div>
						<div class="col-lg-5 {{ $errors->vehMaintParamInfo->has('remKm') ? 'has-error' : '' }}">
							<input type="text" class="form-control col-lg-10 d-inline-block lakhs-format" id="remKm" name="remKm" value="{{ $data['remKm'] }}" {{ $disabledAttribute }}>
							<span class="ml-1"> Km</span>
							@if($errors->vehMaintParamInfo->has('remKm'))
								<span class="help-block">{{ $errors->vehMaintParamInfo->first('remKm') }}</span>
							@endif
						</div>
					</div>

					<div class="row form-group margin-h-0">
						<div class="col-lg-2 p-0">Time Period</div>
						<div class="col-lg-5 {{ $errors->vehMaintParamInfo->has('maintTimePeriod') || $errors->vehMaintParamInfo->has('maintTimeUnit') ? 'has-error' : '' }}">
							<div class="form-group col-lg-6 d-inline-block">
								<input type="text" class="form-control col-lg-12 lakhs-format" id="maintTimePeriod" name="maintTimePeriod" value="{{ $data['maintTimePeriod'] }}" {{ $disabledAttribute }}>
								@if($errors->vehMaintParamInfo->has('maintTimePeriod'))
									<span class="help-block">{{ $errors->vehMaintParamInfo->first('maintTimePeriod') }}</span>
								@endif
							</div>
							<div class="form-group col-lg-5 d-inline-block ml-1">
								<select class="form-control col-lg-12 selectpicker" id="maintTimeUnit" name="maintTimeUnit" {{ $disabledAttribute }}>
									@foreach($timeUnitList as $id => $name)
										<option value="{{ $id }}" {{ $id == $data['maintTimeUnit'] ? "selected" : "" }}>{{ $name }}</option>
									@endforeach
								</select>
								@if($errors->vehMaintParamInfo->has('maintTimeUnit'))
									<span class="help-block">{{ $errors->vehMaintParamInfo->first('maintTimeUnit') }}</span>
								@endif
							</div>
						</div>
						<div class="col-lg-5 {{ $errors->vehMaintParamInfo->has('remTimePeriod') || $errors->vehMaintParamInfo->has('remTimeUnit') ? 'has-error' : '' }}">
							<div class="form-group col-lg-6 d-inline-block">
								<input type="text" class="form-control col-lg-12 lakhs-format" id="remTimePeriod" name="remTimePeriod" value="{{ $data['remTimePeriod'] }}" {{ $disabledAttribute }}>
								@if($errors->vehMaintParamInfo->has('remTimePeriod'))
									<span class="help-block">{{ $errors->vehMaintParamInfo->first('remTimePeriod') }}</span>
								@endif
							</div>
							<div class="form-group col-lg-5 d-inline-block ml-1">
								<select class="form-control col-lg-12 selectpicker" id="remTimeUnit" name="remTimeUnit" {{ $disabledAttribute }}>
									@foreach($timeUnitList as $id => $name)
										<option value="{{ $id }}" {{ $id == $data['remTimeUnit'] ? "selected" : "" }}>{{ $name }}</option>
									@endforeach
								</select>
								@if($errors->vehMaintParamInfo->has('remTimeUnit'))
									<span class="help-block">{{ $errors->vehMaintParamInfo->first('remTimeUnit') }}</span>
								@endif
							</div>
						</div>
					</div>

				</div>
			</fieldset>
		</div>
	</div>

	<div class="form-group parent-description col-lg-6 {{ $errors->vehMaintParamInfo->has('description') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="description">Description</label>
		<textarea class="form-control col-lg-7" id="description" name="description" rows="7" {{ $disabledAttribute }}>{{ $data['description'] }}</textarea>
		@if($errors->vehMaintParamInfo->has('description'))
			<span class="help-block">{{ $errors->vehMaintParamInfo->first('description') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<!--  -->

</div>

<script type="text/javascript">
	var defaultVehMaintParamInfoValues = {!! json_encode($data) !!};
</script>