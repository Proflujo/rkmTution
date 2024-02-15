<div class="ContentArea">
	<div class="alert alert-danger" role="alert" style="display:none">
		<p>Lorem Ipsum</p>
	</div>
	<div class="row" id="smsMessageBlock1" style="">
		<div class="form-group col-lg-12">
			<p class="sms-message">Do you want to send Test SMS
				<a href="javascript::void(0)" id="showSMSMessageBlock2">Click Here</a>
			</p>
		</div>
	</div>
	<div id="smsMessageBlock2" style="display:none">
		@include("widgets.company.settings.genSet_SMSTemplate")
	</div>
</div>
