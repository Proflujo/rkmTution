@php

	$tripSheenInfo = isset($tripSheenInfo) ? $tripSheenInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];
	$bookingInfo = $bookingInfo[0];
	$allocInfo = $allocInfo[0];

	$data = 
	[
		'vehType' => old('vehType') ? old('vehType') : ( isset($tripSheenInfo->vehType) ? $tripSheenInfo->vehType : (isset($defaultValues['vehType']) ? $defaultValues['vehType'] : '') ),
		'startKm' => old('startKm') ? old('startKm') : ( isset($tripSheenInfo->startKm) ? $tripSheenInfo->startKm : (isset($defaultValues['startKm']) ? $defaultValues['startKm'] : '') ),
		'endKm' => old('endKm') ? old('endKm') : ( isset($tripSheenInfo->endKm) ? $tripSheenInfo->endKm : (isset($defaultValues['endKm']) ? $defaultValues['endKm'] : '') ),
		'endDate' => old('endDate') ? old('endDate') : ( isset($tripSheenInfo->endDate) ? $tripSheenInfo->endDate : (isset($defaultValues['endDate']) ? $defaultValues['endDate'] : '') ),
		'endTime' => old('endTime') ? old('endTime') : ( isset($tripSheenInfo->endTime) ? $tripSheenInfo->endTime : (isset($defaultValues['endTime']) ? $defaultValues['endTime'] : '') ),

		'tripSheetNo' => old('tripSheetNo') ? old('tripSheetNo') : ( isset($tripSheenInfo->tripSheetNo) ? $tripSheenInfo->tripSheetNo : (isset($defaultValues['tripSheetNo']) ? $defaultValues['tripSheetNo'] : '') ),
		'startTime' => old('startTime') ? old('startTime') : ( isset($tripSheenInfo->startTime) ? $tripSheenInfo->startTime : (isset($defaultValues['startTime']) ? $defaultValues['startTime'] : '') ),
		'tollCharges' => old('tollCharges') ? old('tollCharges') : ( isset($tripSheenInfo->tollCharges) ? $tripSheenInfo->tollCharges : (isset($defaultValues['tollCharges']) ? $defaultValues['tollCharges'] : '') ),
		'parkingCharges' => old('parkingCharges') ? old('parkingCharges') : ( isset($tripSheenInfo->parkingCharges) ? $tripSheenInfo->parkingCharges : (isset($defaultValues['parkingCharges']) ? $defaultValues['parkingCharges'] : '') ),
		'taxPaid' => old('taxPaid') ? old('taxPaid') : ( isset($tripSheenInfo->taxPaid) ? $tripSheenInfo->taxPaid : (isset($defaultValues['taxPaid']) ? $defaultValues['taxPaid'] : '') ),
		'fuelCharges' => old('fuelCharges') ? old('fuelCharges') : ( isset($tripSheenInfo->fuelCharges) ? $tripSheenInfo->fuelCharges : (isset($defaultValues['fuelCharges']) ? $defaultValues['fuelCharges'] : '') ),
		'permitCharges' => old('permitCharges') ? old('permitCharges') : ( isset($tripSheenInfo->permitCharges) ? $tripSheenInfo->permitCharges : (isset($defaultValues['permitCharges']) ? $defaultValues['permitCharges'] : '') ),
		'driverBata' => old('driverBata') ? old('driverBata') : ( isset($tripSheenInfo->driverBata) ? $tripSheenInfo->driverBata : (isset($defaultValues['driverBata']) ? $defaultValues['driverBata'] : '') ),
		'totalAmount' => old('totalAmount') ? old('totalAmount') : ( isset($tripSheenInfo->totalAmount) ? $tripSheenInfo->totalAmount : (isset($defaultValues['totalAmount']) ? $defaultValues['totalAmount'] : '') ),
		'extraKm' => old('extraKm') ? old('extraKm') : ( isset($tripSheenInfo->extraKm) ? $tripSheenInfo->extraKm : '' ),
		'extraKmCharge' => old('extraKmCharge') ? old('extraKmCharge') : ( isset($tripSheenInfo->extraKmCharge) ? $tripSheenInfo->extraKmCharge : '' ),
		'extraTime' => old('extraTime') ? old('extraTime') : ( isset($tripSheenInfo->extraTime) ? $tripSheenInfo->extraTime : '' ),
		'extraTimeCharge' => old('extraTimeCharge') ? old('extraTimeCharge') : ( isset($tripSheenInfo->extraTimeCharge) ? $tripSheenInfo->extraTimeCharge : '' ),
		'cusTripSheetNo' => old('cusTripSheetNo') ? old('cusTripSheetNo') : ( isset($tripSheenInfo->cusTripSheetNo) ? $tripSheenInfo->cusTripSheetNo : ''),
		'dailyAllowance' => (isset($tripSheenInfo->dailyAllowance) ? $tripSheenInfo->dailyAllowance : ''),
		'nightAllowance' => (isset($tripSheenInfo->nightAllowance) ? $tripSheenInfo->nightAllowance : ''),
		'earlyDriveAllowance' => (isset($tripSheenInfo->earlyDriveAllowance) ? $tripSheenInfo->earlyDriveAllowance : ''),
		'outStnAllowance' => (isset($tripSheenInfo->outStnAllowance) ? $tripSheenInfo->outStnAllowance : ''),
		'lateNightAllowance' => (isset($tripSheenInfo->lateNightAllowance) ? $tripSheenInfo->lateNightAllowance : ''),
		'holidayAllowance' => (isset($tripSheenInfo->holidayAllowance) ? $tripSheenInfo->holidayAllowance : ''),
		'category' => old('category') ? old('category') : ( isset($tripSheenInfo->category) ? $tripSheenInfo->category : (isset($defaultValues['category']) ? $defaultValues['category'] : '') ),
		'invoiceTo' => old('invoiceTo') ? old('invoiceTo') : ( isset($tripSheenInfo->invoiceTo) ? $tripSheenInfo->invoiceTo : (isset($defaultValues['invoiceTo']) ? $defaultValues['invoiceTo'] : '') ),
	];

	if($tripSheenInfo->canEditCustPkg){
		$data['custPkg'] = old('custPkg') ? old('custPkg') : ( isset($tripSheenInfo->custPkg) ? $tripSheenInfo->custPkg : '' );
	}

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

@if(isset($tripSheenInfo->allocation_id))
	<input type="hidden" id="allocId" name="allocId" value="{{ base64_encode($tripSheenInfo->allocation_id) }}">
@endif

<div class="row">

	<div class="form-group parent-tripSheetNo col-lg-6 {{ $errors->tripSheenInfo->has('tripSheetNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="tripSheetNo">Trip Sheet No</label>
		<input type="text" class="form-control col-lg-7" id="tripSheetNo" name="tripSheetNo" value="{{ $data['tripSheetNo'] }}" {{ $disabledAttribute }} readonly="true">
		@if($errors->tripSheenInfo->has('tripSheetNo'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('tripSheetNo') }}</span>
		@endif
	</div>
	
	@if( !empty($data['cusTripSheetNo']) )
	<div class="form-group parent-cusTripSheetNo col-lg-6">
		<label class="col-lg-5" for="cusTripSheetNo">Customer Trip Sheet No</label>
		<input type="text" class="form-control col-lg-7" id="cusTripSheetNo" value="{{ $data['cusTripSheetNo'] }}" disabled>
	</div>
	@endif
</div>

<div class="row">

	<div class="form-group parent-category col-lg-6 {{ $errors->tripSheenInfo->has('category') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="category">Category</label>
		<select class="form-control col-lg-7 selectpicker" id="category" name="category" {{ $disabledAttribute }}>
			@if(isset($cdlTripCategories) && !empty($cdlTripCategories))
				@foreach($cdlTripCategories as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['category'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->tripSheenInfo->has('category'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('category') }}</span>
		@endif
	</div>

	<div class="form-group parent-invoiceTo col-lg-6 {{ $errors->tripSheenInfo->has('invoiceTo') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="invoiceTo">Invoice To</label>
		<input type="text" class="form-control col-lg-7" id="invoiceTo" name="invoiceTo" value="{{ $data['invoiceTo'] }}" {{ $disabledAttribute }}>
		@if($errors->tripSheenInfo->has('invoiceTo'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('invoiceTo') }}</span>
		@endif
	</div>
</div>

<div class="row">

	<fieldset class="fieldset-group col-lg-6 small-text col-no-padding">
		<legend>Booking Details Comp</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Customer</label>
					<label class="col-lg-6" id="bookingInfo[customer]">{{ $bookingInfo->customer }}</label>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Vehicle Segment</label>
					<label class="col-lg-6" id="bookingInfo[vehicleSegment]">{{ $bookingInfo->vehicle_segment }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Travel Date</label>
					<label class="col-lg-6" id="bookingInfo[travelDate]">{{ $bookingInfo->travel_date }}</label>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Reporting Time</label>
					<label class="col-lg-6" id="bookingInfo[reportingTime]">{{ $bookingInfo->reporting_time }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Pickup Point</label>
					<label class="col-lg-6" id="bookingInfo[pickupPoint]">{{ $bookingInfo->pickup_point }}</label>
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 small-text col-no-padding">
		<legend>Vehicle Allocation Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Branch</label>
					<label class="col-lg-8" id="allocInfo[customer]">{{ $allocInfo->branch }}</label>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-6 label">Vehicle Ownership</label>
					<label class="col-lg-6" id="allocInfo[vehType]">{{ $allocInfo->vehType }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Driver</label>
					<label class="col-lg-8" id="allocInfo[driver]">{{ $allocInfo->driver }}</label>
				</div>
				<div class="form-group col-lg-6 my-0">
					<div class="row mx-0">
						<div class="col-12 form-group">
							<label class="col-lg-6 label">Vehicle</label>
							<label class="col-lg-6" id="allocInfo[vehicle]">{{ $allocInfo->vehicle }}</label>
						</div>
					</div>
					@if($allocInfo->vehicle != $allocInfo->dispatchedVehicle)
					<div class="row mx-0 text-theme">
						<div class="col-12 form-group my-0">
							<label class="col-lg-6 label">Alternate Vehicle</label>
							<label class="col-lg-6" id="allocInfo[vehicle]">{{ $allocInfo->dispatchedVehicle }}</label>
						</div>
					</div>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<fieldset class="fieldset-group col-lg-6 small-text parent-cust-info">
		<legend>Customer Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Type</label>
					<label class="col-lg-8" id="custInfo[type]">{{ $allocInfo->custType }}</label>
				</div>
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="custInfo[address]">{{ $allocInfo->custAddress }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-4 label">Contact No</label>
					<label class="col-lg-8" id="custInfo[contactNo]">{{ $allocInfo->custContNo }}</label>
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 small-text">
		<legend>Driver Details</legend>

		<div class="form-group">

			@if($allocInfo->driverAddr)
				<div class="row">
					<div class="form-group col-lg-12">
						<label class="col-lg-6 label">Address</label>
						<label class="col-lg-6" id="driverInfo[address]">{{ $allocInfo->driverAddr }}</label>
					</div>
				</div>
			@endif

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-6 label">Contact No</label>
					<label class="col-lg-6" id="driverInfo[contact]">{{ $allocInfo->driverContNo }}</label>
				</div>
			</div>

		</div>
	</fieldset>
	
</div>

<div class="row">

	<fieldset class="fieldset-group col-lg-6 small-text">
		<legend>Trip Start Timings</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-lg-5" for="startDate">Start Date</label>
					<label class="col-lg-7" id="startDate">{{ $bookingInfo->travel_date }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-startTime col-lg-12 {{ $errors->tripSheenInfo->has('startTime') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="startTime">Start Time</label>
					<input type="text" class="form-control col-lg-7 time-picker" id="startTime" name="startTime" value="{{ $data['startTime'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('startTime'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('startTime') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 small-text">
		<legend>Trip Close Timings</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-endDate col-lg-12 {{ $errors->tripSheenInfo->has('endDate') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endDate">End Date</label>
					<input type="text" class="form-control col-lg-7 date-picker" id="endDate" name="endDate" value="{{ $data['endDate'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('endDate'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('endDate') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-endTime col-lg-12 {{ $errors->tripSheenInfo->has('endTime') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endTime">End Time</label>
					<input type="text" class="form-control col-lg-7 time-picker" id="endTime" name="endTime" value="{{ $data['endTime'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('endTime'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('endTime') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<fieldset class="fieldset-group col-lg-12 small-text">
		<legend>Charges Paid</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-tollCharges col-lg-6 {{ $errors->tripSheenInfo->has('tollCharges') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="tollCharges">Toll Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 number currency" id="tollCharges" name="tollCharges" value="{{ $data['tollCharges'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('tollCharges'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('tollCharges') }}</span>
					@endif
				</div>

				<div class="form-group parent-parkingCharges col-lg-6 {{ $errors->tripSheenInfo->has('parkingCharges') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="parkingCharges">Parking Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 number currency" id="parkingCharges" name="parkingCharges" value="{{ $data['parkingCharges'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('parkingCharges'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('parkingCharges') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-permitCharges col-lg-6 {{ $errors->tripSheenInfo->has('permitCharges') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="permitCharges">Permit Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 number currency" id="permitCharges" name="permitCharges" value="{{ $data['permitCharges'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('permitCharges'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('permitCharges') }}</span>
					@endif
				</div>

				<div class="form-group parent-taxPaid col-lg-6 {{ $errors->tripSheenInfo->has('taxPaid') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="taxPaid">Tax Paid (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 number currency" id="taxPaid" name="taxPaid" value="{{ $data['taxPaid'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('taxPaid'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('taxPaid') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-fuelCharges col-lg-6 {{ $errors->tripSheenInfo->has('fuelCharges') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="fuelCharges">Fuel Charges (&#8377;)</label>
					<input type="text" class="form-control col-lg-7 number currency" id="fuelCharges" name="fuelCharges" value="{{ $data['fuelCharges'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('fuelCharges'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('fuelCharges') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-dailyAllowance col-lg-6">
					<label class="col-lg-5" for="dailyAllowance">Daily Allowance (&#8377;)</label>
					<label class="col-lg-7" id="dailyAllowance">{{ isset($data['dailyAllowance']) ? $data['dailyAllowance'] : '0.00' }}</label>
				</div>

				<div class="form-group parent-nightAllowance col-lg-6">
					<label class="col-lg-5" for="nightAllowance">Night Allowance (&#8377;)</label>
					<label class="col-lg-7" id="nightAllowance">{{ isset($data['nightAllowance']) ? $data['nightAllowance'] : '0.00' }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-earlyDriveAllowance col-lg-6">
					<label class="col-lg-5" for="earlyDriveAllowance">Early Drive Allowance (&#8377;)</label>
					<label class="col-lg-7" id="earlyDriveAllowance">{{ isset($data['earlyDriveAllowance']) ? $data['earlyDriveAllowance'] : '0.00' }}</label>
				</div>

				<div class="form-group parent-outStnAllowance col-lg-6">
					<label class="col-lg-5" for="outStnAllowance">Outstation Allowance (&#8377;)</label>
					<label class="col-lg-7" id="outStnAllowance">{{ isset($data['outStnAllowance']) ? $data['outStnAllowance'] : '0.00' }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-lateNightAllowance col-lg-6">
					<label class="col-lg-5" for="lateNightAllowance">Late Night Allowance (&#8377;)</label>
					<label class="col-lg-7" id="lateNightAllowance">{{ isset($data['lateNightAllowance']) ? $data['lateNightAllowance'] : '0.00' }}</label>
				</div>

				<div class="form-group parent-holidayAllowance col-lg-6">
					<label class="col-lg-5" for="holidayAllowance">Holiday Allowance (&#8377;)</label>
					<label class="col-lg-7" id="holidayAllowance">{{ isset($data['holidayAllowance']) ? $data['holidayAllowance'] : '0.00' }}</label>
				</div>
			</div>

		</div>
	</fieldset>

</div>


<div class="row">

	<fieldset class="fieldset-group col-lg-6 small-text">
		<legend>Km Readings</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-startKm col-lg-12 {{ $errors->tripSheenInfo->has('startKm') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="startKm">Start km</label>
					<div class="input-group col-lg-7">
						<input type="text" class="form-control lakhs-format" id="startKm" name="startKm" value="{{ $data['startKm'] }}" {{ $disabledAttribute }} readonly="true">
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
					@if($errors->tripSheenInfo->has('startKm'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('startKm') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-endKm col-lg-12 {{ $errors->tripSheenInfo->has('endKm') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="endKm">End km</label>
					<input type="text" class="form-control col-lg-7 lakhs-format" id="endKm" name="endKm" value="{{ $data['endKm'] }}" {{ $disabledAttribute }}>
					@if($errors->tripSheenInfo->has('endKm'))
						<span class="help-block">{{ $errors->tripSheenInfo->first('endKm') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	@if($allocInfo->custPkgRateType)
		<fieldset class="fieldset-group col-lg-6 small-text parent-custPackage-info">
			<legend>Customer Package Details</legend>

			<div class="form-group">

				<div class="row parent-custPkg-pkg">
					<div class="form-group col-lg-12">
						<label class="col-lg-5 label">Package</label>
						<label class="col-lg-7" id="custPkgInfo[package]">
							<span class="text">{{ $allocInfo->package }}</span>
							<span class="float-right">
								@if($tripSheenInfo->canEditCustPkg && !$disableEditing)
									<a class="text-theme" id="btnAllowEditCustPkg" title="Edit">
										<i class="fas fa-pencil-alt"></i>
									</a>
								@endif
							</span>
						</label>
					</div>
				</div>

				@if($tripSheenInfo->canEditCustPkg)
					<div class="row parent-custPkg" style="display: none;">
						<div class="form-group col-lg-12 {{ $errors->tripSheenInfo->has('custPkg') ? 'has-error' : '' }} required-field">
							<label class="col-lg-5 label">Package</label>
							<select class="form-control col-lg-7 selectpicker" id="custPkg" name="custPkg" {{ $disabledAttribute }}>
								@foreach($custPkgList as $id => $name)
									<option value="{{ $id }}" {{ $id == $data['custPkg'] ? "selected" : "" }}>{{ $name }}</option>
								@endforeach
							</select>
							@if($errors->tripSheenInfo->has('custPkg'))
								<span class="help-block">{{ $errors->tripSheenInfo->first('custPkg') }}</span>
							@endif
						</div>
					</div>
				@endif

				<div class="row parent-custPkg-rateType">
					<div class="form-group col-lg-12">
						<label class="col-lg-5 label">Rate Type</label>
						<label class="col-lg-7" id="custPkgInfo[rateType]">{{ $allocInfo->custPkgRateType }}</label>
					</div>
				</div>

				<div class="row parent-custPkg-rate">
					<div class="form-group col-lg-12">
						<label class="col-lg-5 label">
							Rate (&#8377;)
						</label>
						<label class="col-lg-7" id="custPkgInfo[rate]">{{ $allocInfo->custPkgRate }}</label>
					</div>
				</div>

			</div>
		</fieldset>
	@endif

</div>

<div class="row small-text">

	<div class="form-group parent-extraKm col-lg-6 {{ $errors->tripSheenInfo->has('extraKm') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="extraKm">Extra KM</label>
		<input type="text" class="form-control col-lg-7 number lakhs-format" id="extraKm" name="extraKm" value="{{ $data['extraKm'] }}" {{ $disabledAttribute }} readonly>
		@if($errors->tripSheenInfo->has('extraKm'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('extraKm') }}</span>
		@endif
	</div>

	<div class="form-group parent-extraKmCharge col-lg-6 {{ $errors->tripSheenInfo->has('extraKmCharge') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="extraKmCharge">Extra KM Charges (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 number currency" id="extraKmCharge" name="extraKmCharge" value="{{ $data['extraKmCharge'] }}" {{ $disabledAttribute }} readonly>
		@if($errors->tripSheenInfo->has('extraKmCharge'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('extraKmCharge') }}</span>
		@endif
	</div>

</div>

<div class="row small-text">

	<div class="form-group parent-extraTime col-lg-6 {{ $errors->tripSheenInfo->has('extraTime') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="extraTime">Extra Time</label>
		<input type="text" class="form-control col-lg-7" id="extraTime" name="extraTime" value="{{ $data['extraTime'] }}" {{ $disabledAttribute }} readonly>
		@if($errors->tripSheenInfo->has('extraTime'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('extraTime') }}</span>
		@endif
	</div>

	<div class="form-group parent-extraTimeCharge col-lg-6 {{ $errors->tripSheenInfo->has('extraTimeCharge') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="extraTimeCharge">Extra Hour Charges (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 number currency" id="extraTimeCharge" name="extraTimeCharge" value="{{ $data['extraTimeCharge'] }}" {{ $disabledAttribute }} readonly>
		@if($errors->tripSheenInfo->has('extraTimeCharge'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('extraTimeCharge') }}</span>
		@endif
	</div>

</div>


<div class="row small-text">

	<div class="form-group parent-driverBata col-lg-6 {{ $errors->tripSheenInfo->has('driverBata') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="driverBata">Driver bata (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 number currency" id="driverBata" name="driverBata" value="{{ $data['driverBata'] }}" {{ $disabledAttribute }}>
		@if($errors->tripSheenInfo->has('driverBata'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('driverBata') }}</span>
		@endif
	</div>

	<div class="form-group parent-totalAmount col-lg-6 {{ $errors->tripSheenInfo->has('totalAmount') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="totalAmount">Total Amount (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 currency" id="totalAmount" name="totalAmount" value="{{ $data['totalAmount'] }}" {{ $disabledAttribute }}>
		@if($errors->tripSheenInfo->has('totalAmount'))
			<span class="help-block">{{ $errors->tripSheenInfo->first('totalAmount') }}</span>
		@endif

		@if(!$disableEditing)
		<div class="col-lg-12 mt-3">
			<div class="col-lg-6 float-left">&nbsp;</div>
			<div class="col-lg-6 float-left">
				<a class="btn" id="calcTotalAmount" title="">
					Calculate Total Amount
				</a>
			</div>
		</div>
		@endif
	</div>

</div>

<script type="text/javascript">
	var defaultTripSheetValues = {!! json_encode($data) !!};
	const VEHTYPEOWNED = {!! CODELIST_ALLOC_VEHICLE_TYPE_OWN_FLEET !!};
	const VEHTYPEOUTSRC = {!! CODELIST_ALLOC_VEHICLE_TYPE_OUTSOURCED !!};
	const START_KM_EDIT_CONF_MSG = "Start km run should not be changed for existing vehicles. The change will be logged for audit purposes. Do you want to continue?";
	const CUST_PKG_EDIT_CONF_MSG = "Package should not be changed after the booking. The change will be logged for audit purposes. Do you want to continue?";

	// Field IDs in the page
	const adjustmentFields = ['dailyAllowance', 'nightAllowance', 'earlyDriveAllowance', 
							'outStnAllowance', 'lateNightAllowance', 'holidayAllowance'];

	// Field column name from server
	const adjustmentFieldValues = ['dailyAllowance', 'nightAllowance', 'earlyDriveAllowance', 
								'outStnAllowance', 'lateNightAllowance', 'holidayAllowance'];
</script>