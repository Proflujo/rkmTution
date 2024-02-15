@php

	$vehMaintScheduleInfo = isset($vehMaintScheduleInfo) ? $vehMaintScheduleInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];
	$vehMaintScheduleId = isset($vehMaintScheduleInfo->vehMaintScheduleId) ? $vehMaintScheduleInfo->vehMaintScheduleId : false;
	$isParameterEditable = isset($isParameterEditable) ? $isParameterEditable : true;

	$data = 
	[
		'parameter' => old('parameter') ? old('parameter') : ( isset($vehMaintScheduleInfo->parameter) ? $vehMaintScheduleInfo->parameter : (isset($defaultValues['parameter']) ? $defaultValues['parameter'] : '') ),
		'vehicle' => old('vehicle') ? old('vehicle') : ( isset($vehMaintScheduleInfo->vehicle) ? $vehMaintScheduleInfo->vehicle : (isset($defaultValues['vehicle']) ? $defaultValues['vehicle'] : '') ),
		'serviceType' => old('serviceType') ? old('serviceType') : ( isset($vehMaintScheduleInfo->serviceType) ? $vehMaintScheduleInfo->serviceType : (isset($defaultValues['serviceType']) ? $defaultValues['serviceType'] : '') ),
		'alertKm' => old('alertKm') ? old('alertKm') : ( isset($vehMaintScheduleInfo->alertKm) ? $vehMaintScheduleInfo->alertKm : (isset($defaultValues['alertKm']) ? $defaultValues['alertKm'] : '') ),
		'alertTrigOn' => old('alertTrigOn') ? old('alertTrigOn') : ( isset($vehMaintScheduleInfo->alertTrigOn) ? $vehMaintScheduleInfo->alertTrigOn : (isset($defaultValues['alertTrigOn']) ? $defaultValues['alertTrigOn'] : '') ),
		'dueDate' => old('dueDate') ? old('dueDate') : ( isset($vehMaintScheduleInfo->dueDate) ? $vehMaintScheduleInfo->dueDate : (isset($defaultValues['dueDate']) ? $defaultValues['dueDate'] : '') ),
		'startDate' => old('startDate') ? old('startDate') : ( isset($vehMaintScheduleInfo->startDate) ? $vehMaintScheduleInfo->startDate : (isset($defaultValues['startDate']) ? $defaultValues['startDate'] : '') ),
		'endDate' => old('endDate') ? old('endDate') : ( isset($vehMaintScheduleInfo->endDate) ? $vehMaintScheduleInfo->endDate : (isset($defaultValues['endDate']) ? $defaultValues['endDate'] : '') ),
		'comments' => old('comments') ? old('comments') : ( isset($vehMaintScheduleInfo->comments) ? $vehMaintScheduleInfo->comments : (isset($defaultValues['comments']) ? $defaultValues['comments'] : '') ),
		'kmAtService' => old('kmAtService') ? old('kmAtService') : ( isset($vehMaintScheduleInfo->kmAtService) ? $vehMaintScheduleInfo->kmAtService : (isset($defaultValues['kmAtService']) ? $defaultValues['kmAtService'] : '') ),
		'kmAtServiceCompleted' => old('kmAtServiceCompleted') ? old('kmAtServiceCompleted') : ( isset($vehMaintScheduleInfo->kmAtServiceCompleted) ? $vehMaintScheduleInfo->kmAtServiceCompleted : (isset($defaultValues['kmAtServiceCompleted']) ? $defaultValues['kmAtServiceCompleted'] : '') ),
		'garage' => old('garage') ? old('garage') : ( isset($vehMaintScheduleInfo->garage) ? $vehMaintScheduleInfo->garage : (isset($defaultValues['garage']) ? $defaultValues['garage'] : '') ),
		'invNo' => old('invNo') ? old('invNo') : ( isset($vehMaintScheduleInfo->invNo) ? $vehMaintScheduleInfo->invNo : (isset($defaultValues['invNo']) ? $defaultValues['invNo'] : '') ),
		'amount' => old('amount') ? old('amount') : ( isset($vehMaintScheduleInfo->amount) ? $vehMaintScheduleInfo->amount : (isset($defaultValues['amount']) ? $defaultValues['amount'] : '') ),
		'refillUnits' => old('refillUnits') ? old('refillUnits') : ( isset($vehMaintScheduleInfo->refillUnits) ? $vehMaintScheduleInfo->refillUnits : (isset($defaultValues['refillUnits']) ? $defaultValues['refillUnits'] : '') ),
		'amountPaidOn' => old('amountPaidOn') ? old('amountPaidOn') : ( isset($vehMaintScheduleInfo->amountPaidOn) ? $vehMaintScheduleInfo->amountPaidOn : (isset($defaultValues['amountPaidOn']) ? $defaultValues['amountPaidOn'] : '') ),
		'serviceStatus' => old('serviceStatus') ? old('serviceStatus') : ( isset($vehMaintScheduleInfo->serviceStatus) ? $vehMaintScheduleInfo->serviceStatus : (isset($defaultValues['serviceStatus']) ? $defaultValues['serviceStatus'] : '') ),
	];

	$garageLabel 			=	"";
	$garageDisabledAttr 	=	$disabledAttribute;

	switch($data["serviceType"]){
		case CODELIST_VEH_SERVICE_TYPE_INSURANCE_DUE:
			$garageLabel 	=	"Insurer name";
		break;

		case CODELIST_VEH_SERVICE_TYPE_TIME_DUE:
		case CODELIST_VEH_SERVICE_TYPE_DISTANCE_DUE:
		case CODELIST_VEH_SERVICE_TYPE_ON_DEMAND:
			$garageLabel 	=	"Garage name";
		break;
	}

	if(!$garageDisabledAttr){
		switch($data["serviceType"]){
			case CODELIST_VEH_SERVICE_TYPE_OTHERS:
			case CODELIST_VEH_SERVICE_TYPE_FC_DUE:
			case CODELIST_VEH_SERVICE_TYPE_ROAD_TAX_DUE:
				$garageDisabledAttr =	'disabled="disabled"';
			break;
		}
	}

//echo "<pre>",print_r($errors),"</pre>";die;
@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

<input type="hidden" name="vehKmRunOrig" id="vehKmRunOrig" value="">
	@if($vehMaintScheduleId)
		<input type="hidden" name="vehMaintScheduleId" value="{{ base64_encode($vehMaintScheduleId) }}">
	@endif

	<div class="form-group parent-parameter col-lg-6 {{ $errors->vehMaintScheduleInfo->has('parameter') ? 'has-error' : '' }} required-field">
		@if($isParameterEditable)
			<label class="col-lg-5" for="parameter">Maintenance Parameter</label>
			<select class="form-control col-lg-7 selectpicker" id="parameter" name="parameter" {{ $disabledAttribute }}>
				@foreach($parameterList as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['parameter'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			</select>
		@else
			<label class="col-lg-5" for="txtParameter">Maintenance Parameter</label>
			<input type="text" class="form-control col-lg-7" id="txtParameter" name="txtParameter" value="{{ $parameterList[$data['parameter']] }}" {{ $disabledAttribute }} readonly="true">
			<input type="hidden" name="parameter" value="{{ $data['parameter'] }}">
		@endif
		@if($errors->vehMaintScheduleInfo->has('parameter'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('parameter') }}</span>
		@endif
	</div>

	<div class="form-group parent-serviceType col-lg-6 {{ $errors->vehMaintScheduleInfo->has('serviceType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="txtServiceType">Service Type</label>
		<input type="text" class="form-control col-lg-7" id="txtServiceType" name="txtServiceType" value="{{ $serviceTypeList[$data['serviceType']] }}" {{ $disabledAttribute }} readonly="true">
		<input type="hidden" name="serviceType" value="{{ $data['serviceType'] }}">
		@if($errors->vehMaintScheduleInfo->has('serviceType'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('serviceType') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-vehicle col-lg-6 {{ $errors->vehMaintScheduleInfo->has('vehicle') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicle">Vehicle</label>
		<select class="form-control col-lg-7 selectpicker" id="vehicle" name="vehicle" {{ $disabledAttribute }}>
			@foreach($vehicleList as $id => $name)
			<?php 
				$idArry	=	explode("_",$id);
				$newId	=	$idArry[0];
				$runKms	=	$idArry[1];
			?>
				<option value="{{ $newId }}"  data-run-kms="{{$runKms}}"  {{ $newId == $data['vehicle'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehMaintScheduleInfo->has('vehicle'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('vehicle') }}</span>
		@endif
	</div>

	<div class="form-group parent-vehicleModel col-lg-6">
		<label class="col-lg-5" for="vehicleModel">Vehicle Model</label>
		<input type="text" class="form-control col-lg-7" id="vehicleModel" name="vehicleModel" readonly="true" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('vehicleModel'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('vehicleModel') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-alertKm col-lg-6 {{ $errors->vehMaintScheduleInfo->has('alertKm') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="alertKm">Alert Given at (km)</label>
		<input type="text" class="form-control col-lg-7 number lakhs-format" id="alertKm" name="alertKm" value="{{ $data['alertKm'] }}" {{ !$vehMaintScheduleId || $data['serviceType'] == CODELIST_VEH_SERVICE_TYPE_ON_DEMAND ? '' : 'readonly="true"' }} {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('alertKm'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('alertKm') }}</span>
		@endif
	</div>

	<div class="form-group parent-alertTrigOn col-lg-6 {{ $errors->vehMaintScheduleInfo->has('alertTrigOn') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="alertTrigOn">Alert Triggered On</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="alertTrigOn" name="alertTrigOn" value="{{ $data['alertTrigOn'] }}" {{ $vehMaintScheduleId ? 'readonly="true"' : '' }} {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('alertTrigOn'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('alertTrigOn') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-dueDate col-lg-6 {{ $errors->vehMaintScheduleInfo->has('dueDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="dueDate">Service Due Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="dueDate" name="dueDate" value="{{ $data['dueDate'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('dueDate'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('dueDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-kmAtService col-lg-6 {{ $errors->vehMaintScheduleInfo->has('kmAtService') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="kmAtService">Service Start KM Reading</label>
		<div class="input-group col-lg-7">
			<input 	type="text" class="form-control number lakhs-format" 
					id="kmAtService" 
					name="kmAtService" 
					value="{{ $data['kmAtService'] }}" {{ $disabledAttribute }}
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
			@if($errors->vehMaintScheduleInfo->has('kmAtService'))
				<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('kmAtService') }}</span>
			@endif
		</div>
	</div>

	<div class="form-group parent-kmAtServiceCompleted col-lg-6 {{ $errors->vehMaintScheduleInfo->has('kmAtServiceCompleted') ? 'has-error' : '' }} required-field" style="display:none">
		<label class="col-lg-5" for="kmAtServiceCompleted">End KM</label>
		<input type="text" class="form-control col-lg-7 number lakhs-format" id="kmAtServiceCompleted" name="kmAtServiceCompleted" value="{{ $data['kmAtServiceCompleted'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('kmAtServiceCompleted'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('kmAtServiceCompleted') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-startDate col-lg-6 {{ $errors->vehMaintScheduleInfo->has('startDate') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="startDate">Service Start Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="startDate" name="startDate" value="{{ $data['startDate'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('startDate'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('startDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-endDate col-lg-6 {{ $errors->vehMaintScheduleInfo->has('endDate') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="endDate">Service End Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="endDate" name="endDate" value="{{ $data['endDate'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('endDate'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('endDate') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-garage col-lg-6 {{ $errors->vehMaintScheduleInfo->has('garage') ? 'has-error' : '' }} 
		{{ !$garageDisabledAttr ? 'required-field' : '' }}">
		<label class="col-lg-5" for="garage">{{ $garageLabel }}</label>
		<input type="text" class="form-control col-lg-7" id="garage" name="garage" value="{{ $data['garage'] }}" {{ $garageDisabledAttr }}>
		@if($errors->vehMaintScheduleInfo->has('garage'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('garage') }}</span>
		@endif
	</div>

	<div class="form-group parent-invNo col-lg-6 {{ $errors->vehMaintScheduleInfo->has('invNo') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="invNo">Receipt/Invoice No</label>
		<input type="text" class="form-control col-lg-7" id="invNo" name="invNo" value="{{ $data['invNo'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('invNo'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('invNo') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-refillUnits col-lg-6 {{ $errors->vehMaintScheduleInfo->has('refillUnits') ? 'has-error' : '' }} required-field" style="display:none">
		<label class="col-lg-5" for="refillUnits">No Of liters</label>
		<input type="text" class="form-control col-lg-7 number" id="refillUnits" name="refillUnits" value="{{ $data['refillUnits'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('refillUnits'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('refillUnits') }}</span>
		@endif
	</div>
	<div class="form-group parent-amount col-lg-6 {{ $errors->vehMaintScheduleInfo->has('amount') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="amount">Total Amount</label>
		<input type="text" class="form-control col-lg-7 number currency" id="amount" name="amount" value="{{ $data['amount'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('amount'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('amount') }}</span>
		@endif
	</div>

	<div class="form-group parent-amountPaidOn col-lg-6 {{ $errors->vehMaintScheduleInfo->has('amountPaidOn') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="amountPaidOn">Paid Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="amountPaidOn" name="amountPaidOn" value="{{ $data['amountPaidOn'] }}" {{ $disabledAttribute }}>
		@if($errors->vehMaintScheduleInfo->has('amountPaidOn'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('amountPaidOn') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-serviceStatus col-lg-6 {{ $errors->vehMaintScheduleInfo->has('serviceStatus') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="serviceStatus">Service Status</label>
		<select class="form-control col-lg-7 selectpicker" id="serviceStatus" name="serviceStatus" {{ $disabledAttribute }}>
			@foreach($serviceStatusList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['serviceStatus'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehMaintScheduleInfo->has('serviceStatus'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('serviceStatus') }}</span>
		@endif
	</div>

	<div class="form-group parent-comments col-lg-6 {{ $errors->vehMaintScheduleInfo->has('comments') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="comments">Comments</label>
		<textarea class="form-control col-lg-7" id="comments" name="comments" rows="7" {{ $disabledAttribute }}>{{ $data['comments'] }}</textarea>
		@if($errors->vehMaintScheduleInfo->has('comments'))
			<span class="help-block">{{ $errors->vehMaintScheduleInfo->first('comments') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	var defaultvehMaintScheduleInfoValues = {!! json_encode($data) !!};
</script>
