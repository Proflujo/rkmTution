<div class="col-lg-12">
	@if($disableEditing)
		@if(isset($additionalAmounts) && !empty($additionalAmounts))
			@foreach($additionalAmounts as $index => $additionalAmount)
				<div class="row">
					<div class="form-group col-12">
						<label class="col-lg-5">{{ $additionalAmount['label'] }} (&#8377;)</label>
						<input type="text" class="form-control col-lg-7 currency" name="additionalAmounts[{{ $index }}]" value="{{ $additionalAmount['value'] }}" {{ $disabledAttribute }}>
					</div>
				</div>
			@endforeach
		@endif
	@else
		<div class="row m-0">
			<div class="form-group col-lg-12 p-0">
				<fieldset class="fieldset-group col-lg-12">
					<legend>
						Additional Amounts
						<span>
							<a id="btnAddAdditionalAmount" title="Add a Field" href="javascript:void(0);">
								<i class="fas fa-plus-circle"></i>
							</a>
						</span>
					</legend>
					<div class="form-group" id="additionalAmountsContainer"></div>
				</fieldset>
			</div>
		</div>
	@endif
</div>