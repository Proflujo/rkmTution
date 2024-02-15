@var $search = !isset($search)?true:$search;
@var $id = isset($id) ? $id : false;

<div class="md-card card animated fadeIn" @if($id) id="{{ $id }}" @endif>
	<div class="card-header">
        <div class="view view-cascade gradient-card-header d-flex justify-content-between align-items-center">
            <div class="nav-tab-navigation">
            	@hasSection('tabs')
            		@yield("tabs")
            	@endif
            </div>
			@hasSection('tab-title')
        		@yield("tab-title")
        	@endif
            <div>
            	@if($search)
                 	<form class="form-inline md-form form-sm mt-0 mb-0 never-confirm">
                 		<input class="form-control form-control-sm ml-3 w-75 dt-search" type="text" placeholder="Search..." aria-label="Search">
                	</form>
            	@endif
            </div>
        </div>
	</div>
	<div class="card-body">
    	@hasSection('tab-content')
    		@yield("tab-content")
    	@endif
	</div>
</div>