@php

	$allocInfo = isset($allocInfo) ? $allocInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];
	$rawCustomerType	=	isset($bookingInfo->rawCustomerType)?$bookingInfo->rawCustomerType:0;
	$data = 
	[
		'vehType' => old('vehType') ? old('vehType') : ( isset($allocInfo->vehType) ? $allocInfo->vehType : (isset($defaultValues['vehType']) ? $defaultValues['vehType'] : '') ),
		'driver' => old('driver') ? old('driver') : ( isset($allocInfo->driver) ? $allocInfo->driver : (isset($defaultValues['driver']) ? $defaultValues['driver'] : '') ),
		'vehicle' => old('vehicle') ? old('vehicle') : ( isset($allocInfo->vehicle) ? $allocInfo->vehicle : (isset($defaultValues['vehicle']) ? $defaultValues['vehicle'] : '') ),
		'status' => old('status') ? old('status') : ( isset($allocInfo->status) ? $allocInfo->status : (isset($defaultValues['status']) ? $defaultValues['status'] : '') ),

		'outSrcDriverName' => old('outSrcDriverName') ? old('outSrcDriverName') : ( isset($allocInfo->outSrcDriverName) ? $allocInfo->outSrcDriverName : (isset($defaultValues['outSrcDriverName']) ? $defaultValues['outSrcDriverName'] : '') ),
		'outSrcDriverMobile' => old('outSrcDriverMobile') ? old('outSrcDriverMobile') : ( isset($allocInfo->outSrcDriverMobile) ? $allocInfo->outSrcDriverMobile : (isset($defaultValues['outSrcDriverMobile']) ? $defaultValues['outSrcDriverMobile'] : '') ),
		'outSrcVehRegn' => old('outSrcVehRegn') ? old('outSrcVehRegn') : ( isset($allocInfo->outSrcVehRegn) ? $allocInfo->outSrcVehRegn : (isset($defaultValues['outSrcVehRegn']) ? $defaultValues['outSrcVehRegn'] : '') ),
		'outSrcVendor' => old('outSrcVendor') ? old('outSrcVendor') : ( isset($allocInfo->outSrcVendor) ? $allocInfo->outSrcVendor : (isset($defaultValues['outSrcVendor']) ? $defaultValues['outSrcVendor'] : '') ),
		'outSrcDcOVehRegn' => old('outSrcDcOVehRegn') ? old('outSrcDcOVehRegn') : '',
		'outSrcDcODriverName' => old('outSrcDcODriverName') ? old('outSrcDcODriverName') : '',
		'outSrcDcoDriverMobile' => old('outSrcDcoDriverMobile') ? old('outSrcDcoDriverMobile') : '',

		'inclNonDedicated' => old('inclNonDedicated') ? old('inclNonDedicated') : ( isset($allocInfo->inclNonDedicated) ? $allocInfo->inclNonDedicated : (isset($defaultValues['inclNonDedicated']) ? $defaultValues['inclNonDedicated'] : '') ),
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

@if(isset($allocInfo->allocation_id))
	<input type="hidden" name="allocId" value="{{ base64_encode($allocInfo->allocation_id) }}">
@elseif(isset($bookingInfo->bookingDetailId))
	<input type="hidden" name="bookingDetailId" value="{{ base64_encode($bookingInfo->bookingDetailId) }}">
@endif
<input type="hidden" id="allocStatus" value="{{ $data['status'] }}">

<div class="row row-veh-owned-book-info">

	<fieldset class="fieldset-group col-lg-12 small-text">
		<legend>Booking Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="label col-5">Customer</label>
					<label class="col-7" id="bookingInfo[customer]">{{ $bookingInfo->customer }}</label>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="col-5 label">Branch</label>
					<label class="col-7" id="bookingInfo[branch]">{{ $bookingInfo->branch }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="col-5 label">Travel Date</label>
					<label class="col-7" id="bookingInfo[travelDate]">{{ $bookingInfo->travel_date }}</label>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="col-5 label">Reporting Time</label>
					<label class="col-7" id="bookingInfo[reportingTime]">{{ $bookingInfo->reporting_time }}</label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="col-5 label">Vehicle Type</label>
					<label class="col-7" id="bookingInfo[vehicleType]">{{ $bookingInfo->typeDesc }}</label>
				</div>
				<div class="form-group col-lg-6 col-md-6 col-sm-6">
					<label class="col-5 label">Pickup Point</label>
					<label class="col-7" id="bookingInfo[pickupPoint]">{{ $bookingInfo->pickup_point }}</label>
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">

	<div class="form-group parent-vehType col-lg-6 col-md-6 col-sm-6 {{ $errors->allocInfo->has('vehType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehType">Vehicle Ownership</label>
		<select class="form-control col-lg-7 selectpicker" id="vehType" name="vehType" {{ $disabledAttribute }}>
			@foreach($allocVehTypes as $id => $name)
				@if( ($id != CODELIST_ALLOC_VEHICLE_TYPE_DEDICATED) || $rawCustomerType	==	CODELIST_CUSTOMER_TYPE_CORPORATE)
					<option value="{{ $id }}" {{ $id == $data['vehType'] ? "selected" : "" }}>{{ $name }}</option>
				@endif
			@endforeach
		</select>
		@if($errors->allocInfo->has('vehType'))
			<span class="help-block">{{ $errors->allocInfo->first('vehType') }}</span>
		@endif
	</div>

	<div class="form-group parent-status col-lg-6 col-md-6 col-sm-6 {{ $errors->allocInfo->has('status') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="status">Allocation Status</label>
		<select class="form-control col-lg-7 selectpicker" id="status" name="status" {{ $disabledAttribute }}>
			@foreach($allocStatusList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['status'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->allocInfo->has('status'))
			<span class="help-block">{{ $errors->allocInfo->first('status') }}</span>
		@endif
	</div>

</div>

<div class="row row-veh-owned" style="display: none;">
	
	<div class="form-group parent-vehicle col-lg-6 col-md-6 col-sm-6 {{ $errors->allocInfo->has('vehicle') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehicle">Vehicle</label>
		<select class="form-control col-lg-7 selectpicker" id="vehicle" name="vehicle" {{ $disabledAttribute }}>
			@foreach($vehicles as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehicle'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->allocInfo->has('vehicle'))
			<span class="help-block">{{ $errors->allocInfo->first('vehicle') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6 col-md-6 col-sm-6">
		<div class="row m-0 parent-driver {{ $errors->allocInfo->has('driver') ? 'has-error' : '' }} required-field">
			<label class="col-lg-5" for="driver">Driver</label>
			<select class="form-control col-lg-7 selectpicker" id="driver" name="driver" {{ $disabledAttribute }}>
				@foreach($drivers as $id => $name)
					<option value="{{ $id }}" {{ $id == $data['driver'] ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			</select>
			@if($errors->allocInfo->has('driver'))
				<span class="help-block">{{ $errors->allocInfo->first('driver') }}</span>
			@endif
		</div>
		<div class="row ml-3 parent-inclNonDedicated" style="display: none;">
			<div class="custom-control custom-checkbox col-lg-12">
				<input type="checkbox" class="custom-control-input" id="inclNonDedicated" name="inclNonDedicated" value="yes" {{ $data['inclNonDedicated'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
				<label class="custom-control-label" for="inclNonDedicated">Show All Drivers</label>
			</div>
		</div>
	</div>

</div>

<div class="row row-veh-outsrc" style="display: none;">
	
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
				<div class="form-group parent-outSrcVehRegn col-lg-12 {{ $errors->allocInfo->has('outSrcVehRegn') ? 'has-error' : '' }} required-field">
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
					@if($errors->allocInfo->has('outSrcVehRegn'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcVehRegn') }}</span>
					@endif
				</div>
				<div class="form-group parent-outSrcVendor col-lg-12 {{ $errors->allocInfo->has('outSrcVendor') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcVendor">Vendor</label>
					<input type="hidden" id="outSrcVendor" name="outSrcVendor" value="{{ $data['outSrcVendor'] }}" />
					<span class="form-control col-lg-7" id="txtOutSrcVendor">{{ ( $data['outSrcVendor'] && $outSrcVendors ? $outSrcVendors[$data['outSrcVendor']] : '' ) }}</span>
					@if($errors->allocInfo->has('outSrcVendor'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcVendor') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Driver</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-outSrcDriverName col-lg-12 {{ $errors->allocInfo->has('outSrcDriverName') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDriverName">Name</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDriverName" name="outSrcDriverName" value="{{ $data['outSrcDriverName'] }}" {{ $disabledAttribute }}>
					@if($errors->allocInfo->has('outSrcDriverName'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcDriverName') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcDriverMobile col-lg-12 {{ $errors->allocInfo->has('outSrcDriverMobile') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDriverMobile">Phone</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDriverMobile" name="outSrcDriverMobile" value="{{ $data['outSrcDriverMobile'] }}" {{ $disabledAttribute }}>
					@if($errors->allocInfo->has('outSrcDriverMobile'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcDriverMobile') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	
</div>

<div class="row row-veh-owned-info hide" style="display: none;">
	
	
	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6 small-text">
		<legend>Vehicle Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Vendor</label>
					<label class="col-7" id="vehicleInfo[vendor]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Model</label>
					<label class="col-7" id="vehicleInfo[model]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Location</label>
					<label class="col-7" id="vehicleInfo[location]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Kms Run</label>
					<label class="col-7" id="vehicleInfo[kmsRun]"></label>
				</div>
			</div>

		</div>
	</fieldset>
	
	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6 small-text">
		<legend>Driver Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Name</label>
					<label class="col-7" id="driverInfo[name]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Address</label>
					<label class="col-7" id="driverInfo[address]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Contact No</label>
					<label class="col-7" id="driverInfo[contact]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-12">
					<label class="col-5 label">Emergency Contact No</label>
					<label class="col-7" id="driverInfo[emergContact]"></label>
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
				<div class="form-group parent-outSrcDcOVehRegn col-lg-12 {{ $errors->allocInfo->has('outSrcDcOVehRegn') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcOVehRegn">Reg. No</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcOVehRegn" name="outSrcDcOVehRegn" value="{{ $data['outSrcDcOVehRegn'] }}" {{ $disabledAttribute }}>
					@if($errors->allocInfo->has('outSrcDcOVehRegn'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcDcOVehRegn') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

	<fieldset class="fieldset-group col-lg-6 col-md-6 col-sm-6">
		<legend>Driver</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group parent-outSrcDcODriverName col-lg-12 {{ $errors->allocInfo->has('outSrcDcODriverName') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcODriverName">Name</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcODriverName" name="outSrcDcODriverName" value="{{ $data['outSrcDcODriverName'] }}" {{ $disabledAttribute }}>
					@if($errors->allocInfo->has('outSrcDcODriverName'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcDcODriverName') }}</span>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="form-group parent-outSrcDcoDriverMobile col-lg-12 {{ $errors->allocInfo->has('outSrcDcoDriverMobile') ? 'has-error' : '' }} required-field">
					<label class="col-lg-5" for="outSrcDcoDriverMobile">Phone</label>
					<input type="text" class="form-control col-lg-7" id="outSrcDcoDriverMobile" name="outSrcDcoDriverMobile" value="{{ $data['outSrcDcoDriverMobile'] }}" {{ $disabledAttribute }}>
					@if($errors->allocInfo->has('outSrcDcoDriverMobile'))
						<span class="help-block">{{ $errors->allocInfo->first('outSrcDcoDriverMobile') }}</span>
					@endif
				</div>
			</div>

		</div>
	</fieldset>

</div>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6">
		@if(!isset($allocInfo->allocation_id) && !$disableEditing)
			@include("widgets.company.sendNotificationToCustomerFields")
		@endif
	</div>
</div>

<script type="text/javascript">
	var defaultallocInfoValues = {!! json_encode($data) !!};
	const bookingInfo = {!! json_encode($bookingInfo) !!};
	@if(isset($allocInfo->allocation_id))
		const allocInfo = {!! json_encode($allocInfo) !!};
	@endif
	const VEHTYPEOWNED = {!! CODELIST_ALLOC_VEHICLE_TYPE_OWN_FLEET !!};
	const VEHTYPEDEDICATED = {!! CODELIST_ALLOC_VEHICLE_TYPE_DEDICATED !!};
	const VEHTYPEOUTSRC = {!! CODELIST_ALLOC_VEHICLE_TYPE_OUTSOURCED !!};
	const VEHTYPEOUTSRC_DVRCUMOWNER = {!! CODELIST_ALLOC_VEHICLE_TYPE_OUTSOURCED_DVR_CUM_OWNER !!};
</script>
