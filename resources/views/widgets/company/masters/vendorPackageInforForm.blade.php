@php

	$vendorPackageInfo = isset($vendorPackageInfo) ? $vendorPackageInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'vendor' => old('vendor') ? old('vendor') : (isset($vendorPackageInfo->vendor) ? $vendorPackageInfo->vendor: ( isset($defaultValues['vendor']) && $defaultValues['vendor'] != null ? $defaultValues['vendor'] : '')),
		'package' => old('package') ? old('package') : (isset($vendorPackageInfo->package) ? $vendorPackageInfo->package : ''),
		'vehModelType' => old('vehModelType') ? old('vehModelType') : (isset($vendorPackageInfo->vehModelType) ? $vendorPackageInfo->vehModelType : ''),
		'spillOver' => old('spillOver') ? old('spillOver') : (isset($customerPackageInfo->spillOver) ? $vendorPackageInfo->spillOver : ''),
	];

	$slabs 		= 		( old('slab') ? old('slab') : ( isset($slabs) ? $slabs : [] ) );
	$slabError 	= 		Session::has('slabError') ? Session::get('slabError') : [];

	$isRateConvert = 'false';
	if(old('rates')){
		$ratesData = old('rates');
	}
	
	if( isset($rates) ){
		$ratesData = json_encode($rates);
		$isRateConvert = 'true';
	}
	
@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

@if(isset($vendorPackageInfo->vendor_package_id))
	<input type="hidden" id="vendorPackageId" name="vendorPackageId" value="{{ base64_encode($vendorPackageInfo->vendor_package_id) }}">
@endif
<input type="hidden" name="rates" id="rates"/>
<div class="row">

	<div class="form-group parent-vendor col-lg-6 {{ $errors->vendorPackageInfo->has('vendor') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vendor">Vendor</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vendor" name="vendor" disabled>
			<option></option>
			@foreach($vendors as $id => $vendorName)
				<option value="{{ $id }}" {{ $id == $data['vendor'] ? "selected" : "" }}>{{ $vendorName }}</option>
			@endforeach
		</select>

		@if($errors->vendorPackageInfo->has('vendor'))
			<span class="help-block">{{ $errors->vendorPackageInfo->first('vendor') }}</span>
		@endif
	</div>

	<div class="form-group parent-package col-lg-6 {{ $errors->vendorPackageInfo->has('package') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="package">Package</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="package" name="package" {{ $disabledAttribute }}>
			<option></option>
			@foreach($packages as $packageCode => $packageName)
				<option value="{{ $packageCode }}" {{ $packageCode == $data['package'] ? "selected" : "" }}>{{ $packageName }}</option>
			@endforeach
		</select>
		@if($errors->vendorPackageInfo->has('package'))
			<span class="help-block">{{ $errors->vendorPackageInfo->first('package') }}</span>
		@endif
	</div>

</div>

<div class="row">
	<div class="form-group parent-vehModelType col-lg-6 {{ $errors->vendorPackageInfo->has('vehModelType') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vehModelType">Vehicle Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehModelType" name="vehModelType" {{ $disabledAttribute }}>
			<option></option>
			@foreach($vehicleTypeDescs as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vehModelType'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->vendorPackageInfo->has('vehModelType'))
			<span class="help-block">{{ $errors->vendorPackageInfo->first('vehModelType') }}</span>
		@endif
	</div>
	<div class="form-group  col-lg-6">
		<span class="btn btn-primary" id="addRates">Add <i class="fa fa-plus"></i></span>
	</div>
</div>

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

<div class="row mt-4">
	<table class="table table-bordered table-hover table-striped small-text wrap-th" id="packageRates">
		<thead>
			<tr>
				<th rowspan="2" class="text-center">Vehicle Type</th>
				<th colspan="4" class="text-center">Per Day</th>
				<th colspan="4" class="text-center">Per Hour</th>
				<th class="text-center">Per KM</th>
				<th>Flat Rate</th>
				<th rowspan="2">Monthly</th>
				<th rowspan="2">Slabs</th>
				<th rowspan="2">Action</th>
			</tr>
			<tr>
				<th class="childHead text-left">Amount (&#8377;)</th>
				<th class="childHead text-left">Km Limit</th>
				<th class="childHead text-left">Extra Km (&#8377;)</th>
				<th class="childHead text-left">Driver Bata (&#8377;)</th>
				<th class="childHead text-left">Amount (&#8377;)</th>
				<th class="childHead text-left">Km Limit</th>
				<th class="childHead text-left">Extra Km (&#8377;)</th>
				<th class="childHead text-left">Driver Bata (&#8377;)</th>
				<th class="childHead text-left">Amount (&#8377;)</th>
				<th class="childHead text-left">Amount (&#8377;)</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-danger text-center nodata">
				<td colspan="14">No Data</td>
			</tr>
		</tbody>
	</table>
</div>

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
	var slabs = {!! json_encode($slabs) !!};
	var slabError = {!! json_encode($slabError) !!};

	var flatRate 	= {{CODELIST_CUST_PKG_RATE_TYPE_FLAT_PRICE}};
	var perHour  	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_HOUR_CHARGE}};
	var perDay 	 	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_DAY_CHARGE}};
	var perKM 	 	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_KM_CHARGE}};
	var slabRate 	= {{CODELIST_CUST_PKG_RATE_TYPE_SLABS}};
	
	var rateConvert = {{$isRateConvert}};
	
	var rates		= {};
	@if( isset($ratesData) )
		var rates 	  	= {!! $ratesData !!};
	@endif

	var slabsData	= {};
	@if( isset($slabs) )
		var slabsData 	= {!! json_encode($slabs) !!};
	@endif
</script>

<script type="text/html" id="rateTmpltAddRow">
	<tr class="rateType" data-vehType="">
		<td class="vehicle"></td>
        <td class="perday text-center" colspan="4" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_PER_DAY_CHARGE}}"><i class="fa fa-plus"></i></td>
        <td class="perhour text-center" colspan="4" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_PER_HOUR_CHARGE}}"><i class="fa fa-plus"></i></td>
        <td class="perkm text-center" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_PER_KM_CHARGE}}"><i class="fa fa-plus"></i></td>
        <td class="flatrate text-center" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_FLAT_PRICE}}"><i class="fa fa-plus"></i></td>
        <td class="monthrate text-center" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_MONTHLY}}"><i class="fa fa-plus"></i></td>
        <td class="slabrate text-center" data-rateType="{{CODELIST_CUST_PKG_RATE_TYPE_SLABS}}"><i class="fa fa-plus"></i></td>
        <td class="removeVeh text-center"><i class="fa fa-times-circle"></i></td>
	</tr>
</script>

<script type="text/html" id="ratesForm">
    <form id="ratesInfo">

    	<div class="row">
            <div class="col-lg-12">
                <input type="hidden" id="vehicleType" class="vehicleType" value=""/>
                <input type="hidden" id="rateType" class="rateType" value=""/>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12">
    			<div class="form-group">
                    <label class="col-lg-4">Vehicle Name</label>
                    <input type="text" class="form-control col-lg-6" id="vehName" name="vehName" value="" disabled>
    			</div>
        	</div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12">
    			<div class="form-group">
                    <label class="col-lg-4">Rate Type</label>
                    <input type="text" class="form-control col-lg-6" id="rateTypeName" name="rateTypeName" value="" disabled>
    			</div>
        	</div>
        </div>

    	<div class="row mt-1">
            <div class="col-lg-12">
    			<div class="form-group required-field">
                    <label class="col-lg-4" for="amount">Amount (&#8377;)</label>
                    <input type="text" class="form-control currency col-lg-6" id="amount" name="amount" value="" >
    			</div>
        	</div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12 kmlimit-parent">
                <div class="form-group required-field">
                    <label class="col-lg-4" for="kmlimit">Km Limit</label>
                    <input type="number" class="form-control col-lg-6" id="kmlimit" name="kmlimit" value="" >
    			</div>
        	</div>
        </div>

        <div class="row mt-1">
            <div class="col-lg-12 extrakm-parent">
    			<div class="form-group required-field">
                    <label class="col-lg-4" for="extrakm">Extra km (&#8377;)</label>
                    <input type="text" class="form-control currency col-lg-6" id="extrakm" name="extrakm" value="" >
    			</div>
        	</div>
        </div>

        <div class="row mt-1 extradays-parent" style="display: none;">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="col-lg-4" for="dayslimit">Day(s) Limit</label>
                    <input type="number" class="form-control col-lg-6" id="dayslimit" name="dayslimit" value="" >
    			</div>
        	</div>
        </div>

        <div class="row mt-1 extradays-parent" style="display: none;">
            <div class="col-lg-12">
    			<div class="form-group">
                    <label class="col-lg-4" for="extradays">Extra Day(s) (&#8377;)</label>
                    <input type="text" class="form-control currency col-lg-6" id="extradays" name="extradays" value="" >
    			</div>
        	</div>
        </div>

        <div class="row mt-1">
			<div class="col-lg-12 driverbata-parent">
				<div class="form-group">
					<label class="col-lg-4" for="driverbata">Driver Bata (&#8377;)</label>
                    <input type="text" class="form-control currency col-lg-6" id="driverbata" name="driverbata" value="" >
				</div>
            </div>
        </div>

        <div class="row mt-1">
			<div class="col-lg-12 spillOver-parent">
				<div class="form-group">
					<label class="col-lg-4" for="driverbata">Spill Over</label>
                    <select class="form-control col-lg-6" id="spillOver" name="spillOver">
                        @foreach($spillOverList as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
				</div>
            </div>
        </div>

	</form>
</script>
