@php

	$vehicleInfo = isset($vehicleInfo) ? $vehicleInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'address1' => old('address1') ? old('address1') : (isset($vehicleInfo->address1) ? $vehicleInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($vehicleInfo->address2) ? $vehicleInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($vehicleInfo->address3) ? $vehicleInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($vehicleInfo->pin_code) ? $vehicleInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($vehicleInfo->city) ? $vehicleInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($vehicleInfo->state) ? $vehicleInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($vehicleInfo->email) ? $vehicleInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($vehicleInfo->phone) ? $vehicleInfo->phone : ''),
		'mobile_phone' => old('mobile_phone') ? old('mobile_phone') : (isset($vehicleInfo->mobile_phone) ? $vehicleInfo->mobile_phone : ''),
		'office_phone' => old('office_phone') ? old('office_phone') : (isset($vehicleInfo->office_phone) ? $vehicleInfo->office_phone : ''),
		'office_phone_ext' => old('office_phone_ext') ? old('office_phone_ext') : (isset($vehicleInfo->office_phone_ext) ? $vehicleInfo->office_phone_ext : ''),
		'phone_alternate' => old('phone_alternate') ? old('phone_alternate') : (isset($vehicleInfo->phone_alternate) ? $vehicleInfo->phone_alternate : '')
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	<div class="form-group parent-address1 col-lg-6 {{ $errors->vehicleInfo->has('address1') ? 'has-error' : '' }}">
		<label for="address1">Address 1</label>
		<input type="text" class="form-control" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('address1'))
			<span class="help-block">{{ $errors->vehicleInfo->first('address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-address2 col-lg-6 {{ $errors->vehicleInfo->has('address2') ? 'has-error' : '' }}">
		<label for="address2">Address 2</label>
		<input type="text" class="form-control" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('address2'))
			<span class="help-block">{{ $errors->vehicleInfo->first('address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address3 col-lg-6 {{ $errors->vehicleInfo->has('address3') ? 'has-error' : '' }}">
		<label for="address3">Address 3</label>
		<input type="text" class="form-control" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('address3'))
			<span class="help-block">{{ $errors->vehicleInfo->first('address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->vehicleInfo->has('pin_code') ? 'has-error' : '' }}">
		<label for="pin_code">PIN Code</label>
		<input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('pin_code'))
			<span class="help-block">{{ $errors->vehicleInfo->first('pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-city col-lg-6 {{ $errors->vehicleInfo->has('city') ? 'has-error' : '' }}">
		<label for="city">City</label>
		<input type="text" class="form-control" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('city'))
			<span class="help-block">{{ $errors->vehicleInfo->first('city') }}</span>
		@endif
	</div>

	<div class="form-group parent-state col-lg-6 {{ $errors->vehicleInfo->has('state') ? 'has-error' : '' }}">
		<label for="state">State</label>
		<select class="form-control selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->vehicleInfo->has('state'))
			<span class="help-block">{{ $errors->vehicleInfo->first('state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->vehicleInfo->has('email') ? 'has-error' : '' }}">
		<label for="email">Email Address</label>
		<input type="email" class="form-control" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('email'))
			<span class="help-block">{{ $errors->vehicleInfo->first('email') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone col-lg-6 {{ $errors->vehicleInfo->has('phone') ? 'has-error' : '' }}">
		<label for="phone">Phone Number</label>
		<input type="text" class="form-control" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('phone'))
			<span class="help-block">{{ $errors->vehicleInfo->first('phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-mobile_phone col-lg-6 {{ $errors->vehicleInfo->has('mobile_phone') ? 'has-error' : '' }}">
		<label for="mobile_phone">Mobile Number</label>
		<input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{ $data['mobile_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('mobile_phone'))
			<span class="help-block">{{ $errors->vehicleInfo->first('mobile_phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-office_phone col-lg-6 {{ $errors->vehicleInfo->has('office_phone') ? 'has-error' : '' }}">
		<label for="office_phone">Office Phone Number</label>
		<input type="text" class="form-control" id="office_phone" name="office_phone" value="{{ $data['office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('office_phone'))
			<span class="help-block">{{ $errors->vehicleInfo->first('office_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-office_phone_ext col-lg-6 {{ $errors->vehicleInfo->has('office_phone_ext') ? 'has-error' : '' }}">
		<label for="office_phone_ext">Office Phone Extension Number</label>
		<input type="text" class="form-control" id="office_phone_ext" name="office_phone_ext" value="{{ $data['office_phone_ext'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('office_phone_ext'))
			<span class="help-block">{{ $errors->vehicleInfo->first('office_phone_ext') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone_alternate col-lg-6 {{ $errors->vehicleInfo->has('phone_alternate') ? 'has-error' : '' }}">
		<label for="phone_alternate">Alternate Phone Number</label>
		<input type="text" class="form-control" id="phone_alternate" name="phone_alternate" value="{{ $data['phone_alternate'] }}" {{ $disabledAttribute }} />
		@if($errors->vehicleInfo->has('phone_alternate'))
			<span class="help-block">{{ $errors->vehicleInfo->first('phone_alternate') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	//
</script>