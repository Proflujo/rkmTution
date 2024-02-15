@if( $companyId	==	0)
<div class="row">
	
	<a class="btn" href="{{ url('masters/branch/add') }}">Add Branch <i class="fa fa-plus"></i></a>
</div>
@endif

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" id="branchList"></table>
</div>
