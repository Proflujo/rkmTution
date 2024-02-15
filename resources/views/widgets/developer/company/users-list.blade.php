@if($companyId	==	0)
<div class="row">
	
	<a class="btn" href="{{ url('dev/company/' . $companyId . '/users/add') }}">Add User <i class="fa fa-plus"></i></a>
</div>
@endif
@php
	$fkcompanyId	=	Auth::user()->fkcompany_id;
@endphp

<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" id="usersList"></table>
</div>
