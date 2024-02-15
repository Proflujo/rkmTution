@php

	$invoiceInfo = isset($invoiceInfo) ? $invoiceInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'invId' => old('invId') ? old('invId') : ( isset($invoiceInfo->invId) ? $invoiceInfo->invId : (isset($defaultValues['invId']) ? $defaultValues['invId'] : '') ),
		'invNo' => old('invNo') ? old('invNo') : ( isset($invoiceInfo->invNo) ? $invoiceInfo->invNo : (isset($defaultValues['invNo']) ? $defaultValues['invNo'] : '') ),
		'date' => old('date') ? old('date') : ( isset($invoiceInfo->date) ? $invoiceInfo->date : (isset($defaultValues['date']) ? $defaultValues['date'] : '') ),
		'customer' => old('customer') ? old('customer') : ( isset($invoiceInfo->customer) ? $invoiceInfo->customer : (isset($defaultValues['customer']) ? $defaultValues['customer'] : '') ),
		'vehCharges' => old('vehCharges') ? old('vehCharges') : ( isset($invoiceInfo->vehCharges) ? $invoiceInfo->vehCharges : (isset($defaultValues['vehCharges']) ? $defaultValues['vehCharges'] : '') ),
		'extCharges' => old('extCharges') ? old('extCharges') : ( isset($invoiceInfo->extCharges) ? $invoiceInfo->extCharges : (isset($defaultValues['extCharges']) ? $defaultValues['extCharges'] : '') ),
		'discountType' => old('discountType') ? old('discountType') : ( isset($invoiceInfo->discountType) ? $invoiceInfo->discountType : (isset($defaultValues['discountType']) ? $defaultValues['discountType'] : '') ),
		'discAmount' => old('discAmount') ? old('discAmount') : ( isset($invoiceInfo->discAmount) ? $invoiceInfo->discAmount : (isset($defaultValues['discAmount']) ? $defaultValues['discAmount'] : '') ),
		'grandTotal' => old('grandTotal') ? old('grandTotal') : ( isset($invoiceInfo->grandTotal) ? $invoiceInfo->grandTotal : (isset($defaultValues['grandTotal']) ? $defaultValues['grandTotal'] : '') ),
		'paymentStatus' => old('paymentStatus') ? old('paymentStatus') : ( isset($invoiceInfo->paymentStatus) ? $invoiceInfo->paymentStatus : (isset($defaultValues['paymentStatus']) ? $defaultValues['paymentStatus'] : '') ),
		'tripCategory' => old('tripCategory') ? old('tripCategory') : ( isset($invoiceInfo->tripCategories) && !empty($invoiceInfo->tripCategories) ? explode(",", $invoiceInfo->tripCategories) : (isset($defaultValues['tripCategory']) ? $defaultValues['tripCategory'] : '') ),
		'invoiceTo' => old('invoiceTo') ? old('invoiceTo') : ( isset($invoiceInfo->invoiceTo) ? $invoiceInfo->invoiceTo : (isset($defaultValues['invoiceTo']) ? $defaultValues['invoiceTo'] : '') ),
	];

	$tripSheets = old('tripSheets') ? old('tripSheets') : ( isset($tripSheets) ? $tripSheets : [] );
	$oldAdditionalAmounts = old('additionalAmounts') ? old('additionalAmounts') : [];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)
@section('datatables',true)

<div class="row">

	<div class="form-group parent-invNo col-lg-6 {{ $errors->invoiceInfo->has('invNo') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="invNo">Inv #</label>
		<div class="input-group col-lg-7">
			<input type="text" class="form-control" id="invNo" name="invNo" value="{{ $data['invNo'] }}" readonly {{ $disabledAttribute }}>
			@if($changeInvoiceNo ?? false)
				<div class="input-group-append">
					<a class="input-group-btn" id="btnChangeInvNo" title="Edit">
						<i class="fas fa-pencil-alt"></i>
					</a>
				</div>
			@endif
		</div>
		@if($errors->invoiceInfo->has('invNo'))
			<span class="help-block">{{ $errors->invoiceInfo->first('invNo') }}</span>
		@endif
	</div>

	<div class="form-group parent-tripCategory col-lg-6 {{ $errors->invoiceInfo->has('tripCategory') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="tripCategory">Trip Category</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="tripCategory" name="tripCategory[]" multiple data-stay-opened="true" {{ $disabledAttribute }}>
			<option></option>
			@if(isset($cdlTripCategories) && !empty($cdlTripCategories))
				@foreach($cdlTripCategories as $id => $name)
					<option value="{{ $id }}" {{ (is_array($data['tripCategory']) ? in_array($id, $data['tripCategory']) : $id == $data['tripCategory']) ? "selected" : "" }}>{{ $name }}</option>
				@endforeach
			@endif
		</select>
		@if($errors->invoiceInfo->has('tripCategory'))
			<span class="help-block">{{ $errors->invoiceInfo->first('tripCategory') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-date col-lg-6 {{ $errors->invoiceInfo->has('date') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="date">Date</label>
		<input type="text" class="form-control date-picker col-lg-7" id="date" name="date" value="{{ $data['date'] }}" {{ $disabledAttribute }}>
		@if($errors->invoiceInfo->has('date'))
			<span class="help-block">{{ $errors->invoiceInfo->first('date') }}</span>
		@endif
	</div>

	<div class="form-group parent-customer col-lg-6 {{ $errors->invoiceInfo->has('customer') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="customer">Customer</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="customer" name="customer" {{ $disabledAttribute }}>
			<option></option>
			@foreach($customers as $custId => $custName)
				<option value="{{ $custId }}" {{ $custId == $data['customer'] ? "selected" : "" }}>{{ $custName }}</option>
			@endforeach
		</select>
		@if($errors->invoiceInfo->has('customer'))
			<span class="help-block">{{ $errors->invoiceInfo->first('customer') }}</span>
		@endif
	</div>

</div>

<div class="row">

	<div class="form-group parent-paymentStatus col-lg-6">
		<label class="col-lg-5" for="paymentStatus">Payment Status</label>
		<input type="text" class="form-control col-lg-7" id="txtPayStat" name="txtPayStat" value="{{ $paymentStatList[$data['paymentStatus']] }}" readonly="true" {{ $disabledAttribute }}>
	</div>

	<div class="form-group parent-invoiceTo col-lg-6 {{ $errors->invoiceInfo->has('invoiceTo') ? 'has-error' : '' }}">
		<label class="col-lg-5" for="invoiceTo">Invoice To</label>
		<input type="text" class="form-control col-lg-7" id="invoiceTo" name="invoiceTo" value="{{ $data['invoiceTo'] }}" {{ $disabledAttribute }}>
		@if($errors->invoiceInfo->has('invoiceTo'))
			<span class="help-block">{{ $errors->invoiceInfo->first('invoiceTo') }}</span>
		@endif
	</div>

</div>

<div class="row">

	@if(!$disableEditing)
	<div class="form-group col-lg-6">
		<button type="button" class="btn btn-primary" id="btnFilterTrips">
			<i class="fas fa-filter"></i> Filter Trips
		</button>
		<button type="button" class="btn btn-danger ml-1" id="btnResetFilter">
			<i class="fas fa-redo"></i> Reset Filter
		</button>
	</div>
	@endif

</div>

<div class="row parent-tripSheet-list {{ $data['invId'] ? 'hide' : '' }}">

	<fieldset class="fieldset-group col-lg-12 {{ $errors->invoiceInfo->has('tripSheets') ? 'has-error' : '' }}">
		<legend>Un-Invoiced Trips</legend>

		<div class="form-group">

			<div class="table-responsive">
				<table class="table table-bordered table-hover table-striped small-text" id="tripSheetList">
				</table>
			</div>

			@if($errors->invoiceInfo->has('tripSheets'))
				<span class="help-block">{{ $errors->invoiceInfo->first('tripSheets') }}</span>
			@endif

		</div>
	</fieldset>

</div>

<div class="row">

	<div class="col-lg-6"></div>

	<div class="col-lg-6">
		<div class="row">

			<div class="form-group parent-vehCharges col-lg-12 {{ $errors->invoiceInfo->has('vehCharges') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="vehCharges">Hire Charges (&#8377;)</label>
				<input type="text" class="form-control col-lg-7 currency" id="vehCharges" name="vehCharges" value="{{ $data['vehCharges'] }}" {{ $disabledAttribute }} readonly="true">
				@if($errors->invoiceInfo->has('vehCharges'))
					<span class="help-block">{{ $errors->invoiceInfo->first('vehCharges') }}</span>
				@endif
			</div>

			<div class="col-lg-12">
				@if(isset($invoiceDetailExtraCharges) && !empty($invoiceDetailExtraCharges))
				@foreach($invoiceDetailExtraCharges as $chargeAmountName => $chargeAmount)
				<div class="row">
					<div class="form-group col-12">
						<label class="col-lg-5">{{ $chargeAmount["label"] }} (&#8377;)</label>
						<input type="text" class="form-control col-lg-7 currency extraCharges" name="{{ $chargeAmountName }}" value="{{ $chargeAmount['amount'] }}" {{ $disabledAttribute }} readonly="true">
					</div>
				</div>
				@endforeach
				@endif
			</div>

			@include("widgets.company.invoice.additionalChargesBlock")

			<div class="form-group parent-discAmount col-lg-12 {{ $errors->invoiceInfo->has('discAmount') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="discAmount">Discount</label>
				<div class="input-group col-lg-7">
					<div class="input-group-prepend">
						<select class="form-control" id="discountType" name="discountType" {{ $disabledAttribute }}>
							@foreach($discountTypeList as $id => $text)
								<option value="{{ $id }}"  {{ $id == $data['discountType'] ? "selected" : "" }}>{{ $text }}</option>
							@endforeach
						</select>
					</div>
					<input type="text" class="form-control currency" id="discAmount" name="discAmount" value="{{ $data['discAmount'] }}" {{ $disabledAttribute }}>
				</div>
				@if($errors->invoiceInfo->has('discAmount'))
					<span class="help-block">{{ $errors->invoiceInfo->first('discAmount') }}</span>
				@endif
			</div>

			<div class="form-group col-lg-12" id="taxList">
				@if(isset($taxes) && !empty($taxes))
					@foreach($taxes as $tax)
						<div class="form-group col-lg-12">
							<label class="col-lg-5">{{ $tax->tax_name }} @ {{ $tax->rate }}% (&#8377;)</label>
							<label class="col-lg-7 tax-rate">0</label>
						</div>
					@endforeach
				@endif
			</div>

			@if(!$disableEditing)
			<div class="form-group col-lg-12 text-center">
				<a class="btn btn-primary" id="btnCalculateInvoiceAmount">
					<i class="fas fa-calculator"></i> Calculate Total Amount
				</a>
			</div>
			@endif

			<div class="form-group parent-grandTotal col-lg-12 {{ $errors->invoiceInfo->has('grandTotal') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="grandTotal">Grand Total (&#8377;)</label>
				<input type="text" class="form-control col-lg-7 currency" id="grandTotal" name="grandTotal" value="{{ $data['grandTotal'] }}" {{ $disabledAttribute }} readonly="true">
				@if($errors->invoiceInfo->has('grandTotal'))
					<span class="help-block">{{ $errors->invoiceInfo->first('grandTotal') }}</span>
				@endif
			</div>

			<div class="form-group parent-amountInWord col-lg-12">
				<label class="col-lg-5" for="amountInWord">Grand Total (In Words)</label>
				<textarea class="form-control col-lg-7" id="amountInWord" name="amountInWord" value="" {{ $disabledAttribute }} readonly="true"></textarea>
				@if($errors->invoiceInfo->has('amountInWord'))
					<span class="help-block">{{ $errors->invoiceInfo->first('amountInWord') }}</span>
				@endif
			</div>

		</div>
	</div>

</div>

<script type="text/javascript">
	var tripSheets = {!! json_encode($tripSheets) !!};
	const invoiceData = {!! json_encode($data) !!};
	@if(isset($taxAmounts))
		const taxAmounts = {!! json_encode($taxAmounts) !!};
	@endif
	const oldAdditionalAmounts = {!! json_encode($oldAdditionalAmounts) !!};
</script>

@include("widgets.company.invoice.tmplAdditionalChargesRow")
