@php

	$branchInfo = isset($branchInfo) ? $branchInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'name' => old('name') ? old('name') : (isset($branchInfo->name) ? $branchInfo->name : ''),
		'address1' => old('address1') ? old('address1') : (isset($branchInfo->address1) ? $branchInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($branchInfo->address2) ? $branchInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($branchInfo->address3) ? $branchInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($branchInfo->pin_code) ? $branchInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($branchInfo->city) ? $branchInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($branchInfo->state) ? $branchInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($branchInfo->email) ? $branchInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($branchInfo->phone) ? $branchInfo->phone : ''),
		'office_phone' => old('office_phone') ? old('office_phone') : (isset($branchInfo->office_phone) ? $branchInfo->office_phone : ''),
		'is_head_office' => old('is_head_office') ? old('is_head_office') : (isset($branchInfo->is_head_office) ? $branchInfo->is_head_office : ''),
		'hotelCustomer' => old('hotelCustomer') ? old('hotelCustomer') : (isset($branchInfo->hotelCustomer) ? $branchInfo->hotelCustomer : ''),
		'parentBranch' => old('parentBranch') ? old('parentBranch') : (isset($branchInfo->parentBranch) ? $branchInfo->parentBranch : ''),
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<style type="text/css">
	.form-group .row
	{
		margin: 0;
	}
</style>

<div class="row">

	@if(isset($branchInfo->branch_id))
		<input type="hidden" id="branchId" name="branchId" value="{{ base64_encode($branchInfo->branch_id) }}">
	@endif

	<div class="form-group parent-name col-lg-6 {{ $errors->branchInfo->has('name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="name">Branch Name</label>
		<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('name'))
			<span class="help-block">{{ $errors->branchInfo->first('name') }}</span>
		@endif
	</div>

	<div class="form-group parent-address1 col-lg-6 {{ $errors->branchInfo->has('address1') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('address1'))
			<span class="help-block">{{ $errors->branchInfo->first('address1') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address2 col-lg-6 {{ $errors->branchInfo->has('address2') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('address2'))
			<span class="help-block">{{ $errors->branchInfo->first('address2') }}</span>
		@endif
	</div>

	<div class="form-group parent-address3 col-lg-6 {{ $errors->branchInfo->has('address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('address3'))
			<span class="help-block">{{ $errors->branchInfo->first('address3') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->branchInfo->has('pin_code') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="pin_code">PIN Code</label>
		<input type="number" class="form-control col-lg-7 valid_pin_code" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('pin_code'))
			<span class="help-block">{{ $errors->branchInfo->first('pin_code') }}</span>
		@endif
	</div>

	<div class="form-group parent-city col-lg-6 {{ $errors->branchInfo->has('city') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="city">City</label>
		<input type="text" class="form-control col-lg-7 city-autocomplete" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} placeholder="" />
		@if($errors->branchInfo->has('city'))
			<span class="help-block">{{ $errors->branchInfo->first('city') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-state col-lg-6 {{ $errors->branchInfo->has('state') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->branchInfo->has('state'))
			<span class="help-block">{{ $errors->branchInfo->first('state') }}</span>
		@endif
	</div>

	<div class="form-group parent-email col-lg-6 {{ $errors->branchInfo->has('email') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('email'))
			<span class="help-block">{{ $errors->branchInfo->first('email') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-phone col-lg-6 {{ $errors->branchInfo->has('phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="phone">Phone</label>
		<input type="text" class="form-control col-lg-7" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('phone'))
			<span class="help-block">{{ $errors->branchInfo->first('phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-office_phone col-lg-6 {{ $errors->branchInfo->has('office_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone">Office Phone</label>
		<input type="text" class="form-control col-lg-7" id="office_phone" name="office_phone" value="{{ $data['office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->branchInfo->has('office_phone'))
			<span class="help-block">{{ $errors->branchInfo->first('office_phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-is_head_office col-lg-6 {{ $errors->branchInfo->has('is_head_office') ? 'has-error' : '' }}">
		<div class="custom-control col-md-12 custom-checkbox">
			<input type="checkbox" class="custom-control-input" id="is_head_office" name="is_head_office" value="yes" {{ $data['is_head_office'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
			<label class="custom-control-label" for="is_head_office">Head Office</label>
		</div>
		@if($errors->branchInfo->has('is_head_office'))
			<span class="help-block">{{ $errors->branchInfo->first('is_head_office') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6">

		<div class="row">
			<div class="form-group parent-parentBranch col-lg-12 {{ $errors->branchInfo->has('parentBranch') ? 'has-error' : '' }} required-field" style="display: none;">
				<label class="col-lg-5" for="parentBranch">Parent Branch</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="parentBranch" name="parentBranch" {{ $disabledAttribute }}>
					<option></option>
					@foreach($parentBranchList as $id => $name)
						<option value="{{ $id }}" {{ $id == $data['parentBranch'] ? "selected" : "" }}>{{ $name }}</option>
					@endforeach
				</select>
				@if($errors->branchInfo->has('parentBranch'))
					<span class="help-block">{{ $errors->branchInfo->first('parentBranch') }}</span>
				@endif
			</div>
		</div>

<!-- 		<div class="row"> -->
<!-- 			<div class="form-group parent-hotelCustomer col-lg-12 {{ $errors->branchInfo->has('hotelCustomer') ? 'has-error' : '' }}"> -->
<!-- 				<div class="custom-control col-md-12 custom-checkbox"> -->
<!-- 					<input type="checkbox" class="custom-control-input" id="hotelCustomer" name="hotelCustomer" value="yes" {{ $data['hotelCustomer'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} /> -->
<!-- 					<label class="custom-control-label" for="hotelCustomer">Hotel Customer</label> -->
<!-- 				</div> -->
<!-- 				@if($errors->branchInfo->has('hotelCustomer')) -->
<!-- 					<span class="help-block">{{ $errors->branchInfo->first('hotelCustomer') }}</span> -->
<!-- 				@endif -->
<!-- 			</div> -->
<!-- 		</div> -->
		
	</div>

</div>

<script type="text/javascript">
	const defaultBranchData = {!! json_encode($data) !!};
</script>