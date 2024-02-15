@php

	$insurerInfo = isset($insurerInfo) ? $insurerInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'name' => old('name') ? old('name') : (isset($insurerInfo->name) ? $insurerInfo->name : ''),
		'address1' => old('address1') ? old('address1') : (isset($insurerInfo->address1) ? $insurerInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($insurerInfo->address2) ? $insurerInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($insurerInfo->address3) ? $insurerInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($insurerInfo->pin_code) ? $insurerInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($insurerInfo->city) ? $insurerInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($insurerInfo->state) ? $insurerInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($insurerInfo->email) ? $insurerInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($insurerInfo->phone) ? $insurerInfo->phone : ''),
		'contact_person' => old('contact_person') ? old('contact_person') : (isset($insurerInfo->contact_person) ? $insurerInfo->contact_person : ''),
		'contact_phone' => old('contact_phone') ? old('contact_phone') : (isset($insurerInfo->contact_phone) ? $insurerInfo->contact_phone : '')
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($insurerInfo->insurer_id))
		<input type="hidden" id="insurerId" name="insurerId" value="{{ base64_encode($insurerInfo->insurer_id) }}">
	@endif

	<div class="form-group parent-name col-lg-6 {{ $errors->insurerInfo->has('name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="name">Insurer Name</label>
		<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('name'))
			<span class="help-block">{{ $errors->insurerInfo->first('name') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address1 col-lg-6 {{ $errors->insurerInfo->has('address1') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('address1'))
			<span class="help-block">{{ $errors->insurerInfo->first('address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-address2 col-lg-6 {{ $errors->insurerInfo->has('address2') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('address2'))
			<span class="help-block">{{ $errors->insurerInfo->first('address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address3 col-lg-6 {{ $errors->insurerInfo->has('address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('address3'))
			<span class="help-block">{{ $errors->insurerInfo->first('address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->insurerInfo->has('pin_code') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="pin_code">PIN Code</label>
		<input type="text" class="form-control col-lg-7" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('pin_code'))
			<span class="help-block">{{ $errors->insurerInfo->first('pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-city col-lg-6 {{ $errors->insurerInfo->has('city') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="city">City</label>
		<input type="text" class="form-control col-lg-7 city-autocomplete" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('city'))
			<span class="help-block">{{ $errors->insurerInfo->first('city') }}</span>
		@endif
	</div>

	<div class="form-group parent-state col-lg-6 {{ $errors->insurerInfo->has('state') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->insurerInfo->has('state'))
			<span class="help-block">{{ $errors->insurerInfo->first('state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->insurerInfo->has('email') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('email'))
			<span class="help-block">{{ $errors->insurerInfo->first('email') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone col-lg-6 {{ $errors->insurerInfo->has('phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="phone">Phone</label>
		<input type="text" class="form-control col-lg-7" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('phone'))
			<span class="help-block">{{ $errors->insurerInfo->first('phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-contact_person col-lg-6 {{ $errors->insurerInfo->has('contact_person') ? 'has-error' : '' }}  required-field">
		<label class="col-lg-5" for="contact_person">Contact Person</label>
		<input type="text" class="form-control col-lg-7" id="contact_person" name="contact_person" value="{{ $data['contact_person'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('contact_person'))
			<span class="help-block">{{ $errors->insurerInfo->first('contact_person') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-contact_phone col-lg-6 {{ $errors->insurerInfo->has('contact_phone') ? 'has-error' : '' }}  required-field">
		<label class="col-lg-5" for="contact_phone">Contact Phone</label>
		<input type="text" class="form-control col-lg-7" id="contact_phone" name="contact_phone" value="{{ $data['contact_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->insurerInfo->has('contact_phone'))
			<span class="help-block">{{ $errors->insurerInfo->first('contact_phone') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	var defaultInsurerInfo = {!! json_encode($data) !!};
</script>