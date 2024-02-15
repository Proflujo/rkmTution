<div class="row">
	<div class="form-group col-lg-3">
		<label class="float-left mr-2" for="filterHotel">Customer:</label>
		<select id="filterCustomer"class="form-control col-lg-7 selectpicker filterField">
			<option value="all">All Customer</option>
			@foreach($customers as $rowCustomer)
				<option value="{{$rowCustomer->customer_id}}">{{$rowCustomer->customer_name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3" id="parentFilterTripStatus" style="display: none;">
		<label class="float-left mr-2" for="filterTripStatus">Status:</label>
		<select id="filterTripStatus"class="form-control col-lg-7 selectpicker filterField">
			<option value="all">All</option>
			@foreach($tripStatusList as $statusId => $statusName)
				<option value="{{$statusId}}">{{$statusName}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-lg-3">
		<label class="float-left mr-2" for="filterFromDate">From Date: </label>
		<input type="text" class="form-control col-lg-8 date-picker filterField" id="filterFromDate" data-default-date="{{ \OTSHelper::Date('- 1 month') }}">
	</div>
	<div class="form-group col-lg-3">
		<label class="float-left mr-2" for="filterToDate">To Date: </label>
		<input type="text" class="form-control col-lg-8 date-picker filterField" id="filterToDate" data-default-date="{{ \OTSHelper::Date() }}">
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-4">
		<button class="btn mr-2" id="btnFilter">Filter</button>
		<button class="btn" id="btnFilterReset">Reset</button>
	</div>
	<div class="form-group col-lg-4 float-right align-right">
		<button class="btn" id="btnImport">Import</button>
		<a class="btn" href="{{ \OTSHelper::HBImportTemplate() }}"><i class="fas fa-download"></i> Template</a>
	</div>
</div>

@if(isset($importAlert) || Session::has("importAlert"))
    @php
        $importAlert = isset($importAlert) ? $importAlert : Session::get("importAlert");
        $importErrFile = isset($importErrFile) ? $importErrFile : (Session::has("importErrFile") ? Session::get("importErrFile") : false);
        $infoBoxInput = ["info" => $importAlert, "customClass" => "importErrorMsg"];

	    if($importErrFile){
	    	$infoBoxInput["customFields"][] = "<br><br><a class=\"btn\" href=\"$importErrFile\" download>Get Import Message</a>";
	    }
    @endphp

    @include("widgets.infoBox", $infoBoxInput)

    @if(Session::has("importAlert"))
        @php
            Session::forget("importAlert");
        @endphp
    @endif
@endif

@php
	$supportedExcelExtensions = \OTSHelper::supportedExcelExtensions();
	$supportedExcelMimeTypes = \OTSHelper::supportedExcelMimeTypes();
@endphp

<script type="text/html" id="templateImportHotelBooking">
	<form id="frmImportHotelBooking_XYZ" action="{{ url('vehicle-bookings/hotel-customer/import') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="row">
			<div class="form-group col-lg-12 required-field">
				<label class="col-lg-4" for="customer_XYZ">Customer</label>
				<div class="col-lg-8 input-group">
					<select class="form-control selectpicker" id="customer_XYZ" name="customer_XYZ">
						@foreach($customers as $rowCustomer)
							<option value="{{ $rowCustomer->customer_id }}">{{ $rowCustomer->customer_name }}</option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-lg-12 required-field">
				<label class="col-lg-4">Choose file</label>
				<div class="custom-file col-lg-8">
					<input type="file" class="custom-file-input no-validation-on-change" id="fileImportHotelBooking_XYZ" name="fileImportHotelBooking_XYZ" />
					<label class="custom-file-label" for="fileImportHotelBooking_XYZ">&nbsp;</label>
					<span class="hint">Supported file types: {{ $supportedExcelExtensions }}</span>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group col-lg-12">
				<label class="col-lg-4">Template</label>
				<a class="btn" href="{{ \OTSHelper::HBImportTemplate() }}">
					<i class="fas fa-download"></i>
				</a>
			</div>
		</div>

	</form>
</script>

<script type="text/javascript">
	const FILE_SUPPORTED_TYPES = {!! json_encode(explode(",", $supportedExcelMimeTypes)) !!};
</script>