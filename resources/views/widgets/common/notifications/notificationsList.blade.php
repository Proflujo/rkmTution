<div class="card col-lg-8 notification">
	<div class="card-body p-2">
		<div class="content">
			<b>{{ $title }}:</b> {{ $text }}
		</div>
		<div class="details float-right">
			@if(!empty($time))
				<i class="fas fa-clock"></i> {{ $time }}
			@endif
			@if(!empty($action))
				@if(isset($action['edit']))
					<a class="" href="{{ $action['edit'] }}">
						<i class="fas fa-pencil-alt"></i>
					</a>
				@endif
			@endif
		</div>
	</div>
</div>