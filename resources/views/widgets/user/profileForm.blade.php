@php
	$userInfo 		=		isset($userInfo) ? $userInfo : (object) [];
	$data 			=		[
								'username' => old('username') ? old('username') : ( isset($userInfo->username) ? $userInfo->username : '' ),
								'email' => old('email') ? old('email') : ( isset($userInfo->email) ? $userInfo->email : '' ),
								'company_name' => old('company_name') ? old('company_name') : ( isset($userInfo->company_name) ? $userInfo->company_name : '' ),
							];
@endphp

@section('selectpicker', true)

@if(isset($userInfo->usertype) && $userInfo->usertype == USER_TYPE_COMPANY)
	@php
		$data["default_branch"] = old('default_branch') ? old('default_branch') : ( isset($userInfo->default_branch) ? $userInfo->default_branch : '' );
	@endphp
@endif

<div class="row">
	<div class="form-group parent-company_name col-lg-6 {{ $errors->profile->has('company_name') ? 'has-error' : '' }}">
		<label for="company_name">{{ Lang::get("Company Name") }}</label>
		<input type="text" class="form-control" id="company_name" name="company_name" value="{{ $data['company_name'] }}" readonly="true">
		@if($errors->profile->has('company_name'))
			<span class="help-block">{{ $errors->profile->first('company_name') }}</span>
		@endif
	</div>
	<div class="form-group parent-username col-lg-6 {{ $errors->profile->has('username') ? 'has-error' : '' }}">
		<label for="username">{{ Lang::get("Username") }}</label>
		<input type="text" class="form-control" id="username" name="username" value="{{ $data['username'] }}" readonly="true">
		@if($errors->profile->has('username'))
			<span class="help-block">{{ $errors->profile->first('username') }}</span>
		@endif
	</div>

	
</div>

<div class="row">
	<div class="form-group parent-email col-lg-6 {{ $errors->profile->has('email') ? 'has-error' : '' }}">
		<label for="email">{{ Lang::get("Email Address") }}</label>
		<input type="text" class="form-control" id="email" name="email" value="{{ $data['email'] }}" readonly="true">
		@if($errors->profile->has('email'))
			<span class="help-block">{{ $errors->profile->first('email') }}</span>
		@endif
	</div>
	@if(isset($data["default_branch"]))
		<div class="form-group parent-default_branch col-lg-6 {{ $errors->profile->has('default_branch') ? 'has-error' : '' }}">
			<label for="default_branch">{{ Lang::get("Default Branch") }}</label>
			@if(Auth::user()->can('modifyDefaultBranch'))
				<select class="form-control selectpicker" id="default_branch" name="default_branch" disabled="true">
					@foreach($branches as $branchId => $branchName)
						<option value="{{ $branchId }}" {{ $branchId == $data['default_branch'] ? "selected" : "" }}>{{ $branchName }}</option>
					@endforeach
				</select>
			@else
				<input type="text" class="form-control" value="{{ isset($branches[$data['default_branch']]) ? $branches[$data['default_branch']] : '' }}" readonly="true">
				<input type="hidden" id="default_branch" name="default_branch" value="{{ $data['default_branch'] }}">
			@endif
			@if($errors->profile->has('default_branch'))
				<span class="help-block">{{ $errors->profile->first('default_branch') }}</span>
			@endif
		</div>
	@endif
</div>

<script type="text/javascript">
	var defaultProfileValues = {!! json_encode($data) !!};
</script>
