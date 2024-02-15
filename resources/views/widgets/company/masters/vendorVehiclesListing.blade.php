@php

	$vendorInfo = isset($vendorInfo) ? $vendorInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$contactPersonError = Session::has('contactPersonError') ? Session::get('contactPersonError') : [];

	$data = [
		'contact_person' => ( old('contact_person') ? old('contact_person') : ( isset($vendorInfo->contact_person) ? $vendorInfo->contact_person : ( isset($contactPerson) ? $contactPerson : '' ) ) )
	];

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">
	@if(!$disableEditing)
	<div class="col-lg-4">
			<a class="btn btn-add-vendor-vehicle">Add Vendor Vehicle <i class="fa fa-plus"></i></a>
	</div>
	@endif

	<div class="col-lg-3 ml-auto">
		<form class="form-inline md-form form-sm mt-0 mb-0 never-confirm">
			<div class="form-group">
				<input class="form-control form-control-sm dt-search" type="text" placeholder="Search..." aria-label="Search">
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-hover" id="vendorVehicleList"></table>
	</div>
</div>

<script type="text/html" id="templateVendorVehicles">
	<form id="frmvendorVehicleDetail" class="">
		@include('widgets.company.masters.templates.vendorVehicle')
	</form>
</script>


