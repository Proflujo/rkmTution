@php

	$employeeInfo = isset($employeeInfo) ? $employeeInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'address1' => old('address1') ? old('address1') : (isset($employeeInfo->address1) ? $employeeInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($employeeInfo->address2) ? $employeeInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($employeeInfo->address3) ? $employeeInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($employeeInfo->pin_code) ? $employeeInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($employeeInfo->city) ? $employeeInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($employeeInfo->state) ? $employeeInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($employeeInfo->email) ? $employeeInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($employeeInfo->phone) ? $employeeInfo->phone : ''),
		'mobile_phone' => old('mobile_phone') ? old('mobile_phone') : (isset($employeeInfo->mobile_phone) ? $employeeInfo->mobile_phone : ''),
		'office_phone' => old('office_phone') ? old('office_phone') : (isset($employeeInfo->office_phone) ? $employeeInfo->office_phone : ''),
		'office_phone_ext' => old('office_phone_ext') ? old('office_phone_ext') : (isset($employeeInfo->office_phone_ext) ? $employeeInfo->office_phone_ext : ''),
		'phone_alternate' => old('phone_alternate') ? old('phone_alternate') : (isset($employeeInfo->phone_alternate) ? $employeeInfo->phone_alternate : '')
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	<div class="form-group parent-address1 col-lg-6 {{ $errors->employeeInfo->has('address1') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('address1'))
			<span class="help-block">{{ $errors->employeeInfo->first('address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-address2 col-lg-6 {{ $errors->employeeInfo->has('address2') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('address2'))
			<span class="help-block">{{ $errors->employeeInfo->first('address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address3 col-lg-6 {{ $errors->employeeInfo->has('address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('address3'))
			<span class="help-block">{{ $errors->employeeInfo->first('address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->employeeInfo->has('pin_code') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="pin_code">PIN Code</label>
		<input type="text" class="form-control col-lg-7" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('pin_code'))
			<span class="help-block">{{ $errors->employeeInfo->first('pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-city col-lg-6 {{ $errors->employeeInfo->has('city') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="city">City</label>
		<input type="text" class="form-control col-lg-7" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('city'))
			<span class="help-block">{{ $errors->employeeInfo->first('city') }}</span>
		@endif
	</div>

	<div class="form-group parent-state col-lg-6 {{ $errors->employeeInfo->has('state') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('state'))
			<span class="help-block">{{ $errors->employeeInfo->first('state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->employeeInfo->has('email') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('email'))
			<span class="help-block">{{ $errors->employeeInfo->first('email') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone col-lg-6 {{ $errors->employeeInfo->has('phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="phone">Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-mobile_phone col-lg-6 {{ $errors->employeeInfo->has('mobile_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="mobile_phone">Mobile Number</label>
		<input type="text" class="form-control col-lg-7" id="mobile_phone" name="mobile_phone" value="{{ $data['mobile_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('mobile_phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('mobile_phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-office_phone col-lg-6 {{ $errors->employeeInfo->has('office_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone">Office Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="office_phone" name="office_phone" value="{{ $data['office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('office_phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('office_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-office_phone_ext col-lg-6 {{ $errors->employeeInfo->has('office_phone_ext') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone_ext">Office Phone Extension Number</label>
		<input type="text" class="form-control col-lg-7" id="office_phone_ext" name="office_phone_ext" value="{{ $data['office_phone_ext'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('office_phone_ext'))
			<span class="help-block">{{ $errors->employeeInfo->first('office_phone_ext') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone_alternate col-lg-6 {{ $errors->employeeInfo->has('phone_alternate') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="phone_alternate">Alternate Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="phone_alternate" name="phone_alternate" value="{{ $data['phone_alternate'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('phone_alternate'))
			<span class="help-block">{{ $errors->employeeInfo->first('phone_alternate') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	//
</script>