<div class="ContentArea">
	<div class="alert alert-danger" role="alert" style="display:none">
		<p>Lorem Ipsum</p>
	</div>
	<div class="row" id="emailMessageBlock1" style="">
		<div class="form-group col-lg-12">
			<p class="email-message">Do you want to send Test Email 
				<a href="javascript::void(0)" id="showEmailMessageBlock2">Click Here</a>
			</p>
		</div>
	</div>
	<div id="emailMessageBlock2" style="display:none">
		@include("widgets.company.settings.genSet_EmailTemplate")
	</div>
</div>
