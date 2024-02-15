<?php 
	$settingInfo= 	isset($settingInfo) ? $settingInfo : (object) [];
	$toSMS 		= 	old('sms_to') ? old('sms_to') : (isset($settingInfo->sms_to) ? $settingInfo->sms_to : '');
	$ccSMS 		= 	old('sms_cc') ? old('sms_cc') : (isset($settingInfo->sms_cc) ? $settingInfo->sms_cc : '');
	$message 	= 	old('sms_message') ? old('sms_message') : (isset($settingInfo->sms_content) ? $settingInfo->sms_content : '');
	$template 	= 	old('smsTemplate') ? old('smsTemplate') : (isset($settingInfo->slug_name) ? $settingInfo->slug_name : '');
	$tempArry	=	$templateList;
	//~ echo "<pre>",print_r($tempArry),"</pre>";die;
?>
<div class="row">
	<div class="form-group parent-smsTemplate col-lg-6 {{ $errors->settingInfo->has('smsTemplate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-4" for="smsTemplate">Template:</label>
		<select id="smsTemplate" name="smsTemplate" class="form-control selectpicker col-lg-8">
			@foreach($tempArry as $rowKey=>$rowTemp)
				<?php
					$rowKey	=	str_replace("email","sms",$rowKey);
				?>
				<option value="{{$rowKey}}" {{ (($template ==	$rowKey)?"selected":"")}}>{{$rowTemp}}</option>
			@endforeach
		</select>
		@if($errors->settingInfo->has('smsTemplate'))
			<span class="help-block">{{ $errors->settingInfo->first('smsTemplate') }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-sms_to col-lg-6 {{ $errors->settingInfo->has('sms_to') ? 'has-error' : '' }} required-field">
		<label class="col-lg-4" for="sms_to">To:</label>
		<input type="text" class="form-control col-lg-8" 
				value="{{$toSMS}}" 
				id="sms_to" name="sms_to" />
		@if($errors->settingInfo->has('sms_to'))
			<span class="help-block">{{ str_replace("sms ","",$errors->settingInfo->first('sms_to')) }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-sms_to col-lg-6 {{ $errors->settingInfo->has('sms_cc') ? 'has-error' : '' }}">
		<label class="col-lg-4" for="sms_cc">CC:</label>
		<input type="text" class="form-control col-lg-8" 
				value="{{$ccSMS}}" 
				id="sms_cc" name="sms_cc" />
		@if($errors->settingInfo->has('sms_cc'))
			<span class="help-block">{{ str_replace("sms ","",$errors->settingInfo->first('sms_cc')) }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-sms_message  col-lg-6 {{ $errors->settingInfo->has('sms_message') ? 'has-error' : '' }} required-field">
		<label class="col-lg-4" for="sms_message">Message:</label>
		<textarea id="sms_message" name="sms_message"
			class="form-control col-lg-8" rows="4" >{{$message}}</textarea>
		@if($errors->settingInfo->has('sms_message'))
			<span class="help-block">{{ str_replace("sms ","",$errors->settingInfo->first('sms_message')) }}</span>
		@endif		
	</div>
</div>
