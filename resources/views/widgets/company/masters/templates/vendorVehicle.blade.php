<fieldset id="venVehFieldset">
<div class="row">
		<input type="hidden" id="modalVendorVehicleId" name="modalVendorVehicleId" value="">
	<div class="form-group parent-branch col-lg-6 required-field {{ $errors->vendorInfo->has('vehicleType') ? 'has-error' : '' }}">
		<div class="form-group">
			<label class="col-lg-5" for="vehicleType">Vehicle Type</label>
			<select class="form-control col-lg-7 selectpicker required" 
					data-placeholder="" 
					id="vehicleType" name="vehicleType">
				<option></option>
				@foreach($vehicleTypes as $id => $name)
					<option value="{{ $id }}">{{ $name }}</option>
				@endforeach
			</select>
			@if($errors->vendorInfo->has('vehicleType'))
			<span class="help-block">{{ $errors->vendorInfo->first('vehicleType') }}</span>
		@endif
		</div>
	</div>
	<div class="form-group parent-vehicleModel col-lg-6 required-field {{ $errors->vendorInfo->has('vehicleModel') ? 'has-error' : '' }}" >
		<label class="col-lg-5" for="vehicleModel">Vehicle Model</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleModel" name="vehicleModel">
			<option></option>
			@foreach($vehicleModels as $id => $name)
				<option value="{{ $id }}">{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vendorInfo->has('vehicleModel'))
			<span class="help-block">{{ $errors->vendorInfo->first('vehicleModel') }}</span>
		@endif
	</div>

</div>

<div class="row">
	<div class="form-group parent-regnNo col-lg-6 required-field {{ $errors->vendorInfo->has('regnNo') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="regnNo">Registration No</label>
		<input type="text" class="form-control col-lg-7 required" id="regnNo" name="regnNo" value="">
		@if($errors->vendorInfo->has('regnNo'))
			<span class="help-block">{{ $errors->vendorInfo->first('regnNo') }}</span>
		@endif
	</div>
	<div class="form-group parent-insuranceDate col-lg-6">
		<label class="col-lg-5" for="insuranceDate">Insurance Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="insuranceDate" name="insuranceDate" value="" data-max-date="{{ OTSHelper::Date('+1 day') }}"  autocomplete="off">
	</div>

</div>

<div class="row">
	<div class="form-group parent-kmsRun col-lg-6 required-field {{ $errors->vendorInfo->has('kmsRun') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="kmsRun">Kms Run</label>
		<input type="text" class="form-control col-lg-7 required lakhs-format" id="kmsRun" name="kmsRun" value="">
		@if($errors->vendorInfo->has('kmsRun'))
			<span class="help-block">{{ $errors->vendorInfo->first('kmsRun') }}</span>
		@endif
	</div>
	<div class="form-group parent-insuranceDate col-lg-6">
		<label class="col-lg-5" for="insuranceDate">Insurance Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="insuranceDate" name="insuranceDate" value="" data-max-date="{{ OTSHelper::Date('+1 day') }}"  autocomplete="off">
	</div>

</div>

<div class="row">
	<div class="form-group parent-monthlyPkg col-lg-6 {{ $errors->vendorInfo->has('monthlyPkg') ? 'has-error' : '' }}">
		<div class="custom-control custom-checkbox ml-3">
			<input type="checkbox" class="custom-control-input" id="monthlyPkg" name="monthlyPkg" value="yes" />
			<label class="custom-control-label" for="monthlyPkg">Monthly Package</label>
		</div>
		@if($errors->vendorInfo->has('monthlyPkg'))
			<span class="help-block">{{ $errors->vendorInfo->first('monthlyPkg') }}</span>
		@endif
	</div>
</div>
</fieldset>
