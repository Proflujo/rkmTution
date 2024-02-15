@section("pie-chart")
	<div id="customerTypesChart"></div>
@endsection

@section("bar-chart")
	<div id="customerInvoicesChart"></div>
@endsection

@section("table-list")
	<div class="table-responsive">
		<table id="revenueReport"></table>
	</div>
@endsection

<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12" >
    	
    	<div class="card">
        	<div class="card-body">
            	
    			<div class="row">
                	<div class="form-group col-lg-2">
                		<label class="float-left" for="filterDate">From</label>
                		<input type="text" class="form-control col-lg-9 date-picker" id="fFilterDate" data-default-date="{{ \OTSHelper::Date('- 1 month') }}" onkeydown="return false">
                	</div>
                	
                	<div class="form-group col-lg-2">
                		<label class="float-left" for="filterDate">To</label>
                		<input type="text" class="form-control col-lg-9 date-picker" id="tFilterDate" data-default-date="{{ \OTSHelper::Date() }}" onkeydown="return false">
                	</div>
                
                	<div class="form-group col-lg-1">
                		<button class="btn" id="btnFilter">Filter</button>
                	</div>
                	
                	<div class="form-group col-lg-1">
                		<button class="btn" id="btnFilterReset">Reset</button>
                	</div>
            	</div>
            	
           	</div>
        </div>
        
    </div>
</div>

<div class="row mt-4">
	<div class="col-sm-12 col-md-4 col-lg-4">
		@include('widgets.common.card', ["title"=>"Customer Types", "section" => "pie-chart"])
	</div>
	
	<div class="col-sm-12 col-md-8 col-lg-8">
		@include('widgets.common.card', ["title"=>"Customer Invoices", "section" => "bar-chart"])
	</div>
</div>

<div class="row mt-4">
	<div class="col-sm-12 col-md-12 col-lg-12">
		@include('widgets.common.card', [ "title"=>"Customer Trips", "section" => "table-list" ])
	</div>
</div>