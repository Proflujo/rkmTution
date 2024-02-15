@php

	$bookingInfo = isset($bookingInfo) ? $bookingInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[	
		'guestdetails' => old('guestdetails') ? old('guestdetails') : (isset($bookingInfo->guestdetails) ? $bookingInfo->guestdetails : (isset($defaultValues['guestdetails']) ? $defaultValues['guestdetails'] : '')),
		'custMonthPackg' => old('custMonthPackg') ? old('custMonthPackg') : (isset($bookingInfo->custMonthPackg) ? $bookingInfo->custMonthPackg : (isset($defaultValues['custMonthPackg']) ? $defaultValues['custMonthPackg'] : '')),
		'customer' => old('customer') ? old('customer') : (isset($bookingInfo->customer) ? $bookingInfo->customer : (isset($defaultValues['customer']) ? $defaultValues['customer'] : '')),
		'entryDate' => old('entryDate') ? old('entryDate') : (isset($bookingInfo->entryDate) ? $bookingInfo->entryDate : (isset($defaultValues['entryDate']) ? $defaultValues['entryDate'] : '')),
		'tripSheetNo' => old('tripSheetNo') ? old('tripSheetNo') : (isset($bookingInfo->tripSheetNo) ? $bookingInfo->tripSheetNo : (isset($defaultValues['tripSheetNo']) ? $defaultValues['tripSheetNo'] : '')),
		'guest' => old('guest') ? old('guest') : (isset($bookingInfo->guest) ? $bookingInfo->guest : (isset($defaultValues['guest']) ? $defaultValues['guest'] : '')),
		'roomNo' => old('roomNo') ? old('roomNo') : (isset($bookingInfo->roomNo) ? $bookingInfo->roomNo : (isset($defaultValues['roomNo']) ? $defaultValues['roomNo'] : '')),
		'travelDate' => old('travelDate') ? old('travelDate') : (isset($bookingInfo->travelDate) ? $bookingInfo->travelDate : (isset($defaultValues['travelDate']) ? $defaultValues['travelDate'] : '')),
		'startTime' => old('startTime') ? old('startTime') : (isset($bookingInfo->startTime) ? $bookingInfo->startTime : (isset($defaultValues['startTime']) ? $defaultValues['startTime'] : '')),
		'endDate' => old('endDate') ? old('endDate') : (isset($bookingInfo->endDate) ? $bookingInfo->endDate : (isset($defaultValues['endDate']) ? $defaultValues['endDate'] : '')),
		'endTime' => old('endTime') ? old('endTime') : (isset($bookingInfo->endTime) ? $bookingInfo->endTime : (isset($defaultValues['endTime']) ? $defaultValues['endTime'] : '')),
		'custPkg' => old('custPkg') ? old('custPkg') : (isset($bookingInfo->pkgIdRateType) ? $bookingInfo->pkgIdRateType : (isset($defaultValues['custPkg']) ? $defaultValues['custPkg'] : '')),
		'vehOwn' => old('vehOwn') ? old('vehOwn') : (isset($bookingInfo->vehOwn) ? $bookingInfo->vehOwn : (isset($defaultValues['vehOwn']) ? $defaultValues['vehOwn'] : '')),
		'vehNo' => old('vehNo') ? old('vehNo') : (isset($bookingInfo->vehNo) ? $bookingInfo->vehNo : (isset($defaultValues['vehNo']) ? $defaultValues['vehNo'] : '')),
		'driver' => old('driver') ? old('driver') : (isset($bookingInfo->driver) ? $bookingInfo->driver : (isset($defaultValues['driver']) ? $defaultValues['driver'] : '')),
		'comments' => old('comments') ? old('comments') : (isset($bookingInfo->comments) ? $bookingInfo->comments : (isset($defaultValues['comments']) ? $defaultValues['comments'] : '')),
		'outSrcVendor' => old('outSrcVendor') ? old('outSrcVendor') : (isset($bookingInfo->outSrcVendor) ? $bookingInfo->outSrcVendor : (isset($defaultValues['outSrcVendor']) ? $defaultValues['outSrcVendor'] : '')),
		'outSrcVehRegn' => old('outSrcVehRegn') ? old('outSrcVehRegn') : (isset($bookingInfo->outSrcVehRegn) ? $bookingInfo->outSrcVehRegn : (isset($defaultValues['outSrcVehRegn']) ? $defaultValues['outSrcVehRegn'] : '')),
		'outSrcDriverName' => old('outSrcDriverName') ? old('outSrcDriverName') : (isset($bookingInfo->outSrcDriverName) ? $bookingInfo->outSrcDriverName : (isset($defaultValues['outSrcDriverName']) ? $defaultValues['outSrcDriverName'] : '')),
		'outSrcDriverMobile' => old('outSrcDriverMobile') ? old('outSrcDriverMobile') : (isset($bookingInfo->outSrcDriverMobile) ? $bookingInfo->outSrcDriverMobile : (isset($defaultValues['outSrcDriverMobile']) ? $defaultValues['outSrcDriverMobile'] : '')),
		'startKm' => old('startKm') ? old('startKm') : (isset($bookingInfo->startKm) ? $bookingInfo->startKm : (isset($defaultValues['startKm']) ? $defaultValues['startKm'] : '')),
		'endKm' => old('endKm') ? old('endKm') : (isset($bookingInfo->endKm) ? $bookingInfo->endKm : (isset($defaultValues['endKm']) ? $defaultValues['endKm'] : '')),
		'tollCharge' => old('tollCharge') ? old('tollCharge') : (isset($bookingInfo->tollCharge) ? $bookingInfo->tollCharge : (isset($defaultValues['tollCharge']) ? $defaultValues['tollCharge'] : '')),
		'parkingCharge' => old('parkingCharge') ? old('parkingCharge') : (isset($bookingInfo->parkingCharge) ? $bookingInfo->parkingCharge : (isset($defaultValues['parkingCharge']) ? $defaultValues['parkingCharge'] : '')),
		'driverBata' => old('driverBata') ? old('driverBata') : (isset($bookingInfo->driverBata) ? $bookingInfo->driverBata : (isset($defaultValues['driverBata']) ? $defaultValues['driverBata'] : '')),
		'vehicleType' => old('vehicleType') ? old('vehicleType') : (isset($bookingInfo->vehicleType) ? $bookingInfo->vehicleType : (isset($defaultValues['vehicleType']) ? $defaultValues['vehicleType'] : '')),
		'guestType' => old('guestType') ? old('guestType') : (isset($bookingInfo->guestType) ? $bookingInfo->guestType : (isset($defaultValues['guestType']) ? $defaultValues['guestType'] : '')),
		'clubbing' => old('clubbing') ? old('clubbing') : (isset($bookingInfo->clubbing) ? $bookingInfo->clubbing : (isset($defaultValues['clubbing']) ? $defaultValues['clubbing'] : '')),
		'outSrcDcOVehRegn' => old('outSrcDcOVehRegn') ? old('outSrcDcOVehRegn') : '',
		'outSrcDcODriverName' => old('outSrcDcODriverName') ? old('outSrcDcODriverName') : '',
		'outSrcDcoDriverMobile' => old('outSrcDcoDriverMobile') ? old('outSrcDcoDriverMobile') : '',
		'inclNonDedicated' => old('inclNonDedicated') ? old('inclNonDedicated') : ( isset($bookingInfo->inclNonDedicated) ? $bookingInfo->inclNonDedicated : (isset($defaultValues['inclNonDedicated']) ? $defaultValues['inclNonDedicated'] : '') ),
		'pickupPoint' => old('pickupPoint') ? old('pickupPoint') : ( isset($bookingInfo->pickupPoint) ? $bookingInfo->pickupPoint : (isset($defaultValues['pickupPoint']) ? $defaultValues['pickupPoint'] : '') ),
		'destination' => old('destination') ? old('destination') : ( isset($bookingInfo->destination) ? $bookingInfo->destination : (isset($defaultValues['destination']) ? $defaultValues['destination'] : '') ),
		'category' => old('category') ? old('category') : ( isset($bookingInfo->category) ? $bookingInfo->category : (isset($defaultValues['category']) ? $defaultValues['category'] : '') ),
		'dispatchedVehicle' => old('dispatchedVehicle') ? old('dispatchedVehicle') : ( isset($bookingInfo->dispatchedVehicle) ? $bookingInfo->dispatchedVehicle : '' ),
	];
@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">
	<div class="col-lg-12">
		<div class="info-box">
			<i class="fas fa-info-circle"></i> To create <a href="{{ url('invoice-monthly') }}"><span class="badge badge-primary">monthly invoice</span></a>, a <a href="{{ url('masters/vehicle/add') }}"><span class="badge badge-primary">vehicle</span></a> should be dedicated to the <a href="{{ url('masters/customer/add?customerType=' . base64_encode(CODELIST_CUSTOMER_TYPE_HOTEL)) }}"><span class="badge badge-primary">customer</span></a> and it should have <b>monthly package</b> checkbox checked
		</div>
	</div>
</div>

<div class="row">

	<div class="form-group parent-category col-lg-6 {{ $errors->bookingInfo->has('category') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="category">Category</label>
		<select class="form-control col-lg-7 selectpicker" id="category" name="category" {{ $disabledAttribute }}>
			@if(isset($cdlTripCategories) && !empty($cdlTripCategories))
				@foreach($cdlTripCategories as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['category'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('category'))
			<span class="help-block">{{ $errors->bookingInfo->first('category') }}</span>
		@endif
	</div>

</div>

<div class="row">

	@if(isset($bookingInfo->booking_id))
		<input type="hidden" name="bookingId" value="{{ base64_encode($bookingInfo->booking_id) }}">
	@endif

	@if(isset($bookingInfo->allocId))
		<input type="hidden" name="allocId" value="{{ base64_encode($bookingInfo->allocId) }}">
	@endif

	<div class="form-group parent-customer col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('customer') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="customer">Customer</label>
		@if(Auth::user()->can('modifyHotelCustomer'))
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="customer" name="customer" {{ $disabledAttribute }}>
				<option></option>
				@foreach($customers as $custId => $custName)
					<option value="{{ $custId }}" {{ $custId == $data['customer'] ? "selected" : "" }}>{{ $custName }}</option>
				@endforeach
			</select>
		@else
			<input type="text" class="form-control col-lg-7" value="{{ isset($customers[$data['customer']]) ? $customers[$data['customer']] : '' }}" readonly="true" {{ $disabledAttribute }}>
			<input type="hidden" id="customer" name="customer" value="{{ $data['customer'] }}" {{ $disabledAttribute }}>
		@endif
		@if($errors->bookingInfo->has('customer'))
			<span class="help-block">{{ $errors->bookingInfo->first('customer') }}</span>
		@endif
	</div>

	<div class="form-group parent-entryDate col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('entryDate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="entryDate">Entry Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="entryDate" name="entryDate" value="{{ $data['entryDate'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('entryDate'))
			<span class="help-block">{{ $errors->bookingInfo->first('entryDate') }}</span>
		@endif
	</div>

</div>

<div class="row">
<!-- 
	<fieldset class="fieldset-group parent-cust-info col-lg-12 small-text" style="display: none;">
		<legend>Customer Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Branch</label>
					<label class="col-lg-8" id="custInfo[branch]"></label>
				</div>

				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="custInfo[address]"></label>
				</div>

				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Email</label>
					<label class="col-lg-8" id="custInfo[email]"></label>
				</div>

				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Contact No</label>
					<label class="col-lg-8" id="custInfo[contactNo]"></label>
				</div>
			</div>

		</div>
	</fieldset>
-->
</div>

<div class="row">

	<div class="form-group parent-guest col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('guest') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="guest">Guest Name</label>
		<input type="text" class="form-control col-lg-7" id="guest" name="guest" value="{{ $data['guest'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('guest'))
			<span class="help-block">{{ $errors->bookingInfo->first('guest') }}</span>
		@endif
	</div>

	<div class="form-group parent-roomNo col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('roomNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="roomNo">Room No</label>
		<input type="text" class="form-control col-lg-7" id="roomNo" name="roomNo" value="{{ $data['roomNo'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('roomNo'))
			<span class="help-block">{{ $errors->bookingInfo->first('roomNo') }}</span>
		@endif
	</div>
	
</div>

<div class="row">

	<div class="form-group parent-vehicleType col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('vehicleType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicleType">Vehicle Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleType" name="vehicleType" {{ $disabledAttribute }}>
			<option></option>
			@if(isset($vehicleTypeList))
				@foreach($vehicleTypeList as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['vehicleType'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('vehicleType'))
			<span class="help-block">{{ $errors->bookingInfo->first('vehicleType') }}</span>
		@endif
	</div>

	<div class="form-group parent-custPkg col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('custPkg') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="custPkg">Package</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="custPkg" name="custPkg" {{ $disabledAttribute }}>
			<option></option>
			@if(isset($custPkgList) && !empty($custPkgList))
				@foreach($custPkgList as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['custPkg'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->bookingInfo->has('custPkg'))
			<span class="help-block">{{ $errors->bookingInfo->first('custPkg') }}</span>
		@endif
	</div>

</div>

<div class= "row">
	<div class="form-group parent-custMonthPackg col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('custMonthPackg')? 'has-error' : '' }}">
		<label class="col-lg-5" for="custMonthPackg">Customer Package Details</label>
		<input type="text" class="form-control col-lg-7" id="custMonthPackg" name="custMonthPackg" value="" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('custMonthPackg'))
			<span class="help-block">{{ $errors->bookingInfo->first('custMonthPackg') }}</span>
		@endif
	</div>
</div>

<div class="row">

	<div class="form-group parent-pickupPoint col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('pickupPoint') ? 'has-error' : '' }}">
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

<div class="row status-trip-completed">

	<fieldset class="fieldset-group col-lg-12">
		<legend>Trip Timings</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-travelDate col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('travelDate') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="travelDate">Start Date</label>
					<input type="text" class="form-control col-lg-7 date-picker" id="travelDate" name="travelDate" value="{{ $data['travelDate'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('travelDate'))
						<span class="help-block">{{ $errors->bookingInfo->first('travelDate') }}</span>
					@endif
				</div>

				<div class="form-group parent-startTime col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('startTime') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="startTime">Start Time</label>
					<input type="text" class="form-control col-lg-7 time-picker" id="startTime" name="startTime" value="{{ $data['startTime'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('startTime'))
						<span class="help-block">{{ $errors->bookingInfo->first('startTime') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-endDate col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('endDate') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endDate">End Date</label>
					<input type="text" class="form-control col-lg-7 date-picker" id="endDate" name="endDate" value="{{ $data['endDate'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('endDate'))
						<span class="help-block">{{ $errors->bookingInfo->first('endDate') }}</span>
					@endif
				</div>

				<div class="form-group parent-endTime col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('endTime') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endTime">End Time</label>
					<input type="text" class="form-control col-lg-7 time-picker" id="endTime" name="endTime" value="{{ $data['endTime'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('endTime'))
						<span class="help-block">{{ $errors->bookingInfo->first('endTime') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<div class="form-group parent-vehOwn col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('vehOwn') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehOwn">Vehicle Ownership</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehOwn" name="vehOwn" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehOwnList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehOwn'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->bookingInfo->has('vehOwn'))
			<span class="help-block">{{ $errors->bookingInfo->first('vehOwn') }}</span>
		@endif
	</div>

</div>

<div class="row parent-veh-own">

	<div class="form-group col-lg-6 col-md-6 col-sm-6">
		<div class="row mx-0 parent-vehNo {{ $errors->bookingInfo->has('vehNo') ? 'has-error' : '' }} required-field form-group">
			<label class="col-lg-5" for="vehNo">Vehicle</label>
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehNo" name="vehNo" {{ $disabledAttribute }}>
				<option></option>
				@if(isset($vehicleList) && !empty($vehicleList))
					@foreach($vehicleList as $id => $name)
						<option value="{{ $id }}" {{ $id == $data['vehNo'] ? "selected" : "" }}>{{ $name }}</option>
					@endforeach
				@endif
			</select>
			@if($errors->bookingInfo->has('vehNo'))
				<span class="help-block">{{ $errors->bookingInfo->first('vehNo') }}</span>
			@endif
		</div>
	</div>

	<div class="form-group col-lg-6 col-md-6 col-sm-6">
		<div class="row mx-0 parent-driver status-veh-allocated {{ $errors->bookingInfo->has('driver') ? 'has-error' : '' }} required-field form-group">
			<label class="col-lg-5" for="driver">Driver</label>
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="driver" name="driver" {{ $disabledAttribute }}>
				<option></option>
				@if(isset($driverList) && !empty($driverList))
					@foreach($driverList as $id => $name)
						<option value="{{ $id }}" {{ $id == $data['driver'] ? "selected" : "" }}>{{ $name }}</option>
					@endforeach
				@endif
			</select>
			@if($errors->bookingInfo->has('driver'))
				<span class="help-block">{{ $errors->bookingInfo->first('driver') }}</span>
			@endif
		</div>
		<div class="row ml-3 parent-inclNonDedicated" style="display: none;">
			<div class="col-lg-12 form-group">
				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="inclNonDedicated" name="inclNonDedicated" value="yes" {{ $data['inclNonDedicated'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
					<label class="custom-control-label" for="inclNonDedicated">Show All Drivers</label>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="row parent-veh-outsrc status-veh-allocated">

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Vehicle</legend>

		<div class="form-group">

			<div class="row">
				<div class="col-lg-12">
					<div class="info-box">
						<i class="fas fa-info-circle"></i> Please ensure the vehicle is not been allocated for any other trip.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcVehRegn col-lg-12 {{ $errors->bookingInfo->has('outSrcVehRegn') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcVehRegn">Reg. No</label>
					<div class="input-group col-lg-7">
						<select class="form-control selectpicker" id="outSrcVehRegn" name="outSrcVehRegn" {{ $disabledAttribute }}>
						</select>
						<div class="input-group-append">
							<a class="input-group-btn" id="btnAddNewOutSrcVehicle" title="Add Vehicle">
								<i class="fas fa-plus"></i>
							</a>
						</div>
					</div>
					@if($errors->bookingInfo->has('outSrcVehRegn'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcVehRegn') }}</span>
					@endif
				</div>

				<div class="form-group parent-outSrcVendor col-lg-12 {{ $errors->bookingInfo->has('outSrcVendor') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="driver">Vendor</label>
					<input type="hidden" id="outSrcVendor" name="outSrcVendor" value="{{ $data['outSrcVendor'] }}" />
					<span class="form-control col-lg-7" id="txtOutSrcVendor">{{ ( $data['outSrcVendor'] && $outSrcVendors ? $outSrcVendors[$data['outSrcVendor']] : '' ) }}</span>
					@if($errors->bookingInfo->has('outSrcVendor'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcVendor') }}</span>
					@endif
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Driver</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-outSrcDriverName col-lg-12 {{ $errors->bookingInfo->has('outSrcDriverName') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDriverName">Name</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDriverName" name="outSrcDriverName" value="{{ $data['outSrcDriverName'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('outSrcDriverName'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcDriverName') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcDriverMobile col-lg-12 {{ $errors->bookingInfo->has('outSrcDriverMobile') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDriverMobile">Phone</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDriverMobile" name="outSrcDriverMobile" value="{{ $data['outSrcDriverMobile'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('outSrcDriverMobile'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcDriverMobile') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row row-veh-outsrc-dvr-cum-owner">

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Vehicle</legend>

		<div class="form-group">

			<div class="row">
				<div class="col-lg-12">
					<div class="info-box">
						<i class="fas fa-info-circle"></i> Please ensure the vehicle is not been allocated for any other trip.
					</div>
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcDcOVehRegn col-lg-12 {{ $errors->bookingInfo->has('outSrcDcOVehRegn') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcOVehRegn">Reg. No</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcOVehRegn" name="outSrcDcOVehRegn" value="{{ $data['outSrcDcOVehRegn'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('outSrcDcOVehRegn'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcDcOVehRegn') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Driver</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-outSrcDcODriverName col-lg-12 {{ $errors->bookingInfo->has('outSrcDcODriverName') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcODriverName">Name</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcODriverName" name="outSrcDcODriverName" value="{{ $data['outSrcDcODriverName'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('outSrcDcODriverName'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcDcODriverName') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcDcoDriverMobile col-lg-12 {{ $errors->bookingInfo->has('outSrcDcoDriverMobile') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcoDriverMobile">Phone</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcoDriverMobile" name="outSrcDcoDriverMobile" value="{{ $data['outSrcDcoDriverMobile'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('outSrcDcoDriverMobile'))
						<span class="help-block">{{ $errors->bookingInfo->first('outSrcDcoDriverMobile') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">
	<div class="form-group col-lg-6 col-md-6 col-sm-6">
		<div class="custom-control custom-checkbox col-lg-5">
			<input type="checkbox" class="custom-control-input" id="alternateVehicle" name="alternateVehicle" value="yes" />
			<label class="custom-control-label" for="alternateVehicle">Alternate Vehicle</label>
		</div>
		<div class="col-lg-7 px-0 alternateVehicleFields hide">
			<select class="form-control selectpicker" data-placeholder="" id="dispatchedVehicle" name="dispatchedVehicle" {{ $disabledAttribute }}>
				<option></option>
				@if(isset($dispatchedVehiclesList) && !empty($dispatchedVehiclesList))
					@php $ownedVehicles = ""; $outsourcedVehicles = ""; @endphp

					@foreach($dispatchedVehiclesList as $vehicle)
						@if(strpos($vehicle->vehicleTypeWithId, "owned_") !== false)
							@php
								$ownedVehicles .= "<option value=\"" . $vehicle->regn_no  . "\" " . ($vehicle->regn_no == $data['dispatchedVehicle'] ? "selected" : "") . ">" . $vehicle->regn_no . "</option>";
							@endphp
						@else
							@php
								$outsourcedVehicles .= "<option value=\"" . $vehicle->regn_no  . "\" " . ($vehicle->regn_no == $data['dispatchedVehicle'] ? "selected" : "") . ">" . $vehicle->regn_no . "</option>";
							@endphp
						@endif
					@endforeach

					<optgroup label="Owned Vehicles">
						@if(empty($ownedVehicles))
							<option disabled>No Vehicles Found</option>
						@else
							{!! $ownedVehicles !!}
						@endif
					</optgroup>

					<optgroup label="Outsourced Vehicles">
						@if(empty($outsourcedVehicles))
							<option disabled>No Vehicles Found</option>
						@else
							{!! $outsourcedVehicles !!}
						@endif
					</optgroup>
				@else
					<option disabled>No Vehicles Found</option>
				@endif
			</select>
		</div>
	</div>
</div>

<div class="row">

	<div class="form-group parent-tripSheetNo col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('tripSheetNo') ? 'has-error' : '' }} required-field status-trip-completed">
		<label class="col-lg-5" for="tripSheetNo">Trip Sheet No</label>
		<input type="text" class="form-control col-lg-7" id="tripSheetNo" name="tripSheetNo" value="{{ $data['tripSheetNo'] }}" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('tripSheetNo'))
			<span class="help-block">{{ $errors->bookingInfo->first('tripSheetNo') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Km Readings</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-startKm col-lg-12 {{ $errors->bookingInfo->has('startKm') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="startKm">Start km</label>
					<div class="input-group col-lg-7">
						<input type="text" class="form-control currency" id="startKm" name="startKm" value="{{ $data['startKm'] }}" {{ $disabledAttribute }} readonly="true">
						@if($is_kmEditable)
							@if(!$disableEditing)
								<div class="input-group-append">
									<a class="input-group-btn" id="btnAllowEditStartKm" title="Edit">
										<i class="fas fa-pencil-alt"></i>
									</a>
								</div>
							@endif
						@endif
					</div>
					@if($errors->bookingInfo->has('startKm'))
						<span class="help-block">{{ $errors->bookingInfo->first('startKm') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-endKm col-lg-12 {{ $errors->bookingInfo->has('endKm') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endKm">End km</label>
					<input type="text" class="form-control col-lg-7 currency" id="endKm" name="endKm" value="{{ $data['endKm'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('endKm'))
						<span class="help-block">{{ $errors->bookingInfo->first('endKm') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Extra Charges</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-tollCharge col-lg-12 {{ $errors->bookingInfo->has('tollCharge') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="tollCharge">Toll Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 currency" id="tollCharge" name="tollCharge" value="{{ $data['tollCharge'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('tollCharge'))
						<span class="help-block">{{ $errors->bookingInfo->first('tollCharge') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-parkingCharge col-lg-12 {{ $errors->bookingInfo->has('parkingCharge') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="parkingCharge">Parking Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 currency" id="parkingCharge" name="parkingCharge" value="{{ $data['parkingCharge'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('parkingCharge'))
						<span class="help-block">{{ $errors->bookingInfo->first('parkingCharge') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-driverBata col-lg-12 {{ $errors->bookingInfo->has('driverBata') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="driverBata">Driver Bata (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 currency" id="driverBata" name="driverBata" value="{{ $data['driverBata'] }}" {{ $disabledAttribute }}>
					@if($errors->bookingInfo->has('driverBata'))
						<span class="help-block">{{ $errors->bookingInfo->first('driverBata') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<div class="form-group parent-guestType col-lg-6 col-md-6 col-sm-6">
		<label class="col-lg-5" for="guestType">Guest Type</label>
		<select class="form-control col-lg-7 selectpicker" id="guestType" name="guestType" {{ $disabledAttribute }}>
			@foreach($guestTypes as $typeId => $guestType)
				<option value="{{ $typeId }}" {{ $typeId == $data["guestType"] ? "selected" : "" }}>{{ $guestType }}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group parent-clubbing col-lg-6 col-md-6 col-sm-6">
		<div class="custom-control custom-checkbox checkbox-right">
			<input type="checkbox" class="custom-control-input" id="clubbing" name="clubbing" value="yes" {{ $data['clubbing'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
			<label class="custom-control-label" for="clubbing">Clubbing</label>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="form-group parent-guestdetails col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('guestdetails') ? 'has-error' : '' }}">
		<label class="col-lg-5" id="comment" for="guestdetails">Guest Details</label>
		<input type="text" class="form-control col-lg-7" id="guestdetails" name="guestdetails" value="" {{ $disabledAttribute }}>
		@if($errors->bookingInfo->has('guestdetails'))
			<span class="help-block">{{ $errors->bookingInfo->first('guestdetails') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group parent-comments col-lg-6 col-md-6 col-sm-6 {{ $errors->bookingInfo->has('comments') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="comments">Comments</label>
		<textarea class="form-control col-lg-7" id="comments" name="comments" rows="5" {{ $disabledAttribute }}>{{ $data['comments'] }}</textarea>
		@if($errors->bookingInfo->has('comments'))
			<span class="help-block">{{ $errors->bookingInfo->first('comments') }}</span>
		@endif
	</div>

</div>

<script type="text/javascript">
	var defaultBookingInfoValues = {!! json_encode($data) !!};
	const bookingInfo = {!! json_encode($bookingInfo) !!};
	const MONTHLY_PACKAGE = '{!! CODELIST_CUST_PKG_RATE_TYPE_MONTHLY !!}';
	const STATUS_VEH_ALLOCATED = '{!! CODELIST_VEH_BOOKING_STAT_VEH_ALLOCATED !!}';
	const STATUS_TRIP_COMPLETED = '{!! CODELIST_VEH_BOOKING_STAT_TRIP_COMPLETED !!}';
	const VEH_OWN_OUTSRC = '{!! CODELIST_ALLOC_VEHICLE_TYPE_OUTSOURCED !!}';
	const VEHTYPEOWNED = '{!! CODELIST_ALLOC_VEHICLE_TYPE_OWN_FLEET !!}';
	const VEHTYPEDEDICATED = '{!! CODELIST_ALLOC_VEHICLE_TYPE_DEDICATED !!}';
	const VEH_OWN_OUTSRC_DVRCUMOWNER = '{!! CODELIST_ALLOC_VEHICLE_TYPE_OUTSOURCED_DVR_CUM_OWNER !!}';
	const START_KM_EDIT_CONF_MSG = "Start km run should not be changed for existing vehicles. The change will be logged for audit purposes. Do you want to continue?";
</script>
