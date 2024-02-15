@php

	$bookingInfo = isset($bookingInfo) ? $bookingInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];
	$transType = isset($transType) ? $transType :'';

	$data = 
	[	'custMonthPackDets' => old('custMonthPackDets') ? old('custMonthPackDets') : (		 					 isset($bookingInfo->custMonthPackDets) ? $bookingInfo->custMonthPackDets : (		 					 isset($defaultValues['custMonthPackDets']) ? $defaultValues['custMonthPackDets'] : '') ),
		'bookingNo' => old('bookingNo') ? old('bookingNo') : ( isset($bookingInfo->bookingNo) ? $bookingInfo->bookingNo : (isset($defaultValues['bookingNo']) ? $defaultValues['bookingNo'] : '') ),
		'branch' => old('branch') ? old('branch') : ( isset($bookingInfo->branch) ? $bookingInfo->branch : (isset($defaultValues['branch']) ? $defaultValues['branch'] : '') ),
		'custType' => old('custType') ? old('custType') : (isset($bookingInfo->custType) ? $bookingInfo->custType : ''),
		'customer' => old('customer') ? old('customer') : (isset($bookingInfo->customer) ? $bookingInfo->customer : ''),
		'contactPerson' => old('contactPerson') ? old('contactPerson') : (isset($bookingInfo->contactPerson) ? $bookingInfo->contactPerson : ''),
		'guest' => old('guest') ? old('guest') : (isset($bookingInfo->guest) ? $bookingInfo->guest : ''),
		'paymentMode' => old('paymentMode') ? old('paymentMode') : (isset($bookingInfo->paymentMode) ? $bookingInfo->paymentMode : ''),
		'invoiceTo' => old('invoiceTo') ? old('invoiceTo') : (isset($bookingInfo->invoiceTo) ? $bookingInfo->invoiceTo : ''),
		'travelDate' => old('travelDate') ? old('travelDate') : (isset($bookingInfo->travelDate) ? $bookingInfo->travelDate : ''),
		'reportingTime' => old('reportingTime') ? old('reportingTime') : (isset($bookingInfo->reportingTime) ? $bookingInfo->reportingTime : ''),
		'custPackage' => old('custPackage') ? old('custPackage') : (isset($bookingInfo->pkgIdRateType) ? $bookingInfo->pkgIdRateType : ''),
		'pickupPoint' => old('pickupPoint') ? old('pickupPoint') : (isset($bookingInfo->pickupPoint) ? $bookingInfo->pickupPoint : ''),
		'destination' => old('destination') ? old('destination') : (isset($bookingInfo->destination) ? $bookingInfo->destination : ''),
		'bookingRef'  => old('bookingRef') ? old('bookingRef') : (isset($bookingInfo->bookingRef) ? $bookingInfo->bookingRef : ''),
		'endDate' => old('endDate') ? old('endDate') : (isset($bookingInfo->endDate) ? $bookingInfo->endDate : ''),
		'bookedByName' => old('bookedByName') ? old('bookedByName') : (isset($bookingInfo->bookedByName) ? $bookingInfo->bookedByName : ''),
		'bookedByPhone' => old('bookedByPhone') ? old('bookedByPhone') : (isset($bookingInfo->bookedByPhone) ? $bookingInfo->bookedByPhone : ''),
		'comments' => old('comments') ? old('comments') : (isset($bookingInfo->comments) ? $bookingInfo->comments : ''),
		'vehicleType' => old('vehicleType') ? old('vehicleType') : (isset($bookingInfo->vehicleType) ? $bookingInfo->vehicleType : ''),
	];
@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($bookingInfo->booking_id) && empty($transType))
		<input type="hidden" name="bookingId" value="{{ base64_encode($bookingInfo->booking_id) }}">
	@endif

	<div class="form-group parent-bookingNo col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('bookingNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="bookingNo">Booking</label>
		<input type="text" class="form-control col-lg-7" id="bookingNo" name="bookingNo" value="{{ $data['bookingNo'] }}" {{ $disabledAttribute }} readonly="true">
		@if($errors->bookingInfo->has('bookingNo'))
			<span class="help-block">{{ $errors->bookingInfo->first('bookingNo') }}</span>
		@endif
	</div>

	<div class="form-group parent-branch col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('branch') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="branch">Branch</label>
		@if(Auth::user()->can('modifyDefaultBranch'))
			<select class="form-control col-lg-7 selectpicker" id="branch" name="branch" {{ $disabledAttribute }}>
				@foreach($branches as $branchId => $branchName)
					<option value="{{ $branchId }}" {{ $branchId == $data['branch'] ? "selected" : "" }}>{{ $branchName }}</option>
				@endforeach
			</select>
		@else
			<input type="text" class="form-control col-lg-7" value="{{ $branches[$data['branch']] }}" readonly="true" {{ $disabledAttribute }}>
			<input type="hidden" id="branch" name="branch" value="{{ $data['branch'] }}" {{ $disabledAttribute }}>
		@endif
		@if($errors->bookingInfo->has('branch'))
			<span class="help-block">{{ $errors->bookingInfo->first('branch') }}</span>
		@endif
	</div>
</div>

<div class="row parent-branch-info" style="display: none;">
<!-- 
	<fieldset class="fieldset-group col-lg-6 small-text">
		<legend>Branch Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="branchInfo[address]"></label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Contact No</label>
					<label class="col-lg-8" id="branchInfo[contactNo]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Email</label>
					<label class="col-lg-8" id="branchInfo[email]"></label>
				</div>
			</div>

		</div>
	</fieldset>
-->
</div>

<div class="row">

	<div class="form-group parent-custType col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('custType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="custType">Customer Type</label>
		<select class="form-control col-lg-7 selectpicker" id="custType" name="custType" {{ $disabledAttribute }}>
			@if(isset($custTypes))
				@foreach($custTypes as $custTypeId => $custTypeName)
					@if($custTypeId != CODELIST_CUSTOMER_TYPE_HOTEL)
						<option value="{{ $custTypeId }}" {{ $custTypeId == $data['custType'] ? "selected" : "" }}>{{ $custTypeName }}</option>
					@endif
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('custType'))
			<span class="help-block">{{ $errors->bookingInfo->first('custType') }}</span>
		@endif
	</div>

	<div class="form-group parent-customer col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('customer') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="customer">Customer</label>
		<div class="input-group col-lg-7">
			<select class="form-control selectpicker" id="customer" name="customer" {{ $disabledAttribute }}>
			</select>
			@if(!$disableEditing)
				<div class="input-group-append">
					<a class="input-group-btn" id="btnAddRetailCust" title="Add Retail Customer" style="display: none;">
						<i class="fas fa-plus"></i>
					</a>
				</div>
			@endif
		</div>
		@if($errors->bookingInfo->has('customer'))
			<span class="help-block">{{ $errors->bookingInfo->first('customer') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-contactPerson col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('contactPerson') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="contactPerson">Contact Person</label>
		<select class="form-control col-lg-7 selectpicker" id="contactPerson" name="contactPerson" {{ $disabledAttribute }}>
		</select>
		@if($errors->bookingInfo->has('contactPerson'))
			<span class="help-block">{{ $errors->bookingInfo->first('contactPerson') }}</span>
		@endif
	</div>

	<div class="form-group parent-guest col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('guest') ? 'has-error' : '' }} required-field" style="display: none;">
		<label class="col-lg-5" for="guest">Guest</label>
		<input type="text" class="form-control col-lg-7" id="guest" name="guest" value="{{ $data['guest'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('guest'))
			<span class="help-block">{{ $errors->bookingInfo->first('guest') }}</span>
		@endif
	</div>

</div>

<div class="row parent-custType-corp-info" style="display: none;">

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6 small-text parent-cust-info">
		<legend>Customer Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Type</label>
					<label class="col-lg-8" id="custInfo[type]"></label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="custInfo[address]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Email</label>
					<label class="col-lg-8" id="custInfo[email]"></label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Contact No</label>
					<label class="col-lg-8" id="custInfo[contactNo]"></label>
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6 small-text parent-contactPerson-info">
		<legend>Contact Person Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Designation</label>
					<label class="col-lg-8" id="contactPersonInfo[designation]"></label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="contactPersonInfo[address]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Email</label>
					<label class="col-lg-8" id="contactPersonInfo[email]"></label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Contact No</label>
					<label class="col-lg-8" id="contactPersonInfo[contactNo]"></label>
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<div class="form-group parent-paymentMode col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('paymentMode') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="paymentMode">Payment Mode</label>
		<select class="form-control col-lg-7 selectpicker" id="paymentMode" name="paymentMode" {{ $disabledAttribute }}>
			@foreach($paymentModes as $paymentModeId => $paymentModeName)
				<option value="{{ $paymentModeId }}" {{ $paymentModeId == $data['paymentMode'] ? "selected" : "" }}>{{ $paymentModeName }}</option>
			@endforeach
		</select>
		@if($errors->bookingInfo->has('paymentMode'))
			<span class="help-block">{{ $errors->bookingInfo->first('paymentMode') }}</span>
		@endif
	</div>

	<div class="form-group parent-invoiceTo col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('invoiceTo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="invoiceTo">Invoice To</label>
		<input type="text" class="form-control col-lg-7" id="invoiceTo" name="invoiceTo" value="{{ $data['invoiceTo'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('invoiceTo'))
			<span class="help-block">{{ $errors->bookingInfo->first('invoiceTo') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-travelDate col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('travelDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="travelDate">Travel Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="travelDate" name="travelDate" value="{{ $data['travelDate'] }}" data-min-date="{{ $disableEditing ? '' : OTSHelper::date( false, null, true) }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('travelDate'))
			<span class="help-block">{{ $errors->bookingInfo->first('travelDate') }}</span>
		@endif
	</div>

	<div class="form-group parent-reportingTime col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('reportingTime') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="reportingTime">Reporting Time</label>
		<input type="text" class="form-control col-lg-7 time-picker" id="reportingTime" name="reportingTime" value="{{ $data['reportingTime'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('reportingTime'))
			<span class="help-block">{{ $errors->bookingInfo->first('reportingTime') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-endDate col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('endDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="endDate">Expected End Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="endDate" name="endDate" value="{{ $data['endDate'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('endDate'))
			<span class="help-block">{{ $errors->bookingInfo->first('endDate') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-pickupPoint col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('pickupPoint') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="pickupPoint">Pickup Point</label>
		<input type="text" class="form-control col-lg-7" id="pickupPoint" name="pickupPoint" value="{{ $data['pickupPoint'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('pickupPoint'))
			<span class="help-block">{{ $errors->bookingInfo->first('pickupPoint') }}</span>
		@endif
	</div>

	<div class="form-group parent-destination col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('destination') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="destination">Destination</label>
		<input type="text" class="form-control col-lg-7" id="destination" name="destination" value="{{ $data['destination'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('destination'))
			<span class="help-block">{{ $errors->bookingInfo->first('destination') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-vehicleType col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('vehicleType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleType">Vehicle Type</label>
		<select class="form-control col-lg-7 selectpicker" id="vehicleType" name="vehicleType" {{ $disabledAttribute }}>
			@if(isset($vehicleTypes))
				@foreach($vehicleTypes as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['vehicleType'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('vehicleType'))
			<span class="help-block">{{ $errors->bookingInfo->first('vehicleType') }}</span>
		@endif
	</div>

	<div class="form-group parent-custPackage col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('custPackage') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="custPackage">Package</label>
		<select class="form-control col-lg-7 selectpicker" id="custPackage" name="custPackage" {{ $disabledAttribute }}>
			@if(isset($custPackages))
				@foreach($custPackages as $custPackageId => $custPackageName)
					<option value="{{ $custPackageId }}" {{ $custPackageId == $data['custPackage'] ? "selected" : "" }}>{{ $custPackageName }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('custPackage'))
			<span class="help-block">{{ $errors->bookingInfo->first('custPackage') }}</span>
		@endif
	</div>

	<div class="form-group parent-custMonthPackDets col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('custMonthPackDets') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="custMonthPackDets">Customer Package Details</label>
		<input type="text" class="form-control col-lg-7" id="custMonthPackDets" name="custMonthPackDets" value="" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('custMonthPackDets'))
			<span class="help-block">{{ $errors->bookingInfo->first('custMonthPackDets') }}</span>
		@endif
	</div>

</div>

<div class="row parent-custPackage-info" style="display: none;">

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6 small-text">
		<legend>Customer Package Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Package Zone</label>
					<label class="col-lg-8" id="custPkgInfo[pkgZone]"></label>
				</div>
			</div>


			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Vehicle Segment</label>
					<label class="col-lg-8" id="custPkgInfo[vehSeg]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Rate Type</label>
					<label class="col-lg-8" id="custPkgInfo[rateType]"></label>
				</div>
			</div>

		</div>
	</fieldset>
	
</div>

<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="row">
			<div class="col-12">
				<fieldset class="fieldset-group">
					<legend>Booked By</legend>

					<div class="form-group">
						<div class="row">
							<div class="form-group parent-bookedByName col-lg-12 {{ $errors->bookingInfo->has('bookedByName') ? 'has-error' : '' }} required-field">
								<label class="col-lg-5" for="bookedByName">Name</label>
								<input type="text" class="form-control col-lg-7" id="bookedByName" name="bookedByName" value="{{ $data['bookedByName'] }}" {{ $disabledAttribute }}>
								@if($errors->bookingInfo->has('bookedByName'))
									<span class="help-block">{{ $errors->bookingInfo->first('bookedByName') }}</span>
								@endif
							</div>
						</div>

						<div class="row">
							<div class="form-group parent-bookedByPhone col-lg-12 {{ $errors->bookingInfo->has('bookedByPhone') ? 'has-error' : '' }} required-field">
								<label class="col-lg-5" for="bookedByPhone">Phone</label>
								<input type="text" class="form-control col-lg-7" id="bookedByPhone" name="bookedByPhone" value="{{ $data['bookedByPhone'] }}" {{ $disabledAttribute }}>
								@if($errors->bookingInfo->has('bookedByPhone'))
									<span class="help-block">{{ $errors->bookingInfo->first('bookedByPhone') }}</span>
								@endif
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		@if(!isset($bookingInfo->booking_id) && !$disableEditing)
			@include("widgets.company.sendNotificationToCustomerFields")
		@endif
		<div class="row">
			<div class="form-group parent-bookingRef col-lg-12 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('bookingRef') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="bookingRef">Booking Ref</label>
				<input type="text" class="form-control col-lg-7" id="bookingRef" name="bookingRef" value="{{ $data['bookingRef'] }}" {{ $disabledAttribute }}>
				@if($errors->bookingInfo->has('bookingRef'))
					<span class="help-block">{{ $errors->bookingInfo->first('bookingRef') }}</span>
				@endif
			</div>
		</div>
	</div>

	<div class="form-group parent-comments col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('comments') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="comments">Comments</label>
		<textarea class="form-control col-lg-7" id="comments" name="comments" rows="7" {{ $disabledAttribute }}>{{ $data['comments'] }}</textarea>
		@if($errors->bookingInfo->has('comments'))
			<span class="help-block">{{ $errors->bookingInfo->first('comments') }}</span>
		@endif
	</div>

</div>

<script type="text/html" id="templatePopupRetailCustInfo">

	<form class="frmRetailCustInfo">
		<div class="row col-lg-12">
			<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
				<legend>Customer Details</legend>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-5 required-field">
							<label for="customerName-xyz">Name</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="text" class="form-control required" id="customerName-xyz" name="customerName-xyz" {{ $disabledAttribute }} />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5 required-field">
							<label for="customerAddress-xyz">Address</label>
						</div>
						<div class="col-lg-7 form-group">
							<textarea class="form-control required" id="customerAddress-xyz" name="customerAddress-xyz" rows="3" {{ $disabledAttribute }}></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5">
							<label for="customerEmail-xyz">Email</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="email" class="form-control email" id="customerEmail-xyz" name="customerEmail-xyz" {{ $disabledAttribute }} />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5 required-field">
							<label for="customerPhone-xyz">Phone</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="text" class="form-control required number" id="customerPhone-xyz" name="customerPhone-xyz" {{ $disabledAttribute }} />
						</div>
					</div>
				</div>
			</fieldset>

			<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
				<legend>Contact Person Details</legend>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-5">
							<label for="customerContactName-xyz">Name</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="text" class="form-control" id="customerContactName-xyz" name="customerContactName-xyz" {{ $disabledAttribute }} />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5">
							<label for="customerContactAddress-xyz">Address</label>
						</div>
						<div class="col-lg-7 form-group">
							<textarea class="form-control" id="customerContactAddress-xyz" name="customerContactAddress-xyz" rows="3" {{ $disabledAttribute }}></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5">
							<label for="customerContactEmail-xyz">Email</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="email" class="form-control email" id="customerContactEmail-xyz" name="customerContactEmai-xyzl" {{ $disabledAttribute }} />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-5">
							<label for="customerContactPhone-xyz">Phone</label>
						</div>
						<div class="col-lg-7 form-group">
							<input type="text" class="form-control number" id="customerContactPhone-xyz" name="customerContactPhone-xyz" {{ $disabledAttribute }} />
						</div>
					</div>
				</div>
			</fieldset>
		</div>
	</form>

</script>

<script type="text/javascript">
	var defaultBookingInfoValues = {!! json_encode($data) !!};
	const MONTHLY_PACKAGE =  {!! CODELIST_CUST_PKG_RATE_TYPE_MONTHLY !!};
	const custTypeCorp 	  =  {!! CODELIST_CUSTOMER_TYPE_CORPORATE !!};
	const custTypeRetail  =  {!! CODELIST_CUSTOMER_TYPE_RETAIL !!};
</script>
