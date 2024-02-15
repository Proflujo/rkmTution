@php

	$purchaseInfo = isset($purchaseInfo) ? $purchaseInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'purchaseId' => old('purchaseId') ? old('purchaseId') : ( isset($purchaseInfo->purchaseId) ? $purchaseInfo->purchaseId : (isset($defaultValues['purchaseId']) ? $defaultValues['purchaseId'] : '') ),
		'purchaseNo' => old('purchaseNo') ? old('purchaseNo') : ( isset($purchaseInfo->purchaseNo) ? $purchaseInfo->purchaseNo : (isset($defaultValues['purchaseNo']) ? $defaultValues['purchaseNo'] : '') ),
		'date' => old('date') ? old('date') : ( isset($purchaseInfo->date) ? $purchaseInfo->date : (isset($defaultValues['date']) ? $defaultValues['date'] : '') ),
		'vendor' => old('vendor') ? old('vendor') : ( isset($purchaseInfo->vendor) ? $purchaseInfo->vendor : (isset($defaultValues['vendor']) ? $defaultValues['vendor'] : '') ),
		'tripCharge' => old('tripCharge') ? old('tripCharge') : ( isset($purchaseInfo->tripCharge) ? $purchaseInfo->tripCharge : (isset($defaultValues['tripCharge']) ? $defaultValues['tripCharge'] : '') ),
		'extraCharges' => old('extraCharges') ? old('extraCharges') : ( isset($purchaseInfo->extraCharges) ? $purchaseInfo->extraCharges : (isset($defaultValues['extraCharges']) ? $defaultValues['extraCharges'] : '') ),
		'grandTotal' => old('grandTotal') ? old('grandTotal') : ( isset($purchaseInfo->grandTotal) ? $purchaseInfo->grandTotal : (isset($defaultValues['grandTotal']) ? $defaultValues['grandTotal'] : '') ),
		'paymentStatus' => old('paymentStatus') ? old('paymentStatus') : ( isset($purchaseInfo->paymentStatus) ? $purchaseInfo->paymentStatus : (isset($defaultValues['paymentStatus']) ? $defaultValues['paymentStatus'] : '') ),
		'packageName' => old('packageName') ? old('packageName') : ( isset($purchaseInfo->pkgIdRateType) ? $purchaseInfo->pkgIdRateType : (isset($defaultValues['packageName']) ? $defaultValues['packageName'] : '') ),
		'vehicleType' => old('vehicleType') ? old('vehicleType') : ( isset($purchaseInfo->vehicleType) ? $purchaseInfo->vehicleType : (isset($defaultValues['vehicleType']) ? $defaultValues['vehicleType'] : '') ),
		'vehicleName' => old('vehicleName') ? old('vehicleName') : ( isset($purchaseInfo->vehicle) ? $purchaseInfo->vehicle : (isset($defaultValues['vehicleName']) ? $defaultValues['vehicleName'] : '') ),
		'driverBata' => old('driverBata') ? old('driverBata') : ( isset($purchaseInfo->driverBata) ? $purchaseInfo->driverBata : (isset($defaultValues['driverBata']) ? $defaultValues['driverBata'] : '') ),
	];

	$tripSheets = old('tripSheets') ? old('tripSheets') : ( isset($tripSheets) ? $tripSheets : [] );
	if($paymentStatList[$data['paymentStatus']]	==	"Fully Paid") {
		$disableEditing	=	true;
		$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	}
	
@endphp

@section('datetimepicker', true)
@section('selectpicker', true)
@section('datatables',true)

<div class="row">

	<div class="form-group parent-purchaseNo col-lg-6 {{ $errors->purchaseInfo->has('purchaseNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="purchaseNo">Purchase #</label>
		<input type="text" class="form-control col-lg-7" id="purchaseNo" name="purchaseNo" value="{{ $data['purchaseNo'] }}" {{ $disabledAttribute }} disabled>
		<input type="hidden" id="purchaseId" name="purchaseId" value="{{ $data['purchaseId'] }}" />
		@if($errors->purchaseInfo->has('purchaseNo'))
			<span class="help-block">{{ $errors->purchaseInfo->first('purchaseNo') }}</span>
		@endif
	</div>

	<div class="form-group parent-date col-lg-6 {{ $errors->purchaseInfo->has('date') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="date">Date</label>
		<input type="text" class="form-control date-picker col-lg-7" id="date" name="date" value="{{ $data['date'] }}" {{ $disabledAttribute }} readonly="true" disabled >
		@if($errors->purchaseInfo->has('date'))
			<span class="help-block">{{ $errors->purchaseInfo->first('date') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-vendor col-lg-6 {{ $errors->purchaseInfo->has('vendor') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="vendor">Vendor</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vendor" name="vendor" {{ $disabledAttribute }} readonly="true" disabled >
			<option></option>
			@foreach($vendorsList as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['vendor'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->purchaseInfo->has('vendor'))
			<span class="help-block">{{ $errors->purchaseInfo->first('vendor') }}</span>
		@endif
	</div>

	<div class="form-group parent-paymentStatus col-lg-6">
		<label class="col-lg-5" for="paymentStatus">Payment Status</label>
		<input type="text" class="form-control col-lg-7" id="txtPayStat" name="txtPayStat" value="{{ $paymentStatList[$data['paymentStatus']] }}" readonly="true"   disabled {{ $disabledAttribute }}>
	</div>

</div>

<div class="row">

	<div class="col-lg-6">
		<div class="row">
			<!-- Package Name Field  -->
			<div class="form-group parent-packageName col-lg-12 {{ $errors->purchaseInfo->has('packageName') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="packageName">Package</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="packageName" name="packageName" {{ $disabledAttribute }}>
					@if(isset($vendorPackages))
						@foreach($vendorPackages as $id => $name)
							<option value="{{ $id }}" {{ $id == $data['vendor'] ? "selected" : "" }}>{{ $name }}</option>
						@endforeach
					@endif
				</select>
				@if($errors->purchaseInfo->has('packageName'))
					<span class="help-block">{{ $errors->purchaseInfo->first('packageName') }}</span>
				@endif
			</div>	
			 <!-- Vehicle Type Field  -->
			<div class="form-group parent-vehicleType col-lg-12 {{ $errors->purchaseInfo->has('vehicleType') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="vehicleType">Vehicle Type</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleType" name="vehicleType" {{ $disabledAttribute }}>
					<!-- @foreach($vendorsList as $id => $name)
						<option value="{{ $id }}" {{ $id == $data['vendor'] ? "selected" : "" }}>{{ $name }}</option>
					@endforeach -->
				</select>
				@if($errors->purchaseInfo->has('vehicleType'))
					<span class="help-block">{{ $errors->purchaseInfo->first('vehicleType') }}</span>
				@endif
			</div>
			<!-- Vehicle Name Field  -->
			<div class="form-group parent-vehicleName col-lg-12 {{ $errors->purchaseInfo->has('vehicleName') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="vehicleName">Vehicle</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="vehicleName" name="vehicleName" {{ $disabledAttribute }}>
					<!-- @foreach($vendorsList as $id => $name)
						<option value="{{ $id }}" {{ $id == $data['vendor'] ? "selected" : "" }}>{{ $name }}</option>
					@endforeach -->
				</select>
				@if($errors->purchaseInfo->has('vehicleName'))
					<span class="help-block">{{ $errors->purchaseInfo->first('vehicleName') }}</span>
				@endif
			</div>
			<!-- Driver Bata Field  -->
			<div class="form-group parent-driverBata col-lg-12 {{ $errors->purchaseInfo->has('driverBata') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="driverBata">Driver Bata</label>
				<input type="text" class="form-control col-lg-7 currency purchase_calc" id="driverBata" name="driverBata" value="" {{ $disabledAttribute }} >
				<input type="hidden"  id="hiddenVenPkgId" name="hiddenVenPkgId" value="" >
				@if($errors->purchaseInfo->has('driverBata'))
					<span class="help-block">{{ $errors->purchaseInfo->first('driverBata') }}</span>
				@endif
			</div>		
		</div>
	</div>

	<div class="col-lg-6">
		<div class="row">

			<div class="form-group parent-tripCharge col-lg-12 {{ $errors->purchaseInfo->has('tripCharge') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="tripCharge">Trip Charges (&#8377;)</label>
				<input type="text" class="form-control col-lg-7 currency  purchase_calc" id="tripCharge" name="tripCharge" value="{{ $data['tripCharge'] }}" {{ $disabledAttribute }}>
				@if($errors->purchaseInfo->has('tripCharge'))
					<span class="help-block">{{ $errors->purchaseInfo->first('tripCharge') }}</span>
				@endif
			</div>

			<div class="form-group parent-extraCharges col-lg-12 {{ $errors->purchaseInfo->has('extraCharges') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="extraCharges">Extra Charges (&#8377;)</label>
				<input type="text" class="form-control col-lg-7 currency purchase_calc" id="extraCharges" name="extraCharges" value="{{ $data['extraCharges'] }}" {{ $disabledAttribute }} >
				@if($errors->purchaseInfo->has('extraCharges'))
					<span class="help-block">{{ $errors->purchaseInfo->first('extraCharges') }}</span>
				@endif
			</div>

			<div class="form-group col-lg-12" id="taxList">
				@if(isset($taxes) && !empty($taxes))
					@foreach($taxes as $tax)
						<div class="form-group col-lg-12 tax-rate-{{ $tax->tax_id }}" data-tax-id="{{ $tax->tax_id }}">
							<label class="col-lg-5">{{ $tax->tax_name }} @ {{ $tax->rate }}% (&#8377;)</label>
							<label class="col-lg-7 rate">0</label>
						</div>
					@endforeach
				@endif
			</div>

			<div class="form-group parent-grandTotal col-lg-12 {{ $errors->purchaseInfo->has('grandTotal') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="grandTotal">Grand Total (&#8377;)</label>
				<input type="text" class="form-control col-lg-7 currency" id="grandTotal" name="grandTotal" value="{{ $data['grandTotal'] }}" {{ $disabledAttribute }} readonly="true"  disabled>
				@if($errors->purchaseInfo->has('grandTotal'))
					<span class="help-block">{{ $errors->purchaseInfo->first('grandTotal') }}</span>
				@endif
			</div>

			<div class="form-group parent-amountInWord col-lg-12">
				<label class="col-lg-5" for="amountInWord">Grand Total (In Words)</label>
				<input type="text" class="form-control col-lg-7 currency" id="amountInWord" name="amountInWord" value="" {{ $disabledAttribute }} readonly="true"  disabled>
				@if($errors->purchaseInfo->has('amountInWord'))
					<span class="help-block">{{ $errors->purchaseInfo->first('amountInWord') }}</span>
				@endif
			</div>

		</div>
	</div>

</div>

<script type="text/javascript">
	var purchaseData = {!! json_encode($data) !!};
</script>
