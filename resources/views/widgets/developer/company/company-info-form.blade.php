@php
	$companyInfo = isset($companyInfo) ? $companyInfo : (object) [];

	$company_name = old('company_name') ? old('company_name') : (isset($companyInfo->company_name) ? $companyInfo->company_name : '');
	$company_url = old('company_url') ? old('company_url') : (isset($companyInfo->company_url) ? $companyInfo->company_url : '');
	$company_gst = old('company_gst') ? old('company_gst') : (isset($companyInfo->company_gst) ? $companyInfo->company_gst : '');
	$company_pan = old('company_pan') ? old('company_pan') : (isset($companyInfo->company_pan) ? $companyInfo->company_pan : '');
	$company_cin = old('company_cin') ? old('company_cin') : (isset($companyInfo->company_cin) ? $companyInfo->company_cin : '');
	$telephone = old('telephone') ? old('telephone') : (isset($companyInfo->telephone) ? $companyInfo->telephone : '');
	$mobile = old('mobile') ? old('mobile') : (isset($companyInfo->mobile) ? $companyInfo->mobile : '');
	$fax = old('fax') ? old('fax') : (isset($companyInfo->fax) ? $companyInfo->fax : '');
	$email = old('email') ? old('email') : (isset($companyInfo->email) ? $companyInfo->email : '');
	$address1 = old('address1') ? old('address1') : (isset($companyInfo->address1) ? $companyInfo->address1 : '');
	$address2 = old('address2') ? old('address2') : (isset($companyInfo->address2) ? $companyInfo->address2 : '');
	$address3 = old('address3') ? old('address3') : (isset($companyInfo->address3) ? $companyInfo->address3 : '');
	$city = old('city') ? old('city') : (isset($companyInfo->city) ? $companyInfo->city : '');
	$pin_code = old('pin_code') ? old('pin_code') : (isset($companyInfo->pin_code) ? $companyInfo->pin_code : '');
	$state = old('state') ? old('state') : (isset($companyInfo->state) ? $companyInfo->state : '');
	$financial_year_start_date = old('financial_year_start_date') ? old('financial_year_start_date') : (isset($companyInfo->financial_year_start_date) ? $companyInfo->financial_year_start_date : '');
	$financial_start_year = old('financial_start_year')? old('financial_start_year') : (isset($companyInfo->financial_start_year) ? $companyInfo->financial_start_year : '');
	$company_logo = old('company_logo')? old('company_logo') : (isset($companyInfo->company_logo) ? $companyInfo->company_logo : '');

	$kmEditable = old('kmEditable') ? old('kmEditable') : (isset($otsParamInfo->parameter_value) ? $otsParamInfo->parameter_value : 'yes');
	$allowBookings = old('allowBookings') ? old('allowBookings') : (isset($allowBookParamInfo->parameter_value) ? $allowBookParamInfo->parameter_value : 0.00);
	

@endphp

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($companyInfo->company_id))
		<input type="hidden" name="companyId" value="{{ base64_encode($companyInfo->company_id) }}">
	@endif

	<div class="form-group col-lg-6 required-field {{ $errors->companyInfo->has('company_name') ? 'has-error' : '' }}">
		<label for="company_name">Company Name</label>
		<input type="text" class="form-control" id="company_name" name="company_name" value="{{ $company_name }}" />
		@if($errors->companyInfo->has('company_name'))
			<span class="help-block">{{ $errors->companyInfo->first('company_name') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('company_url') ? 'has-error' : '' }}">
		<label for="company_url">Website</label>
		<input type="text" class="form-control" id="company_url" name="company_url" value="{{ $company_url }}" />
		@if($errors->companyInfo->has('company_url'))
			<span class="help-block">{{ $errors->companyInfo->first('company_url') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('company_gst') ? 'has-error' : '' }}">
		<label for="company_gst">GST No</label>
		<input type="text" class="form-control" id="company_gst" name="company_gst" value="{{ $company_gst }}" />
		@if($errors->companyInfo->has('company_gst'))
			<span class="help-block">{{ $errors->companyInfo->first('company_gst') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('company_pan') ? 'has-error' : '' }}">
		<label for="company_pan">PAN No</label>
		<input type="text" class="form-control" id="company_pan" name="company_pan" value="{{ $company_pan }}" />
		@if($errors->companyInfo->has('company_pan'))
			<span class="help-block">{{ $errors->companyInfo->first('company_pan') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('company_cin') ? 'has-error' : '' }}">
		<label for="company_cin">CIN No</label>
		<input type="text" class="form-control" id="company_cin" name="company_cin" value="{{ $company_cin }}" />
		@if($errors->companyInfo->has('company_cin'))
			<span class="help-block">{{ $errors->companyInfo->first('company_cin') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('telephone') ? 'has-error' : '' }}">
		<label for="telephone">Telephone</label>
		<input type="text" class="form-control" id="telephone" name="telephone" value="{{ $telephone }}" />
		@if($errors->companyInfo->has('telephone'))
			<span class="help-block">{{ $errors->companyInfo->first('telephone') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('mobile') ? 'has-error' : '' }}">
		<label for="mobile">Mobile</label>
		<input type="text" class="form-control" id="mobile" name="mobile" value="{{ $mobile }}" />
		@if($errors->companyInfo->has('mobile'))
			<span class="help-block">{{ $errors->companyInfo->first('mobile') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6 {{ $errors->companyInfo->has('fax') ? 'has-error' : '' }}">
		<label for="fax">Fax</label>
		<input type="text" class="form-control" id="fax" name="fax" value="{{ $fax }}" />
		@if($errors->companyInfo->has('fax'))
			<span class="help-block">{{ $errors->companyInfo->first('fax') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('email') ? 'has-error' : '' }}">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" value="{{ $email }}" />
		@if($errors->companyInfo->has('email'))
			<span class="help-block">{{ $errors->companyInfo->first('email') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('address1') ? 'has-error' : '' }}">
		<label for="address1">Address 1</label>
		<input type="text" class="form-control" id="address1" name="address1" value="{{ $address1 }}" />
		@if($errors->companyInfo->has('address1'))
			<span class="help-block">{{ $errors->companyInfo->first('address1') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6 {{ $errors->companyInfo->has('address2') ? 'has-error' : '' }}">
		<label for="address2">Address 2</label>
		<input type="text" class="form-control" id="address2" name="address2" value="{{ $address2 }}" />
		@if($errors->companyInfo->has('address2'))
			<span class="help-block">{{ $errors->companyInfo->first('address2') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6 {{ $errors->companyInfo->has('address3') ? 'has-error' : '' }}">
		<label for="address3">Address 3</label>
		<input type="text" class="form-control" id="address3" name="address3" value="{{ $address3 }}" />
		@if($errors->companyInfo->has('address3'))
			<span class="help-block">{{ $errors->companyInfo->first('address3') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('city') ? 'has-error' : '' }}">
		<label for="city">City</label>
		<input type="text" class="form-control city-autocomplete" id="city" name="city" value="{{ $city }}" />
		@if($errors->companyInfo->has('city'))
			<span class="help-block">{{ $errors->companyInfo->first('city') }}</span>
		@endif
	</div>
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('pin_code') ? 'has-error' : '' }}">
		<label for="pin_code">PIN Code</label>
		<input type="text" class="form-control" id="pin_code" name="pin_code" value="{{ $pin_code }}" />
		@if($errors->companyInfo->has('pin_code'))
			<span class="help-block">{{ $errors->companyInfo->first('pin_code') }}</span>
		@endif
	</div>
</div>
<div class="row">
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('state') ? 'has-error' : '' }}">
		<label for="state">State</label>
		<select class="form-control selectpicker" data-placeholder="" id="state" name="state">
			<option></option>
			@foreach($states as $stateCode => $stateName)
				<option value="{{ $stateCode }}" {{ $stateCode == $state ? "selected" : "" }}>{{ $stateName }}</option>
			@endforeach
		</select>
		@if($errors->companyInfo->has('state'))
			<span class="help-block">{{ $errors->companyInfo->first('state') }}</span>
		@endif
		</div>
	@if(Auth::user()->usertype	==	DEVELOPER_USER_TYPE)	
	<div class="form-group col-lg-6  {{ $errors->companyInfo->has('kmEditable') ? 'has-error' : '' }}">
		<br>
		<label  for="kmEditable"> Km Editable</label>
		<label class="radio-inline">
			<input type="radio" name="kmEditable" value="yes" {{$kmEditable	==	'yes'?'checked':''}}>Yes
		</label>
		<label class="radio-inline">
			<input type="radio" name="kmEditable" value="no" {{$kmEditable	==	'no'?'checked':''}}>No
		</label>
	@if($errors->companyInfo->has('kmEditable'))
		<span class="help-block">{{ $errors->companyInfo->first('kmEditable') }}</span>
	@endif
	</div>
</div>
<div class="row">
@endif
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('company_logo') || 	$errors->companyInfo->has('hidden_company_logo') ? 'has-error' : '' }}">
		<label for="company_logo">Company Logo</label>
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="company_logo" name="company_logo" accept="image/*"/>
				@if($company_logo)
					<input type="hidden" id="hidden_company_logo" name="hidden_company_logo" value="{{ $company_logo }}" />
				@endif
				<label class="custom-file-label" style="min-height:25px"></label>
			</div>
			@if($errors->companyInfo->has('company_logo'))
				<span class="help-block">{{ $errors->companyInfo->first('company_logo') }}</span>
			@elseif($errors->companyInfo->has('hidden_company_logo'))
				<span class="help-block">{{ $errors->companyInfo->first('hidden_company_logo') }}</span>
			@endif
		@if($company_logo)
			<div class="form-group mt-3">
				<a href="{{ url(DEFAULT_UPLOADED_FILE_PATH . $company_logo) }}">
					<img class="img-thumbnail" src="{{ url(DEFAULT_UPLOADED_FILE_PATH . $company_logo) }}">
				</a>
			</div>
		@endif
	</div>
	@if(Auth::user()->usertype	==	DEVELOPER_USER_TYPE)	
	<div class="form-group col-lg-6  required-field {{ $errors->companyInfo->has('allowBookings') ? 'has-error' : '' }}">
		<label for="allowBookings">Allow Bookings</label>
		<input type="text" class="form-control number" id="allowBookings" name="allowBookings" value="{{ $allowBookings }}" />
		@if($errors->companyInfo->has('allowBookings'))
			<span class="help-block">{{ $errors->companyInfo->first('allowBookings') }}</span>
		@endif
	</div>
	@endif
</div>
