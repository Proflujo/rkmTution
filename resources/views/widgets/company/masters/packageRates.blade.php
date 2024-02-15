@section("styles")
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/packageRates.css') }}"/>
@endsection

@section('datatables',true)

<table class="table table-bordered table-hover table-striped small-text wrap-th" id="packageRates">
	<thead>
		<tr>
			<th rowspan="2" class="text-center">Vehicle Type</th>
			<th colspan="4" class="text-center">Per Day</th>
			<th colspan="4" class="text-center">Per Hour</th>
			<th class="text-center">Per KM</th>
			<th class="text-center">Flat Rate</th>
			<th class="monthrate" rowspan="2">Monthly</th>
			<th rowspan="2">Slabs</th>
			<th rowspan="2">Action</th>
		</tr>
		<tr>
			<th class="childHead text-center">Amount (&#8377;)</th>
			<th class="childHead text-center">Km Limit</th>
			<th class="childHead text-center">Extra Km (&#8377;)</th>
			<th class="childHead text-center">Driver Bata (&#8377;)</th>
			<th class="childHead text-center">Amount (&#8377;)</th>
			<th class="childHead text-center">Km Limit</th>
			<th class="childHead text-center">Extra Km (&#8377;)</th>
			<th class="childHead text-center">Driver Bata (&#8377;)</th>
			<th class="childHead text-center">Amount (&#8377;)</th>
			<th class="childHead text-center">Amount (&#8377;)</th>
		</tr>
	</thead>
	<tbody>
		<tr class="text-danger text-center nodata">
			<td colspan="14">No Data</td>
		</tr>
	</tbody>
</table>

@php
	$isRateConvert = 'false';
	if(old('rates')){
		$ratesData = old('rates');
	}
	
	if( isset($rates) ){
		$ratesData = json_encode($rates);
		$isRateConvert = 'true';
	}
	
@endphp

<script type="text/javascript">
	var flatRate 	= {{CODELIST_CUST_PKG_RATE_TYPE_FLAT_PRICE}};
	var perHour  	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_HOUR_CHARGE}};
	var perDay 	 	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_DAY_CHARGE}};
	var perKM 	 	= {{CODELIST_CUST_PKG_RATE_TYPE_PER_KM_CHARGE}};
	var slabRate 	= {{CODELIST_CUST_PKG_RATE_TYPE_SLABS}};
	var monthRate 	= {{CODELIST_CUST_PKG_RATE_TYPE_MONTHLY}};
	var retail		= {{RETAIL_CUST_ID}};
	
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

<script type="text/javascript" src="{{ url('assets/js/company/masters/packageRates.js') }}"></script>

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
