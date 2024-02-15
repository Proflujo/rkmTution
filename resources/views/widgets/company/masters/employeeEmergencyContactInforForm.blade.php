@php

	$employeeInfo = isset($employeeInfo) ? $employeeInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'emerg_name' => old('emerg_name') ? old('emerg_name') : (isset($employeeInfo->emerg_name) ? $employeeInfo->emerg_name : ''),
		'emerg_address1' => old('emerg_address1') ? old('emerg_address1') : (isset($employeeInfo->emerg_address1) ? $employeeInfo->emerg_address1 : ''),
		'emerg_address2' => old('emerg_address2') ? old('emerg_address2') : (isset($employeeInfo->emerg_address2) ? $employeeInfo->emerg_address2 : ''),
		'emerg_address3' => old('emerg_address3') ? old('emerg_address3') : (isset($employeeInfo->emerg_address3) ? $employeeInfo->emerg_address3 : ''),
		'emerg_pin_code' => old('emerg_pin_code') ? old('emerg_pin_code') : (isset($employeeInfo->emerg_pin_code) ? $employeeInfo->emerg_pin_code : ''),
		'emerg_city' => old('emerg_city') ? old('emerg_city') : (isset($employeeInfo->emerg_city) ? $employeeInfo->emerg_city : ''),
		'emerg_state' => old('emerg_state') ? old('emerg_state') : (isset($employeeInfo->emerg_state) ? $employeeInfo->emerg_state : ''),
		'emerg_email' => old('emerg_email') ? old('emerg_email') : (isset($employeeInfo->emerg_email) ? $employeeInfo->emerg_email : ''),
		'emerg_phone' => old('emerg_phone') ? old('emerg_phone') : (isset($employeeInfo->emerg_phone) ? $employeeInfo->emerg_phone : ''),
		'emerg_mobile_phone' => old('emerg_mobile_phone') ? old('emerg_mobile_phone') : (isset($employeeInfo->emerg_mobile_phone) ? $employeeInfo->emerg_mobile_phone : ''),
		'emerg_office_phone' => old('emerg_office_phone') ? old('emerg_office_phone') : (isset($employeeInfo->emerg_office_phone) ? $employeeInfo->emerg_office_phone : ''),
		'emerg_office_phone_ext' => old('emerg_office_phone_ext') ? old('emerg_office_phone_ext') : (isset($employeeInfo->emerg_office_phone_ext) ? $employeeInfo->emerg_office_phone_ext : ''),
		'emerg_phone_alternate' => old('emerg_phone_alternate') ? old('emerg_phone_alternate') : (isset($employeeInfo->emerg_phone_alternate) ? $employeeInfo->emerg_phone_alternate : '')
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	<div class="form-group parent-emerg_name col-lg-6 {{ $errors->employeeInfo->has('emerg_name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="emerg_name">Name</label>
		<input type="text" class="form-control col-lg-7" id="emerg_name" name="emerg_name" value="{{ $data['emerg_name'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_name'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_name') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_address1 col-lg-6 {{ $errors->employeeInfo->has('emerg_address1') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="emerg_address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="emerg_address1" name="emerg_address1" value="{{ $data['emerg_address1'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_address1'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_address2 col-lg-6 {{ $errors->employeeInfo->has('emerg_address2') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="emerg_address2" name="emerg_address2" value="{{ $data['emerg_address2'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_address2'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_address3 col-lg-6 {{ $errors->employeeInfo->has('emerg_address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="emerg_address3" name="emerg_address3" value="{{ $data['emerg_address3'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_address3'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_pin_code col-lg-6 {{ $errors->employeeInfo->has('emerg_pin_code') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_pin_code">PIN Code</label>
		<input type="text" class="form-control col-lg-7" id="emerg_pin_code" name="emerg_pin_code" value="{{ $data['emerg_pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_pin_code'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_city col-lg-6 {{ $errors->employeeInfo->has('emerg_city') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="emerg_city">City</label>
		<input type="text" class="form-control col-lg-7" id="emerg_city" name="emerg_city" value="{{ $data['emerg_city'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_city'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_city') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_state col-lg-6 {{ $errors->employeeInfo->has('emerg_state') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="emerg_state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="emerg_state" name="emerg_state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['emerg_state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('emerg_state'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_email col-lg-6 {{ $errors->employeeInfo->has('emerg_email') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="emerg_email" name="emerg_email" value="{{ $data['emerg_email'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_email'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_email') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_phone col-lg-6 {{ $errors->employeeInfo->has('emerg_phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="emerg_phone">Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="emerg_phone" name="emerg_phone" value="{{ $data['emerg_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_mobile_phone col-lg-6 {{ $errors->employeeInfo->has('emerg_mobile_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_mobile_phone">Mobile Number</label>
		<input type="text" class="form-control col-lg-7" id="emerg_mobile_phone" name="emerg_mobile_phone" value="{{ $data['emerg_mobile_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_mobile_phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_mobile_phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_office_phone col-lg-6 {{ $errors->employeeInfo->has('emerg_office_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_office_phone">Office Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="emerg_office_phone" name="emerg_office_phone" value="{{ $data['emerg_office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_office_phone'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_office_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-emerg_office_phone_ext col-lg-6 {{ $errors->employeeInfo->has('emerg_office_phone_ext') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_office_phone_ext">Office Phone Extension Number</label>
		<input type="text" class="form-control col-lg-7" id="emerg_office_phone_ext" name="emerg_office_phone_ext" value="{{ $data['emerg_office_phone_ext'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_office_phone_ext'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_office_phone_ext') }}</span>
		@endif
	</div>

	<div class="form-group parent-emerg_phone_alternate col-lg-6 {{ $errors->employeeInfo->has('emerg_phone_alternate') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="emerg_phone_alternate">Alternate Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="emerg_phone_alternate" name="emerg_phone_alternate" value="{{ $data['emerg_phone_alternate'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('emerg_phone_alternate'))
			<span class="help-block">{{ $errors->employeeInfo->first('emerg_phone_alternate') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	//
</script>
