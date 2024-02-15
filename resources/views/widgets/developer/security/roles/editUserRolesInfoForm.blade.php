@php 
	$role 		= 	!empty(old('role')) ? old('role') : [];
@endphp

@php
	$role 		= 	empty($role) ? $user->role_ids : $role;
	$roleArry	=	explode(",",$role);
@endphp

<div class="row">
	<div class="col-lg-8">
		<div class="row">
			<div class="split left col-lg-6 ">
				<label class="col-md-12 control-label">
					{{ Lang::get("Name:") }}:
				</label>
				<label class="col-md-12 control-label pl-5">
					{{ $user->name }}
				</label>
				<label class="col-md-12 control-label">
					{{ Lang::get("E-Mail Address:") }}:
				</label>
				<label class="col-md-12 control-label pl-5">
					{{ $user->email }}
				</label>
			</div>

			<div class="split right  col-lg-6 ">
				<div class="form-group{{ $errors->userRole->has('role') ? ' has-error' : '' }}" id="rolesContainerParent">
					<label for="role" class="col-md-12 control-label">{{ Lang::get("Role") }}</label>

					<div class="col-md-12">
						@if (isset($allRoles) && !empty($allRoles))
							@foreach($allRoles as $index => $value)

								<div class="custom-control col-md-12 custom-checkbox">
									<input id="rbtnRole_{{ $index }}" type="checkbox" class="custom-control-input" name="role[]" value="{{ $value->role_id }}" {{ in_array($value->role_id,$roleArry) ? 'checked' : '' }}>
									<label class="custom-control-label" for="rbtnRole_{{ $index }}">{{ $value->role }}</label>
								</div>

							@endforeach
						@endif

						@if ($errors->userRole->has('role'))
							<span class="help-block">
								<strong>{{ $errors->userRole->first('role') }}</strong>
							</span>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
