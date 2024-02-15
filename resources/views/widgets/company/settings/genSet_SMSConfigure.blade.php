<?php
//~ echo "<pre>",print_r($settingsInfo),"</pre>";die;
	$smsInfo = isset($smsInfo[0]) ? $smsInfo[0] : (object) [];

	$smsApiUrl 		=	old('api_url') ? old('api_url') : (isset($smsInfo->api_url) ? $smsInfo->api_url : '');
	$smsApiKey 		= 	old('api_key') ? old('api_key') : (isset($smsInfo->sms_api_key) ? $smsInfo->sms_api_key : '');
	$smsApiSecret 	= 	old('api_secret') ? old('api_secret') : (isset($smsInfo->sms_api_secret) ? $smsInfo->sms_api_secret : '');
	$sendLiveSMS 	= 	old('send_live_sms') ? old('send_live_sms') : (isset($smsInfo->send_live_sms) ? $smsInfo->send_live_sms : '');
?>
<div class="row">
<!--
	<div class="form-group parent-api_url col-lg-6  {{ $errors->settingInfo->has('api_url') ? 'has-error' : '' }}  required-field">
		<label class="col-lg-5" for="api_url">{{ Lang::get('company.gen_api_url') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$smsApiUrl}}" id="api_url" name="api_url" />
		@if($errors->settingInfo->has('api_url'))
			<span class="help-block">{{ $errors->settingInfo->first('api_url') }}</span>
		@endif
	</div>
-->
	<div class="form-group parent-api_key col-lg-6 {{ $errors->settingInfo->has('api_key') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="api_key">{{ Lang::get('company.gen_api_key') }}:</label>
		<input 	type="text" class="form-control col-lg-7 smsConfiguration" 
					value="{{$smsApiKey}}" id="api_key" name="api_key" />
		@if($errors->settingInfo->has('api_key'))
			<span class="help-block">{{ $errors->settingInfo->first('api_key') }}</span>
		@endif
	</div>
	<div class="form-group parent-api_secret col-lg-6 {{ $errors->settingInfo->has('api_secret') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="api_secret">{{ Lang::get('company.gen_api_secret') }}:</label>
		<input 	type="text" class="form-control col-lg-7 smsConfiguration" 
					value="{{$smsApiSecret}}" id="api_secret" name="api_secret" />
		@if($errors->settingInfo->has('api_secret'))
			<span class="help-block">{{ $errors->settingInfo->first('api_secret') }}</span>
		@endif
	</div>
</div>		
<div class="row">

	<div class="form-group col-lg-6">
		<label class="col-lg-5" for="send_live_sms">{{ Lang::get('company.send_live_sms') }}:</label>
		<input 	type="checkbox" 
				value="1" 
				{{(!empty($sendLiveSMS)? "checked":"")}}
				id="send_live_sms" name="send_live_sms" />
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-5">
	</div>
	<div class="form-group col-lg-3">
		<button type="button" id="test_connection_sms" class="btn waves-effect waves-light">Test Connection</button>
		<button type="button" id="send_test_sms" class="btn waves-effect waves-light">Send Test SMS</button>
	</div>
	<div class="form-group col-lg-4">
	</div>
</div>
