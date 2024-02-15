@php

	$nonBillTripInfo 	= isset($nonBillTripInfo) ? $nonBillTripInfo : null;
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	
	$data = 
	[
		'vehicleId' => old('vehicleId') ? old('vehicleId') : ( isset($nonBillTripInfo[0]->vehicleId) ? $nonBillTripInfo[0]->vehicleId : "") ,
		'driverId' => old('driverId') ? old('driverId') : (isset($nonBillTripInfo[0]->driverId) ? $nonBillTripInfo[0]->driverId : ''),
		'vehiclePurpose' => old('vehiclePurpose') ? old('vehiclePurpose') : (isset($nonBillTripInfo[0]->vehiclePurpose) ? $nonBillTripInfo[0]->vehiclePurpose : ''),
		'startDate' => old('startDate') ? old('startDate') : (isset($nonBillTripInfo[0]->startDate) ? $nonBillTripInfo[0]->startDate : ''),
		'endDate' => old('endDate') ? old('endDate') : (isset($nonBillTripInfo[0]->endDate) ? $nonBillTripInfo[0]->endDate : ''),
		'startTime' => old('startTime') ? old('startTime') : (isset($nonBillTripInfo[0]->startTime) ? $nonBillTripInfo[0]->startTime : ''),
		'endTime' => old('endTime') ? old('endTime') : (isset($nonBillTripInfo[0]->endTime) ? $nonBillTripInfo[0]->endTime : ''),
		'opKms' => old('opKms') ? old('opKms') : (isset($nonBillTripInfo[0]->opKms) ? $nonBillTripInfo[0]->opKms : ''),
		'clKms' => old('clKms') ? old('clKms') : (isset($nonBillTripInfo[0]->clKms) ? $nonBillTripInfo[0]->clKms : ''),
		'comments' => old('comments') ? old('comments') : (isset($nonBillTripInfo[0]->comments) ? $nonBillTripInfo[0]->comments : ''),
	];


@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($nonBillTripInfo[0]->nonbill_trip_id))
		<input type="hidden" name="nonBillTripId" value="{{ $nonBillTripInfo[0]->nonbill_trip_id }}">
	@endif

	<div class="form-group parent-vehicleId col-lg-6 {{ $errors->nonBillTripInfo->has('vehicleId') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleId">Vehicle No</label>
		<select class="form-control col-lg-7 selectpicker" id="vehicleId" name="vehicleId"  {{ $disabledAttribute }}>
			<option data-run-kms="">--Select Vehicle No--</option>
			@foreach($vehicles as $vehId => $vehName)
				@var $idArry	=	explode("_",$vehId);
				@var $newId		=	$idArry[0];
				@var $runKms	=	$idArry[1];
				<option  data-run-kms="{{$runKms}}" value="{{ $newId }}" {{ $newId == $data['vehicleId'] ? 'selected' : '' }} >{{ $vehName }}</option>
			@endforeach
		</select>
		@if($errors->nonBillTripInfo->has('vehicleId'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('vehicleId') }}</span>
		@endif
	</div>

	<div class="form-group parent-driverId col-lg-6 {{ $errors->nonBillTripInfo->has('driverId') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="driverId">Driver</label>
		<select class="form-control col-lg-7 selectpicker" id="driverId" name="driverId" {{ $disabledAttribute }}>
			<option>--Select Driver--</option>
			@if(isset($drivers))
				@foreach($drivers as $driverId => $driverName)
					<option value="{{ $driverId }}" {{ $driverId == $data['driverId'] ? "selected" : "" }}>{{ $driverName }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->nonBillTripInfo->has('driverId'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('driverId') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-startDate col-lg-6 {{ $errors->nonBillTripInfo->has('startDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="startDate">Start Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="startDate" name="startDate" value="{{ $data['startDate'] }}" {{ $disabledAttribute }}>
		@if($errors->nonBillTripInfo->has('startDate'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('startDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-startTime col-lg-6 {{ $errors->nonBillTripInfo->has('startTime') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="reportingTime">Time</label>
		<input type="text" class="form-control col-lg-7 time-picker" id="startTime" name="startTime" value="{{ $data['startTime'] }}" {{ $disabledAttribute }}>
		@if($errors->nonBillTripInfo->has('startTime'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('startTime') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-endDate col-lg-6 {{ $errors->nonBillTripInfo->has('travelDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="endDate">End Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="endDate" name="endDate" value="{{ $data['endDate'] }}" {{ $disabledAttribute }}>
		@if($errors->nonBillTripInfo->has('endDate'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('endDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-endTime col-lg-6 {{ $errors->nonBillTripInfo->has('endTime') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="endTime">Time</label>
		<input type="text" class="form-control col-lg-7 time-picker" id="endTime" name="endTime" value="{{ $data['endTime'] }}" {{ $disabledAttribute }}>
		@if($errors->nonBillTripInfo->has('endTime'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('endTime') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-opKms col-lg-6 {{ $errors->nonBillTripInfo->has('opKms') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="opKms">Open Kms</label>
		<div class="input-group col-lg-7">
			<input 	type="text" class="form-control number lakhs-format" 
					id="opKms" 
					name="opKms" 
					value="{{ $data['opKms'] }}" {{ $disabledAttribute }}
					readonly>
			@if($is_kmEditable)
				@if(!$disableEditing)
					<div class="input-group-append">
						<a class="input-group-btn" id="btnAllowEditStartKm" title="Edit">
							<i class="fas fa-pencil-alt"></i>
						</a>
					</div> 
				@endif
			@endif
		@if($errors->nonBillTripInfo->has('opKms'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('opKms') }}</span>
		@endif
	</div>
</div>
	<div class="form-group parent-clKms col-lg-6 {{ $errors->nonBillTripInfo->has('clKms') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="clKms">Close Kms</label>
		<input type="text" class="form-control col-lg-7" id="clKms" name="clKms" value="{{ $data['clKms'] }}" {{ $disabledAttribute }}>
		@if($errors->nonBillTripInfo->has('clKms'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('clKms') }}</span>
		@endif
	</div>

</div>
<div class="row">
	<!--
	<div class="form-group parent-vehiclePurpose col-lg-6 {{ $errors->nonBillTripInfo->has('vehiclePurpose') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehiclePurpose">Purpose</label>

		<select class="form-control col-lg-7 selectpicker" id="vehiclePurpose" name="vehiclePurpose" {{ $disabledAttribute }}>
			<option>--Select Status--</option>
			@if(isset($states))
				@foreach($states as $statusId => $statusName)
					<option value="{{ $statusId }}" {{ $statusId == $data['vehiclePurpose'] ? "selected" : "" }}>{{ $statusName }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->nonBillTripInfo->has('vehiclePurpose'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('vehiclePurpose') }}</span>
		@endif

		<select class="form-control col-lg-7 selectpicker" id="vehiclePurpose" name="vehiclePurpose" {{ $disabledAttribute }}>
			<option>--Select Purpose--</option>
			@if(isset($purposes))
				@foreach($purposes as $purposeId => $purposeName)
					<option value="{{ $purposeId }}" {{ $purposeId == $data['vehiclePurpose'] ? "selected" : "" }}>{{ $purposeName }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->nonBillTripInfo->has('vehiclePurpose'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('vehiclePurpose') }}</span>
		@endif

	</div>-->
	<div class="form-group parent-comments col-lg-6 {{ $errors->nonBillTripInfo->has('comments') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="comments">Comments</label>
		<textarea class="form-control col-lg-7" id="comments" name="comments" rows="7" {{ $disabledAttribute }}>{{ $data['comments'] }}</textarea>
		@if($errors->nonBillTripInfo->has('comments'))
			<span class="help-block">{{ $errors->nonBillTripInfo->first('comments') }}</span>
		@endif
	</div>

</div>

<script>
	$(document).on('click', '#btnAllowEditStartKm', function(e){
	e.preventDefault();
	var conf = confirm(START_KM_EDIT_CONF_MSG);

	if(conf){
		$('#opKms').removeAttr('readonly');
		$(this).closest('.input-group-append').hide();
	}
});
</script>