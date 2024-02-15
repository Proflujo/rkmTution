@php

	$customerInfo = isset($customerInfo) ? $customerInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'contactName' => old('contactName') ? old('contactName') : (isset($customerInfo->contactName) ? $customerInfo->contactName : ''),
		'contactAddress' => old('contactAddress') ? old('contactAddress') : (isset($customerInfo->contactAddr) ? $customerInfo->contactAddr : ''),
		'contactEmail' => old('contactEmail') ? old('contactEmail') : (isset($customerInfo->contactEmail) ? $customerInfo->contactEmail : ''),
		'contactPhone' => old('contactPhone') ? old('contactPhone') : (isset($customerInfo->contactPhoneNo) ? $customerInfo->contactPhoneNo : ''),
	];

@endphp

<div class="row">

	@if(isset($customerInfo->customerId))
		<input type="hidden" id="customerId" name="customerId" value="{{ base64_encode($customerInfo->customerId) }}">
	@endif

	<div class="form-group parent-contactName col-lg-6">
		<label class="col-lg-5" for="contactName">Name</label>
		<input type="text" class="form-control col-lg-7" id="contactName" name="contactName" value="{{ $data['contactName'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('contactName'))
			<span class="help-block">{{ $errors->customerInfo->first('contactName') }}</span>
		@endif
	</div>
	

	<div class="form-group parent-contactAddress col-lg-6">
		<label class="col-lg-5" for="contactAddress">Address</label>
		<input type="text" class="form-control col-lg-7" id="contactAddress" name="contactAddress" value="{{ $data['contactAddress'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('contactAddress'))
			<span class="help-block">{{ $errors->customerInfo->first('contactAddress') }}</span>
		@endif
	</div>

</div>


<div class="row">

	<div class="form-group parent-contactEmail col-lg-6">
		<label class="col-lg-5" for="contactEmail">Email</label>
		<input type="contactEmail" class="form-control col-lg-7" id="contactEmail" name="contactEmail" value="{{ $data['contactEmail'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('contactEmail'))
			<span class="help-block">{{ $errors->customerInfo->first('contactEmail') }}</span>
		@endif
	</div>


	<div class="form-group parent-contactPhone col-lg-6">
		<label class="col-lg-5" for="contactPhone">Phone Number</label>
		<input type="text" class="form-control col-lg-7" id="contactPhone" name="contactPhone" value="{{ $data['contactPhone'] }}" {{ $disabledAttribute }} />
		@if($errors->customerInfo->has('contactPhone'))
			<span class="help-block">{{ $errors->customerInfo->first('contactPhone') }}</span>
		@endif
	</div>

</div>
 