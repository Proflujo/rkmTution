@php

	$customerInfo = isset($customerInfo) ? $customerInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues 	=	isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'name' => old('name') ? old('name') : (isset($customerInfo->name) ? $customerInfo->name : ''),
		'customer_type' => old('customer_type') ? old('customer_type') : (isset($customerInfo->customer_type) ? $customerInfo->customer_type : (isset($defaultValues['customerType']) ? base64_decode($defaultValues['customerType']) : '')),
		'branch' => old('branch') ? old('branch') : (isset($customerInfo->fkbranch_id) ? $customerInfo->fkbranch_id : ''),
		'gst_no' => old('gst_no') ? old('gst_no') : (isset($customerInfo->gst_no) ? $customerInfo->gst_no : ''),
		'default_credit_days' => old('default_credit_days') ? old('default_credit_days') : (isset($customerInfo->default_credit_days) ? $customerInfo->default_credit_days : ''),
		'address1' => old('address1') ? old('address1') : (isset($customerInfo->address1) ? $customerInfo->address1 : ''),
		'address2' => old('address2') ? old('address2') : (isset($customerInfo->address2) ? $customerInfo->address2 : ''),
		'address3' => old('address3') ? old('address3') : (isset($customerInfo->address3) ? $customerInfo->address3 : ''),
		'pin_code' => old('pin_code') ? old('pin_code') : (isset($customerInfo->pin_code) ? $customerInfo->pin_code : ''),
		'city' => old('city') ? old('city') : (isset($customerInfo->city) ? $customerInfo->city : ''),
		'state' => old('state') ? old('state') : (isset($customerInfo->state) ? $customerInfo->state : ''),
		'email' => old('email') ? old('email') : (isset($customerInfo->email) ? $customerInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($customerInfo->phone) ? $customerInfo->phone : ''),
		'mobile_phone' => old('mobile_phone') ? old('mobile_phone') : (isset($customerInfo->mobile_phone) ? $customerInfo->mobile_phone : ''),
		'office_phone' => old('office_phone') ? old('office_phone') : (isset($customerInfo->office_phone) ? $customerInfo->office_phone : ''),
		'office_phone_ext' => old('office_phone_ext') ? old('office_phone_ext') : (isset($customerInfo->office_phone_ext) ? $customerInfo->office_phone_ext : ''),
		'phone_alternate' => old('phone_alternate') ? old('phone_alternate') : (isset($customerInfo->phone_alternate) ? $customerInfo->phone_alternate : ''),
		'apply_gst_tollparking' => old('apply_gst_tollparking') ? old('apply_gst_tollparking') : (isset($customerInfo->apply_gst_tollparking) ? $customerInfo->apply_gst_tollparking : 'no'),
		'tripsheet_no' => old('tripsheet_no') ? old('tripsheet_no') : (isset($customerInfo->tripsheet_no) ? $customerInfo->tripsheet_no : ''),
		'genAutoTripSheetNo' => old('genAutoTripSheetNo') ? old('genAutoTripSheetNo') : (isset($customerInfo->genAutoTripSheetNo) ? $customerInfo->genAutoTripSheetNo : ''),
		'applyGSTForTripCharges' => old('applyGSTForTripCharges') ? old('applyGSTForTripCharges') : (isset($customerInfo->applyGSTForTripCharges) ? $customerInfo->applyGSTForTripCharges : 'yes'),
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($customerInfo->customer_id))
		<input type="hidden" id="customerId" name="customerId" value="{{ base64_encode($customerInfo->customer_id) }}">
	@endif

	<div class="form-group parent-name col-lg-6 {{ $errors->customerInfo->has('name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="name">Name</label>
		<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('name'))
			<span class="help-block">{{ $errors->customerInfo->first('name') }}</span>
		@endif
	</div>
	
</div>

<div class="row">

	<div class="form-group parent-customer_type col-lg-6 {{ $errors->customerInfo->has('customer_type') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="customer_type">Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="customer_type" name="customer_type" {{ $disabledAttribute }}>
			<option></option>
			@foreach($custTypes as $custTypeCode => $custTypeName)
				@if($custTypeCode != CODELIST_CUSTOMER_TYPE_RETAIL)
					<option value="{{ $custTypeCode }}" {{ $custTypeCode == $data['customer_type'] ? "selected" : "" }}>{{ $custTypeName }}</option>
				@endif
			@endforeach
		</select>
		@if($errors->customerInfo->has('customer_type'))
			<span class="help-block">{{ $errors->customerInfo->first('customer_type') }}</span>
		@endif
	</div>

	<div class="form-group parent-branch col-lg-6 {{ $errors->customerInfo->has('branch') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="branch">Branch</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="branch" name="branch" {{ $disabledAttribute }}>
			<option></option>
			@foreach($branches as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['branch'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerInfo->has('branch'))
			<span class="help-block">{{ $errors->customerInfo->first('branch') }}</span>
		@endif
	</div>

</div>

<div class="row">
<!-- 
	<fieldset class="fieldset-group parent-branch-info col-lg-12" style="display: none;">
		<legend>Branch Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-branch col-lg-6 {{ $errors->customerInfo->has('branch') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="branch">Branch</label>
					<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="branch" name="branch" {{ $disabledAttribute }}>
						<option></option>
						@foreach($branches as $id => $name)
							<option value="{{ $id }}" {{ $id == $data['branch'] ? "selected" : "" }}>{{ $name }}</option>
						@endforeach
					</select>
					@if($errors->customerInfo->has('branch'))
						<span class="help-block">{{ $errors->customerInfo->first('branch') }}</span>
					@endif
				</div>

				<div class="form-group col-lg-6">
					<label class="col-lg-5">Address</label>
					<label class="col-lg-7" id="branchInfo[address]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-5">Email</label>
					<label class="col-lg-7" id="branchInfo[email]"></label>
				</div>

				<div class="form-group col-lg-6">
					<label class="col-lg-5">Contact No</label>
					<label class="col-lg-7" id="branchInfo[contactNo]"></label>
				</div>
			</div>

		</div>
	</fieldset>
 -->
</div>

<div class="row">

	<div class="form-group parent-gst_no col-lg-6 {{ $errors->customerInfo->has('gst_no') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="gst_no">GST Number</label>
		<input type="text" class="form-control col-lg-7" id="gst_no" name="gst_no" value="{{ $data['gst_no'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('gst_no'))
			<span class="help-block">{{ $errors->customerInfo->first('gst_no') }}</span>
		@endif
	</div>

	<div class="form-group parent-default_credit_days col-lg-6 {{ $errors->customerInfo->has('default_credit_days') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="default_credit_days">Default Credit Days</label>
		<input type="number" class="form-control col-lg-7" id="default_credit_days" name="default_credit_days" value="{{ $data['default_credit_days'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('default_credit_days'))
			<span class="help-block">{{ $errors->customerInfo->first('default_credit_days') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address1 col-lg-6 {{ $errors->customerInfo->has('address1') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address1">Address 1</label>
		<input type="text" class="form-control col-lg-7" id="address1" name="address1" value="{{ $data['address1'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('address1'))
			<span class="help-block">{{ $errors->customerInfo->first('address1') }}</span>
		@endif
	</div>

	<div class="form-group parent-address2 col-lg-6 {{ $errors->customerInfo->has('address2') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address2">Address 2</label>
		<input type="text" class="form-control col-lg-7" id="address2" name="address2" value="{{ $data['address2'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('address2'))
			<span class="help-block">{{ $errors->customerInfo->first('address2') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-address3 col-lg-6 {{ $errors->customerInfo->has('address3') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="address3">Address 3</label>
		<input type="text" class="form-control col-lg-7" id="address3" name="address3" value="{{ $data['address3'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('address3'))
			<span class="help-block">{{ $errors->customerInfo->first('address3') }}</span>
		@endif
	</div>

	<div class="form-group parent-pin_code col-lg-6 {{ $errors->customerInfo->has('pin_code') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="pin_code">PIN Code</label>
		<input type="text" class="form-control col-lg-7" id="pin_code" name="pin_code" value="{{ $data['pin_code'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('pin_code'))
			<span class="help-block">{{ $errors->customerInfo->first('pin_code') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-city col-lg-6 {{ $errors->customerInfo->has('city') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="city">City</label>
		<input type="text" class="form-control col-lg-7 city-autocomplete" id="city" name="city" value="{{ $data['city'] }}" {{ $disabledAttribute }} placeholder="" />
		@if($errors->customerInfo->has('city'))
			<span class="help-block">{{ $errors->customerInfo->first('city') }}</span>
		@endif
	</div>

	<div class="form-group parent-state col-lg-6 {{ $errors->customerInfo->has('state') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="state">State</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="state" name="state" {{ $disabledAttribute }}>
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $data['state'] ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->customerInfo->has('state'))
			<span class="help-block">{{ $errors->customerInfo->first('state') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->customerInfo->has('email') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="email">Email Address</label>
		<input type="email" class="form-control col-lg-7" id="email" name="email" value="{{ $data['email'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('email'))
			<span class="help-block">{{ $errors->customerInfo->first('email') }}</span>
		@endif
	</div>

	<div class="form-group parent-phone col-lg-6 {{ $errors->customerInfo->has('phone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="phone">Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="phone" name="phone" value="{{ $data['phone'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('phone'))
			<span class="help-block">{{ $errors->customerInfo->first('phone') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-mobile_phone col-lg-6 {{ $errors->customerInfo->has('mobile_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="mobile_phone">Mobile Number</label>
		<input type="text" class="form-control col-lg-7" id="mobile_phone" name="mobile_phone" value="{{ $data['mobile_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('mobile_phone'))
			<span class="help-block">{{ $errors->customerInfo->first('mobile_phone') }}</span>
		@endif
	</div>

	<div class="form-group parent-office_phone col-lg-6 {{ $errors->customerInfo->has('office_phone') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="office_phone">Office Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="office_phone" name="office_phone" value="{{ $data['office_phone'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('office_phone'))
			<span class="help-block">{{ $errors->customerInfo->first('office_phone') }}</span>
		@endif
	</div>

</div>
<div class="row">
	<div class="form-group parent-applyGSTForTripCharges col-lg-6">
		<div class="custom-control custom-checkbox d-inline-block right">
			<input type="checkbox" class="custom-control-input" id="applyGSTForTripCharges" name="applyGSTForTripCharges" value="yes" @if($data['applyGSTForTripCharges'] == 'yes') checked @endif {{ $disabledAttribute }}>
			<label class="custom-control-label col-sm-12" for="applyGSTForTripCharges">Enable GST for Billing</label>
		</div>
	</div>
	
	<div class="form-group parent-tripsheet_no col-lg-6 {{ $errors->customerInfo->has('tripsheet_no') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="tripsheet_no">Customer Tripsheet No</label>
		<input type="text" class="form-control col-lg-7" id="tripsheet_no" name="tripsheet_no" value="{{ $data['tripsheet_no'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('tripsheet_no'))
			<span class="help-block">{{ $errors->customerInfo->first('tripsheet_no') }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-apply_gst_tollparking col-lg-6" style="display: none;">
		<label class="col-lg-5" for="toll_parking">Apply GST for Toll & Parking</label>
		<div class="custom-control custom-radio d-inline-block mr-2">
			<input type="radio" class="custom-control-input" id="apply_gst_tollparking_yes" name="apply_gst_tollparking" value="yes" {{($data['apply_gst_tollparking']=="yes"?"checked":"")}} {{ $disabledAttribute }}>
			<label class="custom-control-label" for="apply_gst_tollparking_yes">Yes</label>
		</div>
		<div class="custom-control custom-radio d-inline-block">
			<input type="radio" class="custom-control-input" id="apply_gst_tollparking_no" name="apply_gst_tollparking" value="no" {{($data['apply_gst_tollparking']=="no"?"checked":"")}} {{ $disabledAttribute }}>
			<label class="custom-control-label" for="apply_gst_tollparking_no">No</label>
		</div>
	</div>

	<div class="form-group parent-genAutoTripSheetNo col-lg-6 {{ $errors->customerInfo->has('genAutoTripSheetNo') ? 'has-error' : '' }}" style="display: none;">
		<div class="custom-control custom-checkbox mt-2">
			<input type="checkbox" class="custom-control-input" id="genAutoTripSheetNo" name="genAutoTripSheetNo" value="yes" {{ $data['genAutoTripSheetNo'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
			<label class="custom-control-label" for="genAutoTripSheetNo">Generate Trip Sheet No automatically</label>
		</div>
		@if($errors->customerInfo->has('genAutoTripSheetNo'))
			<span class="help-block">{{ $errors->customerInfo->first('genAutoTripSheetNo') }}</span>
		@endif
	</div>
</div>