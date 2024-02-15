@php

	$customerInfo = isset($customerInfo) ? $customerInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'custName' => old('custName') ? old('custName') : (isset($customerInfo->custName) ? $customerInfo->custName : ''),
		'address' => old('address') ? old('address') : (isset($customerInfo->address) ? $customerInfo->address : ''),
		'email' => old('email') ? old('email') : (isset($customerInfo->email) ? $customerInfo->email : ''),
		'phone' => old('phone') ? old('phone') : (isset($customerInfo->phoneNo) ? $customerInfo->phoneNo : ''),
		'apply_gst_tollparking' => old('apply_gst_tollparking') ? old('apply_gst_tollparking') : (isset($customerInfo->apply_gst_tollparking) ? $customerInfo->apply_gst_tollparking : 'no'),
		'applyGSTForTripCharges' => old('applyGSTForTripCharges') ? old('applyGSTForTripCharges') : (isset($customerInfo->applyGSTForTripCharges) ? $customerInfo->applyGSTForTripCharges : 'yes'),
	];
@endphp

<div class="row">

	@if(isset($customerInfo->customerId))
		<input type="hidden" id="customerId" name="customerId" value="{{ base64_encode($customerInfo->customerId) }}">
	@endif

	<div class="form-group parent-custName col-lg-6 {{ $errors->customerInfo->has('custName') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="custName">Name</label>
		<input type="text" class="form-control col-lg-7" id="custName" name="custName" value="{{ $data['custName'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('custName'))
			<span class="help-block">{{ $errors->customerInfo->first('custName') }}</span>
		@endif
	</div>
	

	<div class="form-group parent-address col-lg-6 {{ $errors->customerInfo->has('address') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="address">Address </label>
		<input type="text" class="form-control col-lg-7" id="address" name="address" value="{{ $data['address'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('address'))
			<span class="help-block">{{ $errors->customerInfo->first('address') }}</span>
		@endif
	</div>

</div>


<div class="row">

	<div class="form-group parent-email col-lg-6 {{ $errors->customerInfo->has('email') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="email">Email</label>
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
	<div class="form-group parent-applyGSTForTripCharges col-lg-6">
		<div class="custom-control custom-checkbox d-inline-block right">
			<input type="checkbox" class="custom-control-input" id="applyGSTForTripCharges" name="applyGSTForTripCharges" value="yes" @if($data['applyGSTForTripCharges'] == 'yes') checked @endif {{ $disabledAttribute }}>
			<label class="custom-control-label col-sm-12" for="applyGSTForTripCharges">Enable GST for Billing</label>
		</div>
	</div>

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
</div>