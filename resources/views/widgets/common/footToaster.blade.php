@php
	$time 		=  isset($time) ? $time : "";
	$message 	=  isset($message) ? $message : "";
@endphp

<div 
	style="position: absolute; bottom: 1%; right: 1%;
	       animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
	       transform: translate3d(0, 0, 0); display : none;
	       backface-visibility: hidden; perspective: 1000px;">
	       
    <div class="toast fade show footToaster" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000">
    
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-globe"></i> Updates</strong>
            <small class="text-muted">{{$time}}</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
        </div>
        
        <div class="toast-body">
            {{$message}}
        </div>
        
    </div>
    
</div>