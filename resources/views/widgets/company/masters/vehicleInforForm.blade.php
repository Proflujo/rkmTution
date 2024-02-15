@php

	$vehicleInfo = isset($vehicleInfo) ? $vehicleInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'vehicleModel' => old('vehicleModel') ? old('vehicleModel') : (isset($vehicleInfo->vehicleModel) ? $vehicleInfo->vehicleModel : ''),
		'vendor' => old('vendor') ? old('vendor') : (isset($vehicleInfo->vendor) ? $vehicleInfo->vendor : ''),
		'vehicleLocation' => old('vehicleLocation') ? old('vehicleLocation') : (isset($vehicleInfo->vehicleLocation) ? $vehicleInfo->vehicleLocation : ''),
		'fuelType' => old('fuelType') ? old('fuelType') : (isset($vehicleInfo->fuelType) ? $vehicleInfo->fuelType : ''),
		'regnNo' => old('regnNo') ? old('regnNo') : (isset($vehicleInfo->regnNo) ? $vehicleInfo->regnNo : ''),
		'mfgDate' => old('mfgDate') ? old('mfgDate') : (isset($vehicleInfo->mfgDate) ? $vehicleInfo->mfgDate : ''),
		'regnDate' => old('regnDate') ? old('regnDate') : (isset($vehicleInfo->regnDate) ? $vehicleInfo->regnDate : ''),
		'insuranceDate' => old('insuranceDate') ? old('insuranceDate') : (isset($vehicleInfo->insuranceDate) ? $vehicleInfo->insuranceDate : ''),
		'insurer' => old('insurer') ? old('insurer') : (isset($vehicleInfo->insurer) ? $vehicleInfo->insurer : ''),
		'fcDate' => old('fcDate') ? old('fcDate') : (isset($vehicleInfo->fcDate) ? $vehicleInfo->fcDate : ''),
		'roadTaxDate' => old('roadTaxDate') ? old('roadTaxDate') : (isset($vehicleInfo->roadTaxDate) ? $vehicleInfo->roadTaxDate : ''),
		'roadTaxFreq' => old('roadTaxFreq') ? old('roadTaxFreq') : (isset($vehicleInfo->roadTaxFreq) ? $vehicleInfo->roadTaxFreq : ''),
		'permitDate' => old('permitDate') ? old('permitDate') : (isset($vehicleInfo->permitDate) ? $vehicleInfo->permitDate : ''),
		'vehRunningStatus' => old('vehRunningStatus') ? old('vehRunningStatus') : (isset($vehicleInfo->vehRunningStatus) ? $vehicleInfo->vehRunningStatus : ''),
		'vehicleStatus' => old('vehicleStatus') ? old('vehicleStatus') : (isset($vehicleInfo->vehicleStatus) ? $vehicleInfo->vehicleStatus : ''),
		'kmsRun' => old('kmsRun') ? old('kmsRun') : (isset($vehicleInfo->kmsRun) ? $vehicleInfo->kmsRun : ''),
		'branch' => old('branch') ? old('branch') : (isset($vehicleInfo->branch) ? $vehicleInfo->branch : (isset($defaultValues['branch']) ? $defaultValues['branch'] : '')),
		'isDedicated' => old('isDedicated') ? old('isDedicated') : (isset($vehicleInfo->isDedicated) ? $vehicleInfo->isDedicated : ''),
		'hCustomer' => old('hotelCustomer') ? old('hotelCustomer') : ((isset($vehicleInfo->fkcustomer_id) && !empty($vehicleInfo->fkcustomer_id))? $vehicleInfo->fkcustomer_id: ''),
		'monthlyPkg' => old('monthlyPkg') ? old('monthlyPkg') : (isset($vehicleInfo->monthlyPkg) ? $vehicleInfo->monthlyPkg : ''),
	];

	$edit  =  isset($vehicleInfo->vehicle_id) ? true : false; 
	$fixed =  old('vehRunningStatus') ? old('vehRunningStatus') : $edit ? 'disabled = "disabled"' : '';

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<style type="text/css">
	.row > .form-group > .row
	{
		margin: 0;
	}
</style>

<div class="row">

	@if(isset($vehicleInfo->vehicle_id))
		<input type="hidden" id="vehicleId" name="vehicleId" value="{{ base64_encode($vehicleInfo->vehicle_id) }}">
	@endif
	<div class="form-group parent-branch col-lg-6 required-field">
		<div class="form-group {{ $errors->vehicleInfo->has('branch') ? 'has-error' : '' }}">
			<label class="col-lg-5" for="branch">Branch</label>
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="branch" name="branch" {{ $disabledAttribute }}>
				<option></option>
				@foreach($branches as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['branch'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			</select>
			@if($errors->vehicleInfo->has('branch'))
				<span class="help-block">{{ $errors->vehicleInfo->first('branch') }}</span>
			@endif
		</div>
	</div>
	
	<div class="form-group parent-vehicleModel col-lg-6 {{ $errors->vehicleInfo->has('vehicleModel') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleModel">Vehicle Model</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleModel" name="vehicleModel" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleModels as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehicleModel'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('vehicleModel'))
			<span class="help-block">{{ $errors->vehicleInfo->first('vehicleModel') }}</span>
		@endif
	</div>

</div>

<div class="row">
	<div class="form-group parent-regnNo col-lg-6 {{ $errors->vehicleInfo->has('regnNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="regnNo">Registration No</label>
		<input type="text" class="form-control col-lg-7" id="regnNo" name="regnNo" value="{{ $data['regnNo'] }}" {{ $disabledAttribute }}>
		@if($errors->vehicleInfo->has('regnNo'))
			<span class="help-block">{{ $errors->vehicleInfo->first('regnNo') }}</span>
		@endif
	</div>

	<div class="form-group parent-regnDate col-lg-6 {{ $errors->vehicleInfo->has('regnDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="regnDate">Registration Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="regnDate" name="regnDate" value="{{ $data['regnDate'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }}>
		@if($errors->vehicleInfo->has('regnDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('regnDate') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group parent-insuranceDate col-lg-6 {{ $errors->vehicleInfo->has('insuranceDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="insuranceDate">Insurance Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="insuranceDate" name="insuranceDate" value="{{ $data['insuranceDate'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }} autocomplete="off">
		@if($errors->vehicleInfo->has('insuranceDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('insuranceDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-insurer col-lg-6 {{ $errors->vehicleInfo->has('insurer') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="insurer">Insurer</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="insurer" name="insurer" {{ $disabledAttribute }}>
			<option></option>
			@foreach($insurers as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['insurer'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('insurer'))
			<span class="help-block">{{ $errors->vehicleInfo->first('insurer') }}</span>
		@endif
	</div>
</div>

<div class="row">

	<div class="form-group parent-mfgDate col-lg-6 {{ $errors->vehicleInfo->has('mfgDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mfgDate">MFG Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="mfgDate" name="mfgDate" value="{{ $data['mfgDate'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }} autocomplete="off">
		@if($errors->vehicleInfo->has('mfgDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('mfgDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-fcDate col-lg-6 {{ $errors->vehicleInfo->has('fcDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="fcDate">FC Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="fcDate" name="fcDate" value="{{ $data['fcDate'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }} autocomplete="off">
		@if($errors->vehicleInfo->has('fcDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('fcDate') }}</span>
		@endif
	</div>
</div>

<div class="row">

	<div class="form-group parent-roadTaxDate col-lg-6 {{ $errors->vehicleInfo->has('roadTaxDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="roadTaxDate">Road Tax Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="roadTaxDate" name="roadTaxDate" value="{{ $data['roadTaxDate'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }}>
		@if($errors->vehicleInfo->has('roadTaxDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('roadTaxDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-permitDate col-lg-6 {{ $errors->vehicleInfo->has('permitDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="permitDate">Permit Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="permitDate" name="permitDate" value="{{ $data['permitDate'] }}" {{ $disabledAttribute }} autocomplete="off">
		@if($errors->vehicleInfo->has('permitDate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('permitDate') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-vehRunningStatus col-lg-6 {{ $errors->vehicleInfo->has('vehRunningStatus') ? 'has-error' : '' }} ">
		<label class="col-lg-5" for="vehRunningStatus">Vehicle Running Status</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder=""id="vehRunningStatus" name="vehRunningStatus"{{ $disabledAttribute }}>
			<option></option>
			@foreach($vehRunningStatusList as $id => $name)
				<option value="{{ $id }}"  {{ $id == $data['vehRunningStatus'] ? "selected" : "" }} {{ $fixed }} >{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('vehRunningStatus'))
			<span class="help-block">{{ $errors->vehicleInfo->first('vehRunningStatus') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-roadTaxFreq col-lg-6 {{ $errors->vehicleInfo->has('roadTaxFreq') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="roadTaxFreq">Road Tax Payment</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="roadTaxFreq" name="roadTaxFreq" {{ $disabledAttribute }}>
			<option></option>
			@foreach($roadTaxFreqList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['roadTaxFreq'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('roadTaxFreq'))
			<span class="help-block">{{ $errors->vehicleInfo->first('roadTaxFreq') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-kmsRun col-lg-6 {{ $errors->vehicleInfo->has('kmsRun') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="kmsRun">Kms Run</label>
		<div class="input-group col-lg-7">
			<input type="text" class="form-control lakhs-format" id="kmsRun" name="kmsRun" value="{{ $data['kmsRun'] }}" {{ $disabledAttribute }} 
				{{ isset( $vehicleInfo->vehicle_id )?'readonly="true"':''}} >
			@if($is_kmEditable) 
				@if(isset($vehicleInfo->vehicle_id)) 
					<div class="input-group-append">
						<a class="input-group-btn" id="btnAllowEditKmsRun" title="Edit">
							<i class="fas fa-pencil-alt"></i>
						</a>
					</div>
				@endif
			@endif
		</div>
		@if($errors->vehicleInfo->has('kmsRun'))
			<span class="help-block">{{ $errors->vehicleInfo->first('kmsRun') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-vehicleStatus col-lg-6 {{ $errors->vehicleInfo->has('vehicleStatus') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleStatus">Vehicle Status</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleStatus" name="vehicleStatus" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehStatusList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehicleStatus'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('vehicleStatus'))
			<span class="help-block">{{ $errors->vehicleInfo->first('vehicleStatus') }}</span>
		@endif
	</div>

</div>

<div class="row">
	<div class="form-group parent-vehicleLocation col-lg-6 {{ $errors->vehicleInfo->has('vehicleLocation') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleLocation">Vehicle Location</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleLocation" name="vehicleLocation" {{ $disabledAttribute }}>
			@foreach($vehLocations as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehicleLocation'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('vehicleLocation'))
			<span class="help-block">{{ $errors->vehicleInfo->first('vehicleLocation') }}</span>
		@endif
	</div>

	<div class="form-group parent-fuelType col-lg-6 {{ $errors->vehicleInfo->has('fuelType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="fuelType">Fuel Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="fuelType" name="fuelType" {{ $disabledAttribute }}>
			@foreach($fuelTypeList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['fuelType'] ? "selected" : "" }} >{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('fuelType'))
			<span class="help-block">{{ $errors->vehicleInfo->first('fuelType') }}</span>
		@endif
	</div>

</div>

<div class="row">
	<div class="form-group col-lg-6 {{ $errors->vehicleInfo->has('isDedicated') ? 'has-error' : '' }}">
		<div class="custom-control custom-checkbox ml-3">
			<input type="checkbox" class="custom-control-input" id="isDedicated" name="isDedicated" value="yes" {{ $data['isDedicated'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
			<label class="custom-control-label" for="isDedicated">Dedicated Vehicle</label>
		</div>
		@if($errors->vehicleInfo->has('isDedicated'))
			<span class="help-block">{{ $errors->vehicleInfo->first('isDedicated') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group parent-hotelCustomer col-lg-6 required-field {{ $errors->vehicleInfo->has('hotelCustomer') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="hotelCustomer">Customer</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="hotelCustomer" name="hotelCustomer" {{ $disabledAttribute }}>
			<option></option>
			@foreach($hCustomers as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['hCustomer'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('hotelCustomer'))
			<span class="help-block">{{ $errors->vehicleInfo->first('hotelCustomer') }}</span>
		@endif
	</div>

	<div class="form-group parent-monthlyPkg col-lg-6 {{ $errors->vehicleInfo->has('monthlyPkg') ? 'has-error' : '' }}">
		<div class="custom-control custom-checkbox ml-3">
			<input type="checkbox" class="custom-control-input" id="monthlyPkg" name="monthlyPkg" value="yes" {{ $data['monthlyPkg'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
			<label class="custom-control-label" for="monthlyPkg">Monthly Package</label>
		</div>
		@if($errors->vehicleInfo->has('monthlyPkg'))
			<span class="help-block">{{ $errors->vehicleInfo->first('monthlyPkg') }}</span>
		@endif
	</div>
</div>

<script type="text/javascript">
	const KMS_RUN_EDIT_CONF_MSG = "Total Kms run should not be changed for existing vehicles. The change will be logged for audit purposes. Do you want to continue?";
	const KMS_RUN_ADD_CONF_MSG = "Once saved KM reading of a vehicle cannot be changed. Do you want to save the Vehice details?";
	const defaultVehicleData = {!! json_encode($data) !!};
</script>
