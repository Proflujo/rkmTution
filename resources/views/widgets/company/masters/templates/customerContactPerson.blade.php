@php
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
@endphp

<fieldset class="fieldset-group contact-person" disabled="disabled">
	<legend>Contact Person #<span class="person-index">_XYZ</span>
		@if(!$disableEditing)
			<div class="action-btns">
				<a class="btn-remove-person" href="javascript:void(0);"><i class="fa fa-times-circle"></i></a>
			</div>
		@endif
	</legend>
	<div class="form-group">
		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][name] col-lg-6 required-field">
				<label class="col-lg-5" for="contact_person_XYZ_name">Name</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_name" name="contact_person[_XYZ][name]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][designation] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_designation">Designation</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_designation" name="contact_person[_XYZ][designation]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][address1] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_address1">Address 1</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_address1" name="contact_person[_XYZ][address1]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][address2] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_address2">Address 2</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_address2" name="contact_person[_XYZ][address2]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][address3] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_address3">Address 3</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_address3" name="contact_person[_XYZ][address3]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][pin_code] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_pin_code">PIN Code</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_pin_code" name="contact_person[_XYZ][pin_code]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][city] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_city">City</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_city" name="contact_person[_XYZ][city]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][state] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_state">State</label>
				<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="contact_person_XYZ_state" name="contact_person[_XYZ][state]" {{ $disabledAttribute }}>
					<option></option>
					@foreach($states as $stateCode => $stateName)
						<option value="{{ $stateCode }}">{{ $stateName }}</option>
					@endforeach
				</select>
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][email] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_email">Email Address</label>
				<input type="contact_person[_XYZ][email]" class="form-control col-lg-7" id="contact_person_XYZ_email" name="contact_person[_XYZ][email]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][phone] col-lg-6 required-field">
				<label class="col-lg-5" for="contact_person_XYZ_phone">Phone Number</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_phone" name="contact_person[_XYZ][phone]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][mobile_phone] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_mobile_phone">Mobile Number</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_mobile_phone" name="contact_person[_XYZ][mobile_phone]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][office_phone] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_office_phone">Office Phone Number</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_office_phone" name="contact_person[_XYZ][office_phone]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][office_phone_ext] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_office_phone_ext">Office Phone Extension Number</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_office_phone_ext" name="contact_person[_XYZ][office_phone_ext]" value="" {{ $disabledAttribute }} />
			</div>

			<div class="form-group parent-contact_person[_XYZ][phone_alternate] col-lg-6">
				<label class="col-lg-5" for="contact_person_XYZ_phone_alternate">Alternate Phone Number</label>
				<input type="text" class="form-control col-lg-7" id="contact_person_XYZ_phone_alternate" name="contact_person[_XYZ][phone_alternate]" value="" {{ $disabledAttribute }} />
			</div>

		</div>

		<div class="row">

			<div class="form-group parent-contact_person[_XYZ][default_key_contact] col-lg-6">
				<div class="custom-control col-md-12 custom-checkbox">
					<input type="checkbox" class="custom-control-input single-selection" id="contact_person_XYZ_default_key_contact" name="contact_person[_XYZ][default_key_contact]" value="yes" {{ $disabledAttribute }} />
					<label class="custom-control-label" for="contact_person_XYZ_default_key_contact">Default Contact</label>
				</div>
			</div>

		</div>
	</div>
</fieldset>
