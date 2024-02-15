@php

	$invPaymentInfo = isset($invPaymentInfo[0]) ? $invPaymentInfo[0] : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	
	$data = 
	[
		'paymentId' => old('paymentId') ? old('paymentId') : ( isset($invPaymentInfo->payment_id) ? $invPaymentInfo->payment_id : 0 ),
		'customerType' => old('customerType') ? old('customerType') : ( isset($invPaymentInfo->customerType) ? $invPaymentInfo->customerType : '' ),
		'customerName' => old('customerName') ? old('customerName') : ( isset($invPaymentInfo->fkcustomerId) ? $invPaymentInfo->fkcustomerId : '' ),
		'paymentMode' => old('paymentMode') ? old('paymentMode') : ( isset($invPaymentInfo->paymentMode) ? $invPaymentInfo->paymentMode  : ''),
		'bankName' => old('bankName') ? old('bankName') : ( isset($invPaymentInfo->bankId) ? $invPaymentInfo->bankId : ''),
		'paymentDate' => old('paymentDate') ? old('paymentDate') : ( isset($invPaymentInfo->paymentDate) ? $invPaymentInfo->paymentDate : ''),
		'chequeNo' => old('chequeNo') ? old('chequeNo') : ( isset($invPaymentInfo->chequeNo) ? $invPaymentInfo->chequeNo : ''),
		'remarks' => old('remarks') ? old('remarks') : ( isset($invPaymentInfo->remarks) ? $invPaymentInfo->remarks : ''),
		'amount' => old('amount') ? old('amount') : ( isset($invPaymentInfo->amount) ? $invPaymentInfo->amount : ''),
		'vendorName' => old('vendorName') ? old('vendorName') : ( isset($invPaymentInfo->fkvendorId) ? $invPaymentInfo->fkvendorId : '' ),
		
	];

	$paidInvoiceLists = old('invoiceIds') ? old('invoiceIds') : ( isset($invPaymentDetInfo) ? $invPaymentDetInfo : [] );

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)
@section('datatables',true)
	<input 	type="hidden" name="invPayId" value="{{$data['paymentId']}}" />
	<input type="hidden" name="payType" id="payType" value="{{$payType}}" />
<div class="row">
	<div class="col-lg-6">
		@if($payType	==	CODELIST_PAYMENT_TYPE_INVOICE)
		<div class="row">
			<div class="form-group parent-customerType col-lg-12 {{ $errors->invoicePaymentInfo->has('customerType') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="customerType">Customer Type</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" 
						id="customerType" 
						name="customerType" {{ $disabledAttribute }} >
					@foreach($custTypes as $id => $name)
						<option value="{{ $id }}">{{ $name }}</option>
					@endforeach
				</select>
				@if($errors->invoicePaymentInfo->has('customerType'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('customerType') }}</span>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group parent-customerName col-lg-12 {{ $errors->invoicePaymentInfo->has('customerName') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="customerName">Customer Name</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" 
						id="customerName" 
						name="customerName" {{ $disabledAttribute }}>
				</select>
				@if($errors->invoicePaymentInfo->has('customerName'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('customerName') }}</span>
				@endif
			</div>
		</div>
		@else
		<!-- Vendor Name  -->
		<div class="row">
			<div class="form-group parent-vendorName col-lg-12 {{ $errors->invoicePaymentInfo->has('vendorName') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="vendorName">Vendor Name</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" 
						id="vendorName" 
						name="vendorName" {{ $disabledAttribute }}>
						@foreach($vendors as $id => $name)
							<option value="{{ $id }}">{{ $name }}</option>
						@endforeach
				</select>
				@if($errors->invoicePaymentInfo->has('vendorName'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('vendorName') }}</span>
				@endif
			</div>
		</div>
		<!-- Vendor Name  -->
		@endif
		<div class="row">
			<div class="form-group parent-paymentMode col-lg-12 {{ $errors->invoicePaymentInfo->has('paymentMode') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="amount">Payment Mode</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" 
						id="paymentMode" 
						name="paymentMode" {{ $disabledAttribute }}>
						
					@foreach($paymentModes as $id => $name)
						<option value="{{ $id }}">{{ $name }}</option>
					@endforeach
				</select>
				@if($errors->invoicePaymentInfo->has('paymentMode'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('paymentMode') }}</span>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group parent-paymentDate col-lg-12 {{ $errors->invoicePaymentInfo->has('paymentDate') ? 'has-error' : '' }} required-field">
				<label class="col-lg-5" for="paymentDate">Payment Date</label>
				<input 	type="text" 
						class="form-control col-lg-7 date-picker"
						id="paymentDate" 
						name="paymentDate" {{ $disabledAttribute }}
					
				/>
				@if($errors->invoicePaymentInfo->has('paymentDate'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('paymentDate') }}</span>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group parent-bankName col-lg-12 {{ $errors->invoicePaymentInfo->has('bankName') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="bankName">Bank Name</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" 
						id="bankName" 
						name="bankName" {{ $disabledAttribute }}>
					<option>&nbsp;</option>
					@foreach($banks as $id => $name)
						<option value="{{ $id }}">{{ $name }}</option>
					@endforeach
				</select>
				@if($errors->invoicePaymentInfo->has('bankName'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('bankName') }}</span>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group parent-chequeNo col-lg-12 {{ $errors->invoicePaymentInfo->has('chequeNo') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="chequeNo">Cheque No / Txn No</label>
				<input 	type="text" 
						class="form-control col-lg-7"
						id="chequeNo" 
						name="chequeNo" {{ $disabledAttribute }}
					
				/>
				@if($errors->invoicePaymentInfo->has('chequeNo'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('chequeNo') }}</span>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="form-group parent-remarks col-lg-12 {{ $errors->invoicePaymentInfo->has('remarks') ? 'has-error' : '' }}">
				<label class="col-lg-5" for="paymentDate">Remarks</label>
				<textarea
					class="form-control col-lg-7"
						id="remarks" 
						name="remarks" {{ $disabledAttribute }}
					></textarea>
				@if($errors->invoicePaymentInfo->has('remarks'))
					<span class="help-block">{{ $errors->invoicePaymentInfo->first('remarks') }}</span>
				@endif
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="form-group parent-amount col-lg-12 required-field">
				<label class="col-lg-3" for="amount" style="padding:0">Amount</label>
				<input 	type="text" 
						class="form-control col-lg-5"
						disabled
						id="amount" 
						name="amount" {{ $disabledAttribute }}
					
				/>
			</div>
		</div>
		<fieldset {{ $disabledAttribute }}>
		<div class="row">
			<div class="form-group  col-lg-12 {{ $errors->invoicePaymentInfo->has('amount') ? 'has-error' : '' }}">
				@if($errors->invoicePaymentInfo->has('amount'))
					<span class="help-block">Please select atleast one unPaid Invoice / Purchase</span>
				@endif
				<table id="unpaidInvoices" class="dataTable">
					<thead>
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>Amount</th>
							<th><input type="checkbox" class="select_all"></th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
		</fieldset>
	</div>
</div>


<script type="text/javascript">
	var defaultPaymentInfoValues = {!! json_encode($data) !!};
	var paidInvoiceLists = {!! json_encode($paidInvoiceLists) !!};
</script>
