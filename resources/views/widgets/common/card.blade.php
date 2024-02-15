<div class="md-card card animated fadeIn">
	@if( isset($title) || isset($icons) )
    	<div class="card-header">
            <div class="view view-cascade gradient-card-header d-flex justify-content-between align-items-center">
                <div class="nav-tab-navigation"></div>
    			@if(isset($title))
            		{{$title}}
            	@endif
                <div>
                	@if(isset($icons))
    					{{$icons}}
                	@endif
                </div>
            </div>
    	</div>
    @endif
	<div class="card-body">
    	@if( isset( $section ) )
        	@hasSection( $section )
        		@yield( $section )
    		@endif
        @endif
	</div>
</div>