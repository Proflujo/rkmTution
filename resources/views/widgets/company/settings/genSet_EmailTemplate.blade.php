<?php 
	$settingInfo = isset($settingInfo) ? $settingInfo : (object) [];

	$fromName 	=	old('from_name') ? old('from_name') : (isset($settingInfo->from_name) ? $settingInfo->from_name : '');
	$fromEmail 	= 	old('txt_from_email') ? old('txt_from_email') : (isset($settingInfo->from_email) ? $settingInfo->from_email : '');
	$toEmail 	= 	old('txt_to') ? old('txt_to') : (isset($settingInfo->email_to) ? $settingInfo->email_to : '');
	$cc			= 	old('txt_cc') ? old('txt_cc') : (isset($settingInfo->email_cc) ? $settingInfo->email_cc : '');
	$bcc 		= 	old('txt_bcc') ? old('txt_bcc') : (isset($settingInfo->email_bcc) ? $settingInfo->email_bcc : '');
	$subject 	= 	old('txt_subject') ? old('txt_subject') : (isset($settingInfo->email_subject) ? $settingInfo->email_subject : '');
	$message 	= 	old('txt_message') ? old('txt_message') : (isset($settingInfo->email_content) ? $settingInfo->email_content : '');
	$template 	= 	old('txtTemplate') ? old('txtTemplate') : (isset($settingInfo->slug_name) ? $settingInfo->slug_name : '');
	$tempArry	=	$templateList;
	$shortCodes = config("data.mailShortCodes");
?>
<div class="row">
	<div class="form-group parent-txtTemplate col-lg-6 {{ $errors->settingInfo->has('txtTemplate') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="txtTemplate">Template:</label>
		<select id="txtTemplate" name="txtTemplate" class="form-control selectpicker col-lg-7">
			@foreach($tempArry as $rowKey=>$rowTemp)
				<option value="{{$rowKey}}" {{ (($template ==	$rowKey)?"selected":"")}}>{{$rowTemp}}</option>
			@endforeach
		</select>
		@if($errors->settingInfo->has('txtTemplate'))
			<span class="help-block">{{ $errors->settingInfo->first('txtTemplate') }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-from_name col-lg-6 {{ $errors->settingInfo->has('from_name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="from_name">From Name:</label>
		<input 	type="text" class="form-control col-lg-7" 
					value="{{$fromName}}" id="from_name" name="from_name" />
		@if($errors->settingInfo->has('from_name'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('from_name')) }}</span>
		@endif
	</div>
	<div class="form-group parent-txt_from_email col-lg-6 {{ $errors->settingInfo->has('txt_from_email') ? 'has-error' : '' }}  required-field">
		<label class="col-lg-5" for="txt_from_email">From Email:</label>
		<input type="email"  class="form-control col-lg-7 email" 
					value="{{$fromEmail}}" id="txt_from_email" 
					name="txt_from_email"/>
		@if($errors->settingInfo->has('txt_from_email'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_from_email')) }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-txt_to col-lg-6 {{ $errors->settingInfo->has('txt_to') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="txt_to">To:</label>
		<input type="text" class="form-control col-lg-7 email" 
				value="{{$toEmail}}" 
				id="txt_to" name="txt_to" />
		@if($errors->settingInfo->has('txt_to'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_to')) }}</span>
		@endif
	</div>
	<div class="form-group parent-txt_subject col-lg-6 {{ $errors->settingInfo->has('txt_subject') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="txt_subject">Subject:</label>
		<input type="text" class="form-control col-lg-7" 
						value="{{$subject}}" 
						id="txt_subject" 
						name="txt_subject" />
		@if($errors->settingInfo->has('txt_subject'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_subject')) }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-txt_cc col-lg-6 {{ $errors->settingInfo->has('txt_cc') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="txt_cc">CC:</label>
		<input type="text" autocomplete="off" class="form-control col-lg-7" 
					value="{{$bcc}}" 
					id="txt_cc" 
					name="txt_cc" />
		@if($errors->settingInfo->has('txt_cc'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_cc')) }}</span>
		@endif
	</div>
	<div class="form-group parent-txt_bcc col-lg-6 {{ $errors->settingInfo->has('txt_bcc') ? 'has-error' : '' }}">
			<label class="col-lg-5" for="txt_bcc">BCC:</label>
			<input type="text" autocomplete="off" class="form-control col-lg-7"
					value="{{$bcc}}" 
					id="txt_bcc" name="txt_bcc" 
					 />
			@if($errors->settingInfo->has('txt_bcc'))
				<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_bcc')) }}</span>
			@endif
	</div>
</div>
<div class="row">
	<div class="form-group parent-txtAttachment col-lg-6">
			<label class="col-lg-5" for="txtAttachment">Attachment:</label>
			<div class="col-lg-7  custom-file txtAttachment">
			  <input type="file" class="form-control  custom-file-input"
					id="txtAttachment" name="txtAttachment" 
					 />
			  <input type="hidden" class="form-control  custom-file-input"
					id="txtAttachment_hidden" name="txtAttachment_hidden" 
					 />
			  <label class="custom-file-label" for="customFile">Choose File</label> 
			</div>
			<div class="col-lg-1 show-file" style="display:none">
				<a href="" class="btn btn-primary" target="_blank">View</a>
			</div>
	</div>
</div>
<div class="row">
	<div class="form-group parent-txt_message {{ $errors->settingInfo->has('txt_message') ? 'has-error' : '' }} col-lg-12  required-field">
		<label>Message</label>
		<textarea id="txt_message" name="txt_message"
			class="form-control col-lg-12" rows="10" >{{$message}}</textarea>
		@if($errors->settingInfo->has('txt_message'))
			<span class="help-block">{{ str_replace("txt ","",$errors->settingInfo->first('txt_message')) }}</span>
		@endif		
	</div>
</div>
@if(!empty($shortCodes))
<div class="row">
	<div class="form-group col-lg-12">
		<fieldset class="fieldset-group">
			<legend>Short Codes</legend>
			<div class="form-group">
				<div class="row mx-0">
					<div class="col-12 text-theme">
						<i class="fas fa-info-circle"></i> Use below codes to add the trip information in the Mail content.
					</div>
				</div>
				@php
					$shortCodeCount = 0;
				@endphp

				@foreach($shortCodes as $shortCode)
					@if($shortCodeCount%3 == 0)
						@if($shortCodeCount != 0)
							</div>
						@endif
						<div class="row mx-0 mt-3">
					@endif

					<div class="col-lg-4">
						<b>{{ $shortCode["code"] }}</b>:<br>
						<span class="pl-4">{{ $shortCode["description"] }}</span>
					</div>

					@php $shortCodeCount++; @endphp
				@endforeach

				@if($shortCodeCount > 0)
					</div>
				@endif
			</div>
		</fieldset>
	</div>
</div>
@endif
