@php

	$vendorInfo = isset($vendorInfo) ? $vendorInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'name' => old('name') ? old('name') : (isset($vendorInfo->name) ? $vendorInfo->name : ''),
		'gst_no' => old('gst_no') ? old('gst_no') : (isset($vendorInfo->gst_no) ? $vendorInfo->gst_no : ''),
		'address1' => old('address1') ? old('address1') : (isset($vendorInfo->address1) ? $vendorInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($vendorInfo->address2) ? $vendorInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($vendorInfo->address3) ? $vendorInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($vendorInfo->pin_code) ? $vendorInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($vendorInfo->city) ? $vendorInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($vendorInfo->state) ? $vendorInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($vendorInfo->email) ? $vendorInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($vendorInfo->phone) ? $vendorInfo->phone : ''),
		'mobile_phone' => old('mobile_phone') ? old('mobile_phone') : (isset($vendorInfo->mobile_phone) ? $vendorInfo->mobile_phone : ''),
		'office_phone' => old('office_phone') ? old('office_phone') : (isset($vendorInfo->office_phone) ? $vendorInfo->office_phone : ''),
		'office_phone_ext' => old('office_phone_ext') ? old('office_phone_ext') : (isset($vendorInfo->office_phone_ext) ? $vendorInfo->office_phone_ext : ''),
		'phone_alternate' => old('phone_alternate') ? old('phone_alternate') : (isset($vendorInfo->phone_alternate) ? $vendorInfo->phone_alternate : ''),
		'vehicleType' => old('vehicleType') ? old('vehicleType') : (isset($vendorInfo->vehicleType) ? $vendorInfo->vehicleType : ''),
		'vehicleModel' => old('vehicleModel') ? old('vehicleModel') : (isset($vendorInfo->vehicleModel) ? $vendorInfo->vehicleModel : ''),
		'regnNo' => old('regnNo') ? old('regnNo') : (isset($vendorInfo->regn_no) ? $vendorInfo->regn_no : ''),
		'insuranceDate' => old('insuranceDate') ? old('insuranceDate') : (isset($vendorInfo->insuranceDate) ? $vendorInfo->insuranceDate : ''),
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">
	@if(isset($vendorInfo->vendor_id))
		<input type="hidden" id="vendorId" name="vendorId" value="{{ base64_encode($vendorInfo->vendor_id) }}">
	@endif
	@if(isset($vendorInfo->vendor_vehicle_id))
		<input type="hidden" id="vendorVehicleId" name="vendorVehicleId" value="{{ base64_encode($vendorInfo->vendor_vehicle_id) }}">
	@endif

</div>

<div class="row">

	<div class="form-group parent-name col-lg-6 {{ $errors->vendorInfo->has('name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="name">Name</label>
		<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('name'))
			<span class="help-block">{{ $errors->vendorInfo->first('name') }}</span>
		@endif
	</div>

	<div class="form-group parent-gst_no col-lg-6 {{ $errors->vendorInfo->has('gst_no') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="gst_no">GST Number</label>
		<input type="text" class="form-control col-lg-7" id="gst_no" name="gst_no" value="{{ $data['gst_no'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('gst_no'))
			<span class="help-block">{{ $errors->vendorInfo->first('gst_no') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address1 col-lg-6 {{ $errors->vendorInfo->has('address1') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('address1'))
			<span class="help-block">{{ $errors->vendorInfo->first('address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-address2 col-lg-6 {{ $errors->vendorInfo->has('address2') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('address2'))
			<span class="help-block">{{ $errors->vendorInfo->first('address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address3 col-lg-6 {{ $errors->vendorInfo->has('address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('address3'))
			<span class="help-block">{{ $errors->vendorInfo->first('address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->vendorInfo->has('pin_code') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="pin_code">PIN Code</label>
		<input type="text" class="form-control col-lg-7" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('pin_code'))
			<span class="help-block">{{ $errors->vendorInfo->first('pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-city col-lg-6 {{ $errors->vendorInfo->has('city') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="city">City</label>
		<input type="text" class="form-control col-lg-7 city-autocomplete" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('city'))
			<span class="help-block">{{ $errors->vendorInfo->first('city') }}</span>
		@endif
	</div>

	<div class="form-group parent-state col-lg-6 {{ $errors->vendorInfo->has('state') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->vendorInfo->has('state'))
			<span class="help-block">{{ $errors->vendorInfo->first('state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->vendorInfo->has('email') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('email'))
			<span class="help-block">{{ $errors->vendorInfo->first('email') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone col-lg-6 {{ $errors->vendorInfo->has('phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="phone">Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('phone'))
			<span class="help-block">{{ $errors->vendorInfo->first('phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-mobile_phone col-lg-6 {{ $errors->vendorInfo->has('mobile_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="mobile_phone">Mobile Number</label>
		<input type="text" class="form-control col-lg-7" id="mobile_phone" name="mobile_phone" value="{{ $data['mobile_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('mobile_phone'))
			<span class="help-block">{{ $errors->vendorInfo->first('mobile_phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-office_phone col-lg-6 {{ $errors->vendorInfo->has('office_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone">Office Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="office_phone" name="office_phone" value="{{ $data['office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('office_phone'))
			<span class="help-block">{{ $errors->vendorInfo->first('office_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-office_phone_ext col-lg-6 {{ $errors->vendorInfo->has('office_phone_ext') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone_ext">Office Phone Extension Number</label>
		<input type="text" class="form-control col-lg-7" id="office_phone_ext" name="office_phone_ext" value="{{ $data['office_phone_ext'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('office_phone_ext'))
			<span class="help-block">{{ $errors->vendorInfo->first('office_phone_ext') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone_alternate col-lg-6 {{ $errors->vendorInfo->has('phone_alternate') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="phone_alternate">Alternate Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="phone_alternate" name="phone_alternate" value="{{ $data['phone_alternate'] }}" {{ $disabledAttribute }} />
		@if($errors->vendorInfo->has('phone_alternate'))
			<span class="help-block">{{ $errors->vendorInfo->first('phone_alternate') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	const VENDOR_DRIVER_CUM_OWNER = {!! VENDOR_DRIVER_CUM_OWNER !!};
</script>