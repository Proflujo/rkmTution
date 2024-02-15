<div class="alert alert-{{$class}} {{ isset($not_dismissable)?'':'alert-dismissable' }}" role="alert">
    
    @if (!isset($not_dismissable)) 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	<span aria-hidden="true">&times;</span>
        </button> 
    @endif 
    
    <i class="fas fa-{{ (isset($icon)) ? $icon : $class == 'success' ? 'check-circle' : 'times-circle' }}"></i>
     
    @if (isset($link))  
    	<a href="#" class="alert-link">{{ $link }} </a> 
    @endif 
	
	@if (isset($individual))
		{{ $message }}
	@else
		<div class="alert-message">{{ $message }}</div>
	@endif
	
</div>
