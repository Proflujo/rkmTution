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
		<a class="btn btn-add-contact-person">Add Contact Person <i class="fa fa-plus"></i></a>
	@endif
</div>

<script type="text/html" id="templateContactPerson">
	@include('widgets.company.masters.templates.vendorContactPerson')
</script>

<script type="text/javascript">
	var contactPersonData = {!! json_encode($data['contact_person']) !!};
	var contactPersonError = {!! json_encode($contactPersonError) !!};
</script>


<script type="text/javascript" src="{{ url('assets/js/company/masters/vendorContactPersonDetails.js') }}"></script>
