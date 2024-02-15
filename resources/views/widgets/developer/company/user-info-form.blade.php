@php
	$userInfo = isset($userInfo) ? $userInfo : (object) [];

	$username = old('username') ? old('username') : (isset($userInfo->username) ? $userInfo->username : '');
	$email = old('email') ? old('email') : (isset($userInfo->email) ? $userInfo->email : '');
	$default_branch = old('default_branch') ? old('default_branch') : (isset($userInfo->default_branch) ? $userInfo->default_branch : '');
	$disableAtttribute	=	($transType)=='view'?"disabled":"";
@endphp

@section('selectpicker', true)

<fieldset {{$disableAtttribute}}>
@if(isset($bookingInfo->booking_id))
	<input type="hidden" name="userId" value="{{ base64_encode($userInfo->user_id) }}">
@endif
<div class="row">
	<div class="form-group col-lg-6 {{ $errors->userInfo->has('username') ? 'has-error' : '' }}">
		<label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" autocomplete="off" value="{{ $username }}" />
		@if($errors->userInfo->has('username'))
			<span class="help-block">{{ $errors->userInfo->first('username') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6 {{ $errors->userInfo->has('email') ? 'has-error' : '' }}">
		<label for="email">Email address</label>
		<input type="text" class="form-control" id="email" name="email" autocomplete="off" value="{{ $email }}" />
		@if($errors->userInfo->has('email'))
			<span class="help-block">{{ $errors->userInfo->first('email') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6 {{ $errors->userInfo->has('password') ? 'has-error' : '' }}">
		<label for="password">Password</label>
		<input type="password" class="form-control" id="password" name="password" autocomplete="new-password"  />
		@if($errors->userInfo->has('password'))
			<span class="help-block">{{ $errors->userInfo->first('password') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6">
		<label for="password_confirmation">Confirm Password</label>
		<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password" />
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6 {{ $errors->userInfo->has('default_branch') ? 'has-error' : '' }}">
		<label for="password">Default Branch</label>
		<select class="form-control selectpicker" id="default_branch" name="default_branch">
			@foreach($branches as $branchId => $branchName)
				<option value="{{ $branchId }}" {{ $branchId == $default_branch ? "selected" : "" }}>{{ $branchName }}</option>
			@endforeach
		</select>
		@if($errors->userInfo->has('default_branch'))
			<span class="help-block">{{ $errors->userInfo->first('default_branch') }}</span>
		@endif
	</div>
</div>
</fieldset>
