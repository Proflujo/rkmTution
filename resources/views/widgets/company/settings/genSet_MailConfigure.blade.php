<?php
//~ echo "<pre>",print_r($settingsInfo),"</pre>";die;
	$settingInfo = isset($settingsInfo[0]) ? $settingsInfo[0] : (object) [];

	$mailDriver 	=	old('mail_driver') ? old('mail_driver') : (isset($settingInfo->mail_driver) ? $settingInfo->mail_driver : '');
	$mailHost 		= 	old('mail_host') ? old('mail_host') : (isset($settingInfo->mail_host) ? $settingInfo->mail_host : '');
	$mailPort 		= 	old('mail_port') ? old('mail_port') : (isset($settingInfo->mail_port) ? $settingInfo->mail_port : '');
	$mailEncryption	= 	old('mail_encryption') ? old('mail_encryption') : (isset($settingInfo->mail_encryption) ? $settingInfo->mail_encryption : '');
	$mailUsername 	= 	old('mail_username') ? old('mail_username') : (isset($settingInfo->mail_username) ? $settingInfo->mail_username : '');
	$mailPassword 	= 	old('mail_password') ? old('mail_password') : (isset($settingInfo->mail_password) ? $settingInfo->mail_password : '');
	$sendLiveMail 	= 	old('send_live_mail') ? old('send_live_mail') : (isset($settingInfo->send_live_mails) ? $settingInfo->send_live_mails : '');
	
?>

@if(isset($settingInfo->setting_id)) 
	<input type="hidden" name="settingId" value="{{$settingInfo->setting_id}}" />
@endif
<div class="row">
	<div class="form-group parent-mail_driver col-lg-6  {{ $errors->settingInfo->has('mail_driver') ? 'has-error' : '' }}  required-field">
		<label class="col-lg-5" for="mail_driver">{{ Lang::get('company.gen_mail_driver') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailDriver}}" id="mail_driver" name="mail_driver" />
		@if($errors->settingInfo->has('mail_driver'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_driver') }}</span>
		@endif
	</div>
	<div class="form-group parent-mail_host col-lg-6 {{ $errors->settingInfo->has('mail_host') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mail_host">{{ Lang::get('company.gen_mail_host') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailHost}}" id="mail_host" name="mail_host" />
		@if($errors->settingInfo->has('mail_host'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_host') }}</span>
		@endif
	</div>
</div>		
<div class="row">
	<div class="form-group parent-mail_port col-lg-6 {{ $errors->settingInfo->has('mail_port') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mail_port">{{ Lang::get('company.gen_mail_port') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailPort}}" id="mail_port" name="mail_port" />
		@if($errors->settingInfo->has('mail_port'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_port') }}</span>
		@endif
	</div>
	<div class="form-group parent-mail_encryption col-lg-6 {{ $errors->settingInfo->has('mail_encryption') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mail_encryption">{{ Lang::get('company.gen_mail_encryption') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailEncryption}}" id="mail_encryption" name="mail_encryption" />
		@if($errors->settingInfo->has('mail_encryption'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_encryption') }}</span>
		@endif
	</div>
</div>		
<div class="row">
	<div class="form-group parent-mail_username col-lg-6 {{ $errors->settingInfo->has('mail_username') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mail_username">{{ Lang::get('company.gen_mail_username') }}:</label>
		<input 	type="text" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailUsername}}" id="mail_username" name="mail_username" />
		@if($errors->settingInfo->has('mail_username'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_username') }}</span>
		@endif
	</div>
	<div class="form-group parent-mail_password col-lg-6 {{ $errors->settingInfo->has('mail_password') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="mail_password">{{ Lang::get('company.gen_mail_password') }}:</label>
		<input 	type="password" class="form-control col-lg-7 mailConfiguration" 
					value="{{$mailPassword}}" id="mail_password" name="mail_password" autocomplete="new-password" />
		@if($errors->settingInfo->has('mail_password'))
			<span class="help-block">{{ $errors->settingInfo->first('mail_password') }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6">
		<label class="col-lg-5" for="send_live_mail">{{ Lang::get('company.send_live_mail') }}:</label>
		<input 	type="checkbox" 
				value="1" 
				{{(!empty($sendLiveMail)? "checked":"")}}
				id="send_live_mail" name="send_live_mail" />
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-5">
	</div>
	<div class="form-group col-lg-3">
		<button type="button" id="test_connection" class="btn waves-effect waves-light">Test Connection</button>
		<button type="button" id="send_test_email" class="btn waves-effect waves-light">Send Test Email</button>
	</div>
	<div class="form-group col-lg-4">
	</div>
</div>
