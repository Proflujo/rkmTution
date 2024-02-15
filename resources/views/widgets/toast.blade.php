@php
	$class 		=  isset($class) ? $class : "";
	$message 	=  isset($message) ? $message : "";
@endphp

<div class="customToast toast {{ $class }} {{ !empty($message) ? 'show-toast' : '' }}">
	<span class="fa icon"></span>
	<span class="text">
		{{ $message }}
	</span>
	<span class="fa close"></span>
</div>