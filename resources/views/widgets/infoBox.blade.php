@php
	$info = isset($info) ? $info : [];

	extract($info);

	$bgClass = "";

	if(isset($type)){
		if($type == "failed"){
			$bgClass = "bg-warning";
		}
	}
@endphp

<div class="row">
	<div class="col-lg-12">
		<div class="info-box {{ $bgClass }} {{ isset($customClass) ? $customClass : '' }}">
			@if(isset($type))
				@if($type == "failed")
					<i class="fas fa-exclamation-triangle"></i>
				@endif
			@else
				<i class="fas fa-info-circle"></i>
			@endif

			<?php
				echo $message;

				if(isset($customFields)){
					foreach($customFields as $field){
						echo $field;
					}
				}
			?>
		</div>
	</div>
</div>