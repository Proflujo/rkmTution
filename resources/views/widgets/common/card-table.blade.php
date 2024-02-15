@var $head 	 		= !isset($head)?true:$head;
@var $search 	 	= !isset($search)?true:$search;
@var $add 	 		= !isset($add)?true:$add;

@var $tableClass 	= isset($tableClass)?$tableClass:'';
@var $title 	 	= isset($title)?$title:'';
@var $url 	 		= isset($url)?$url:'';
@var $column 	 	= isset($column)?$column:'col-sm-12 col-md-12 col-lg-12';

<div class="md-card card animated fadeIn">
    @if($head)
    	<div class="card-header">
            <div class="view view-cascade gradient-card-header d-flex justify-content-between align-items-center">
                <div>
                	@if($head)
                       	<span>{{$title}}</span>
                        @if($add)
                       	<a href="{{ $url }}" id="addControlBtn" class="btn btn-outline-white btn-rounded btn-sm px-2 waves-effect waves-light"><i class="fa fa-sm fa-plus"></i></a>
                        @endif
                    @endif
                </div>
    
                <div>
            		@if($search)
                     	<form class="form-inline md-form form-sm mt-0 mb-0 never-confirm">
                     		<input class="form-control form-control-sm ml-3 w-75 dt-search" type="text" placeholder="Search..." aria-label="Search">
                    	</form>
            		@endif
                </div>
            </div>
    	</div>
	@endif
	<div class="card-body">
		<div class="row d-flex justify-content-center">
    		<div class="{{$column}}">
    			<div class="table-responsive"><table class="table table-hover {{$tableClass}}" id="{{$table}}"></table></div>
    		</div>
    	</div>
	</div>
</div>