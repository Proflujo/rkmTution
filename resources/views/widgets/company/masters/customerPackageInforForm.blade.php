@php

	$customerPackageInfo = isset($customerPackageInfo) ? $customerPackageInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'customer' => old('customer') ? old('customer') : (isset($customerPackageInfo->customer) ? $customerPackageInfo->customer : ( isset($defaultValues['customer']) && $defaultValues['customer'] != null ? $defaultValues['customer'] : '')),
		'package' => old('package') ? old('package') : (isset($customerPackageInfo->package) ? $customerPackageInfo->package : ''),
		'vehSegment' => old('vehSegment') ? old('vehSegment') : (isset($customerPackageInfo->vehSegment) ? $customerPackageInfo->vehSegment : ''),
		'zone' => old('zone') ? old('zone') : (isset($customerPackageInfo->zone) ? $customerPackageInfo->zone : ''),
		'driverBata' => old('driverBata') ? old('driverBata') : (isset($customerPackageInfo->driverBata) ? $customerPackageInfo->driverBata : ''),
		'rateType' => old('rateType') ? old('rateType') : (isset($customerPackageInfo->rateType) ? $customerPackageInfo->rateType : ''),
		'flatRateCharge' => old('flatRateCharge') ? old('flatRateCharge') : (isset($customerPackageInfo->flatRateCharge) ? $customerPackageInfo->flatRateCharge : ''),
		'kmLimit' => old('kmLimit') ? old('kmLimit') : (isset($customerPackageInfo->kmLimit) ? $customerPackageInfo->kmLimit : ''),
		'addlKmCharge' => old('addlKmCharge') ? old('addlKmCharge') : (isset($customerPackageInfo->addlKmCharge) ? $customerPackageInfo->addlKmCharge : ''),
		'spillOver' => old('spillOver') ? old('spillOver') : (isset($customerPackageInfo->spillOver) ? $customerPackageInfo->spillOver : ''),
		'vehModelType' => old('vehModelType') ? old('vehModelType') : (isset($customerPackageInfo->vehModelType) ? $customerPackageInfo->vehModelType : ''),
		'minuteRounding' => old('minuteRounding') ? old('minuteRounding') : (isset($customerPackageInfo->minuteRounding) ? $customerPackageInfo->minuteRounding : ''),
		'minuteRoundBy' => old('minuteRoundBy') ? old('minuteRoundBy') : (isset($customerPackageInfo->minuteRoundBy) ? $customerPackageInfo->minuteRoundBy : ''),
	];

	$slabs 		= 		( old('slab') ? old('slab') : ( isset($slabs) ? $slabs : [] ) );
	$slabError 	= 		Session::has('slabError') ? Session::get('slabError') : [];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

@if(isset($customerPackageInfo->customer_package_id))
	<input type="hidden" id="customerPackageId" name="customerPackageId" value="{{ base64_encode($customerPackageInfo->customer_package_id) }}">
@endif
<input type="hidden" name="rates" id="rates"/>
<div class="row">

	<div class="form-group parent-customer col-lg-6 {{ $errors->customerPackageInfo->has('customer') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="customer">Customer</label>
		
		<input type="hidden" id="customer" name="customer" value="{{ $data['customer'] }}" />
		@if(isset($defaultValues["customerInfo"]) && $defaultValues["customerInfo"] != null)
			<input type="text" class="form-control col-lg-7" value="{{ $defaultValues['customerInfo']->name }}" readonly="true" />
		@else
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="customers" name="customers" disabled>
				<option></option>
				@foreach($customers as $custId => $custName)
					<option value="{{ $custId }}" {{ $custId == $data['customer'] ? "selected" : "" }}>{{ $custName }}</option>
				@endforeach
			</select>
		@endif
		
		@if($errors->customerPackageInfo->has('customer'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('customer') }}</span>
		@endif
	</div>

	<div class="form-group parent-package col-lg-6 {{ $errors->customerPackageInfo->has('package') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="package">Package</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="package" name="package" {{ $disabledAttribute }}>
			<option></option>
			@foreach($packages as $packageCode => $packageName)
				<option value="{{ $packageCode }}" {{ $packageCode == $data['package'] ? "selected" : "" }}>{{ $packageName }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('package'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('package') }}</span>
		@endif
	</div>

</div>

<div class="row">
<!-- 
	<fieldset class="fieldset-group col-lg-12 small-text parent-cust-info">
		<legend>Customer Details</legend>

		<div class="form-group">

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Type</label>
					<label class="col-lg-8" id="custInfo[type]"></label>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Address</label>
					<label class="col-lg-8" id="custInfo[address]"></label>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-lg-6">
					<label class="col-lg-4 label">Default Credit Days</label>
					<label class="col-lg-8" id="custInfo[defCredDays]"></label>
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
<!--
	<div class="form-group parent-vehSegment col-lg-6 {{ $errors->customerPackageInfo->has('vehSegment') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehSegment">Vehicle Segment</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehSegment" name="vehSegment" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleSegments as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehSegment'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('vehSegment'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('vehSegment') }}</span>
		@endif
	</div>
-->
	<div class="form-group parent-vehModelType col-lg-6 {{ $errors->customerPackageInfo->has('vehModelType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehModelType">Vehicle Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehModelType" name="vehModelType" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleTypeDescs as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehModelType'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('vehModelType'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('vehModelType') }}</span>
		@endif
	</div>
<!--	
	<div class="form-group parent-zone col-lg-6 {{ $errors->customerPackageInfo->has('zone') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="zone">Package Zone</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="zone" name="zone" {{ $disabledAttribute }}>
			<option></option>
			@foreach($zones as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['zone'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('zone'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('zone') }}</span>
		@endif
	</div>
-->
	<div class="form-group col-lg-6">
		<div class="row" style="margin-bottom: 0.5rem;">
			<div class="col-12">
				<span class="d-inline-block" style="padding-left: 15px; margin-right: 5px;">Round Down</span>
				<label class="switch">
					<input type="checkbox" id="minuteRounding" name="minuteRounding" value="{{ CUST_PKG_MINUTE_ROUND_UP }}" {{ $data['minuteRounding'] == CUST_PKG_MINUTE_ROUND_UP ? 'checked="true"' : '' }} {{ $disabledAttribute }}>
					<span class="slider round"></span>
				</label>
				<span>Up</span>
			</div>
		</div>
		<div class="row m-0">
			<div class="form-group col-12 {{ $errors->customerPackageInfo->has('minuteRoundBy') ? 'has-error' : '' }}">
				<span class="d-inline-block" style="padding-left: 15px; margin-right: 5px;">Round Up/Down by</span>
				<input type="text" class="form-control d-inline-block" id="minuteRoundBy" name="minuteRoundBy" value="{{ $data['minuteRoundBy'] }}" style="width: 60px; margin-right: 5px;" />
				<span>Minutes</span>
				@if($errors->customerPackageInfo->has('minuteRoundBy'))
					<span class="help-block">{{ $errors->customerPackageInfo->first('minuteRoundBy') }}</span>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group  col-lg-6">
		<span class="btn btn-primary" id="addRates">Add <i class="fa fa-plus"></i></span>
	</div>
</div>
<!--
<div class="row" style="display: none;">

	<div class="form-group parent-rateType col-lg-6 {{ $errors->customerPackageInfo->has('rateType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="rateType">Rate Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="rateType" name="rateType" {{ $disabledAttribute }}>
			<option></option>
			@foreach($rateTypes as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['rateType'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('rateType'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('rateType') }}</span>
		@endif
	</div>

	<div class="form-group parent-flatRateCharge col-lg-6 {{ $errors->customerPackageInfo->has('flatRateCharge') ? 'has-error' : '' }} required-field" style="display: none;">
		<label class="col-lg-5" for="flatRateCharge">
			<span class="labelTitle"></span>
			(&#8377;)
		</label>
		<input type="text" class="form-control currency col-lg-7" id="flatRateCharge" name="flatRateCharge" value="{{ $data['flatRateCharge'] }}" {{ $disabledAttribute }}>
		@if($errors->customerPackageInfo->has('flatRateCharge'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('flatRateCharge') }}</span>
		@endif
	</div>

</div>
-->
<div class="row parent-slabs" style="display: none;">

		<div class="form-group" style="padding: 0;">

			@if(!$disableEditing)
				<button type="button" class="btn mb-2" id="btnAddSlab">Add Slab <i class="fa fa-plus"></i></button>
			@endif

			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped small-text wrap-th">
					<thead>
						<tr>
							<th><span class="timeUnitTitle">Hourly</span> Limit <label class="error">*</label></th>
							<th>Km Limit <label class="error">*</label></th>
							<th>Slab Charge (&#8377;) <label class="error">*</label></th>
							<th>Extra km Charge (&#8377;)</th>
							<th colspan="2">Extra hour Charge (&#8377;)</th>
						</tr>
					</thead>
					<tbody>
						<tr class="placeholder text-danger text-center">
							<td colspan="6">No Data</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>

</div>

<div class="row" style="display: none;">

	<div class="form-group parent-driverBata col-lg-6 {{ $errors->customerPackageInfo->has('driverBata') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="driverBata">Driver Bata (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 currency" id="driverBata" name="driverBata" value="{{ $data['driverBata'] }}" {{ $disabledAttribute }}>
		@if($errors->customerPackageInfo->has('driverBata'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('driverBata') }}</span>
		@endif
	</div>

	<div class="form-group parent-kmLimit col-lg-6 {{ $errors->customerPackageInfo->has('kmLimit') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="kmLimit">
			<span class="labelTitle"></span>
		</label>
		<input type="text" class="form-control col-lg-7" id="kmLimit" name="kmLimit" value="{{ $data['kmLimit'] }}" {{ $disabledAttribute }}>
		@if($errors->customerPackageInfo->has('kmLimit'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('kmLimit') }}</span>
		@endif
	</div>

</div>

<div class="row" style="display: none;">

	<div class="form-group parent-addlKmCharge col-lg-6 {{ $errors->customerPackageInfo->has('addlKmCharge') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="addlKmCharge">Additional km Charge (&#8377;)</label>
		<input type="text" class="form-control col-lg-7 currency" id="addlKmCharge" name="addlKmCharge" value="{{ $data['addlKmCharge'] }}" {{ $disabledAttribute }}>
		@if($errors->customerPackageInfo->has('addlKmCharge'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('addlKmCharge') }}</span>
		@endif
	</div>

	<div class="form-group parent-spillOver col-lg-6 {{ $errors->customerPackageInfo->has('spillOver') ? 'has-error' : '' }} required-field" style="display: none;">
		<label class="col-lg-5" for="spillOver">Km Spill Over</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="spillOver" name="spillOver" {{ $disabledAttribute }}>
			<option></option>
			@foreach($spillOverList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['spillOver'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->customerPackageInfo->has('spillOver'))
			<span class="help-block">{{ $errors->customerPackageInfo->first('spillOver') }}</span>
		@endif
	</div>

</div>
<br>
<div class="row">
	@include("widgets.company.masters.packageRates")
</div>

<style type="text/css">

	.removedSlab
	{
		display: none;
	}

</style>

<script type="text/html" id="templateSlab">
	<tr class="slab">
		<td>
			<input type="hidden" id="slab_XYZslabNo" name="slab[_XYZ][slabNo]" {{ $disabledAttribute }}>
			<input type="hidden" class="is-removed" id="slab_XYZisRemoved" name="slab[_XYZ][isRemoved]" {{ $disabledAttribute }}>
			<input type="text" class="form-control" id="slab_XYZtimeUnitLimit" name="slab[_XYZ][timeUnitLimit]" {{ $disabledAttribute }}>
		</td>
		<td>
			<input type="text" class="form-control" id="slab_XYZkmLimit" name="slab[_XYZ][kmLimit]" {{ $disabledAttribute }}>
		</td>
		<td>
			<input type="text" class="form-control currency" id="slab_XYZslabCharge" name="slab[_XYZ][slabCharge]" {{ $disabledAttribute }}>
		</td>
		<td>
			<input type="text" class="form-control currency" id="slab_XYZextKmCharge" name="slab[_XYZ][extKmCharge]" {{ $disabledAttribute }}>
		</td>
		<td class="no-border-right padding-right-5">
			<input type="text" class="form-control currency" id="slab_XYZextHrCharge" name="slab[_XYZ][extHrCharge]" {{ $disabledAttribute }}>
		</td>
		<td class="no-border-left padding-right-5 padding-left-0">
			@if(!$disableEditing)
				<a class="btn-delete-slab" href="javascript:void(0);" title="Delete Slab">
					<i class="fa fa-times-circle"></i>
				</a>
			@endif
		</td>
	</tr>
</script>

<script type="text/javascript">
	const RATE_TYPE_SLABS = {!! CODELIST_CUST_PKG_RATE_TYPE_SLABS !!};
	const RATE_TYPE_MONTHLY = {!! CODELIST_CUST_PKG_RATE_TYPE_MONTHLY !!};
	const FLAT_CHARGE_LABEL = {
		'{!! CODELIST_CUST_PKG_RATE_TYPE_FLAT_PRICE !!}': 'Flat Charge',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_PER_HOUR_CHARGE !!}': 'Charge per hour',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_PER_DAY_CHARGE !!}': 'Charge per day',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_PER_KM_CHARGE !!}': 'Charge per km',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_MONTHLY !!}': 'Monthly Charge'
	};
	const KM_LIMIT_LABEL = {
		'{!! CODELIST_CUST_PKG_RATE_TYPE_PER_HOUR_CHARGE !!}' : 'Per hour km Limit',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_PER_DAY_CHARGE !!}' : 'Per day km Limit',
		'{!! CODELIST_CUST_PKG_RATE_TYPE_MONTHLY !!}' : 'Monthly km Limit'
	};
	const SLABS_TH_TIME_UNIT_TITLE = {
		'{!! CODELIST_PACKAGE_ZONE_LOCAL !!}': 'Hourly',
		'{!! CODELIST_PACKAGE_ZONE_OUT_STN !!}': 'Daily'
	};
	const DEFAULT_KM_LIMIT_LABEL = 'Km Limit';
	var slabs = {!! json_encode($slabs) !!};
	var slabError = {!! json_encode($slabError) !!};
</script>