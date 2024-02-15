@php

	$employeeInfo = isset($employeeInfo) ? $employeeInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';

	$data = 
	[
		'employee_code' => old('employee_code') ? old('employee_code') : (isset($employeeInfo->employee_code) ? $employeeInfo->employee_code : ''),
		'employee_type' => old('employee_type') ? old('employee_type') : (isset($employeeInfo->employee_type) ? $employeeInfo->employee_type : CODELIST_EMPLOYEE_TYPE_DRIVER),
		'name' => old('name') ? old('name') : (isset($employeeInfo->name) ? $employeeInfo->name : ''),
		'branch' => old('branch') ? old('branch') : (isset($employeeInfo->branch) ? $employeeInfo->branch : ''),
		'gender' => old('gender') ? old('gender') : (isset($employeeInfo->gender) ? $employeeInfo->gender : CODELIST_EMPLOYEE_GENDER_MALE),
		'date_of_birth' => old('date_of_birth') ? old('date_of_birth') : (isset($employeeInfo->date_of_birth) ? $employeeInfo->date_of_birth : ''),
		'aadhaar_no' => old('aadhaar_no') ? old('aadhaar_no') : (isset($employeeInfo->aadhaar_no) ? $employeeInfo->aadhaar_no : ''),
		'blood_group' => old('blood_group') ? old('blood_group') : (isset($employeeInfo->blood_group) ? $employeeInfo->blood_group : ''),
		'license_no' => old('license_no') ? old('license_no') : (isset($employeeInfo->license_no) ? $employeeInfo->license_no : ''),
		'lic_exp_date' => old('lic_exp_date') ? old('lic_exp_date') : (isset($employeeInfo->lic_exp_date) ? $employeeInfo->lic_exp_date : ''),
		'isDedicated' => old('isDedicated') ? old('isDedicated') : (isset($employeeInfo->isDedicated) ? $employeeInfo->isDedicated : ''),
		'aadhaar_card' => old('aadhaar_card') ? old('aadhaar_card') : (isset($employeeInfo->aadhaar_card) ? $employeeInfo->aadhaar_card : ''),
		'license_copy' => old('license_copy') ? old('license_copy') : (isset($employeeInfo->license_copy) ? $employeeInfo->license_copy : ''),
		'police_certificate' => old('police_certificate') ? old('police_certificate') : (isset($employeeInfo->police_certificate) ? $employeeInfo->police_certificate : ''),
		'medical_certificate' => old('medical_certificate') ? old('medical_certificate') : (isset($employeeInfo->medical_certificate) ? $employeeInfo->medical_certificate : ''),
		'date_of_joining' => old('date_of_joining') ? old('date_of_joining') : (isset($employeeInfo->date_of_joining) ? $employeeInfo->date_of_joining : ''),
		'customer' => old('customer') ? old('customer') : (isset($employeeInfo->fkcustomer_id) ? $employeeInfo->fkcustomer_id : ''),
		'police_verification_required' => old('police_verification_required') ? old('police_verification_required') : (isset($employeeInfo->police_verification_required) ? $employeeInfo->police_verification_required : 'no'),
		'parivahan_verified' => old('parivahan_verified') ? old('parivahan_verified') : (isset($employeeInfo->parivahan_verified) ? $employeeInfo->parivahan_verified : 'no'),
	];

@endphp

@var $aadhaarLayout = "col-lg-7";
@var $aadhaarInput  = "Choose file...";
@if( isset($data['aadhaar_card']) )
	@if(!empty($data['aadhaar_card']))
		@var $aadhaarLayout = "col-lg-4"
		@var $aadhaarCard 	= $data['aadhaar_card'];
		@var $aadhaarInput  = "Change file...";
	@endif
@endif

@var $licenseLayout = "col-lg-7";
@var $licenseInput  = "Choose file...";
@if( isset($data['license_copy']) )
	@if(!empty($data['license_copy']))
		@var $licenseLayout = "col-lg-4";
		@var $licenseCard 	= $data['license_copy'];
		@var $licenseInput  = "Change file...";
	@endif
@endif

@var $policeCertLayout = "col-lg-7";
@var $policeCertInput  = "Choose file...";
@if( isset($data['police_certificate']) )
	@if(!empty($data['police_certificate']))
		@var $policeCertLayout 	= "col-lg-4";
		@var $policeCertCopy 	= $data['police_certificate'];
		@var $policeCertInput	= "Change file...";
	@endif
@endif

@var $medicalCertLayout = "col-lg-7";
@var $medicalCertInput  = "Choose file...";
@if( isset($data['medical_certificate']) )
	@if(!empty($data['medical_certificate']))
		@var $medicalCertLayout = "col-lg-4";
		@var $medicalCertCopy 	= $data['medical_certificate'];
		@var $medicalCertInput	= "Change file...";
	@endif
@endif

@section('datetimepicker', true)
@section('selectpicker', true)

<div class="row">

	@if(isset($employeeInfo->employee_id))
		<input type="hidden" id="employeeId" name="employeeId" value="{{ base64_encode($employeeInfo->employee_id) }}">
	@endif

	<div class="form-group parent-employee_code col-lg-6 {{ $errors->employeeInfo->has('employee_code') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="employee_code">Employee Code</label>
		<input type="text" class="form-control col-lg-7" id="employee_code" name="employee_code" value="{{ $data['employee_code'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('employee_code'))
			<span class="help-block">{{ $errors->employeeInfo->first('employee_code') }}</span>
		@endif
	</div>
	<div class="form-group parent-branch  col-lg-6 {{ $errors->employeeInfo->has('branch') ? 'has-error' : '' }} required-field">
			<label class="col-lg-5" for="branch">Branch</label>
			<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="branch" name="branch" {{ $disabledAttribute }}>
				<option></option>
				@foreach($branches as $branchCode => $branchName)
					<option value="{{ $branchCode }}" {{ $branchCode == $data['branch'] ? "selected" : "" }}>{{ $branchName }}</option>
				@endforeach
			</select>
			@if($errors->employeeInfo->has('branch'))
				<span class="help-block">{{ $errors->employeeInfo->first('branch') }}</span>
			@endif
		</div>
</div>

<div class="row">

	<div class="form-group parent-name col-lg-6 {{ $errors->employeeInfo->has('name') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="name">Name</label>
		<input type="text" class="form-control col-lg-7" id="name" name="name" value="{{ $data['name'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('name'))
			<span class="help-block">{{ $errors->employeeInfo->first('name') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-employee_type col-lg-6 {{ $errors->employeeInfo->has('employee_type') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="employee_type">Type</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="employee_type" name="employee_type" {{ $disabledAttribute }}>
			<option></option>
			@foreach($empTypes as $empTypeCode => $empTypeName)
				<option value="{{ $empTypeCode }}" {{ $empTypeCode == $data['employee_type'] ? "selected" : "" }}>{{ $empTypeName }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('employee_type'))
			<span class="help-block">{{ $errors->employeeInfo->first('employee_type') }}</span>
		@endif
	</div>


</div>

<div class="row">

	<div class="form-group parent-date_of_birth col-lg-6 {{ $errors->employeeInfo->has('date_of_birth') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="date_of_birth">Date of Birth</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="date_of_birth" name="date_of_birth" value="{{ $data['date_of_birth'] }}" {{ $disabledAttribute }} data-default-date="{{ \OTSHelper::Date('-20 year') }}" data-max-date="{{ \OTSHelper::Date('-20 year', (date('Y') . '-12-31')) }}" />
		@if($errors->employeeInfo->has('date_of_birth'))
			<span class="help-block">{{ $errors->employeeInfo->first('date_of_birth') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-gender col-lg-6 {{ $errors->employeeInfo->has('gender') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="gender">Gender</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="gender" name="gender" {{ $disabledAttribute }}>
			<option></option>
			@foreach($genders as $genderCode => $genderName)
				<option value="{{ $genderCode }}" {{ $genderCode == $data['gender'] ? "selected" : "" }}>{{ $genderName }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('gender'))
			<span class="help-block">{{ $errors->employeeInfo->first('gender') }}</span>
		@endif
	</div>
</div>

<div class="row">
	<div class="form-group parent-blood_group col-lg-6 {{ $errors->employeeInfo->has('blood_group') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="blood_group">Blood Group</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="blood_group" name="blood_group" {{ $disabledAttribute }}>
			<option></option>
			@foreach($bloodGroups as $bloodGroupCode => $bloodGroupName)
				<option value="{{ $bloodGroupCode }}" {{ $bloodGroupCode == $data['blood_group'] ? "selected" : "" }}>{{ $bloodGroupName }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('blood_group'))
			<span class="help-block">{{ $errors->employeeInfo->first('blood_group') }}</span>
		@endif
	</div>
	
	<div class="form-group parent-date_of_joining col-lg-6 {{ $errors->employeeInfo->has('date_of_joining') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="date_of_joining">Date of Joining</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="date_of_joining" name="date_of_joining" value="{{ $data['date_of_joining'] }}" {{ $disabledAttribute }} data-max-date="{{ \OTSHelper::Date() }}" />
		@if($errors->employeeInfo->has('date_of_joining'))
			<span class="help-block">{{ $errors->employeeInfo->first('date_of_joining') }}</span>
		@endif
	</div>
</div>

<div class="row ">
	<div class="form-group parent-aadhaar_no col-lg-6 {{ $errors->employeeInfo->has('aadhaar_no') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="aadhaar_no">Aadhaar Number</label>
		<input type="text" class="form-control col-lg-7 valid_aadhaar" id="aadhaar_no" name="aadhaar_no" value="{{ $data['aadhaar_no'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('aadhaar_no'))
			<span class="help-block">{{ $errors->employeeInfo->first('aadhaar_no') }}</span>
		@endif
	</div>

	<div class="form-group col-lg-6 {{ $errors->employeeInfo->has('aadhaar_card') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="aadhaar_card">Aadhaar Card</label>
        <div class="{{$aadhaarLayout}} custom-file">
          <input type="file" class="form-control custom-file-input" name="aadhaar_card" id="customFile">
          <label class="custom-file-label" for="customFile">{{$aadhaarInput}}</label> 
        </div>
        @if( isset($aadhaarCard) )
            <div class="col-lg-1 show-file">
              	<a href="{{url("{$aadhaarCard}")}}" class="btn btn-primary">View</a>
            </div>
        @endif
        @if($errors->employeeInfo->has('aadhaar_card'))
			<span class="help-block">{{ $errors->employeeInfo->first('aadhaar_card') }}</span>
		@endif
    </div>
</div>
 
<div class="row ">

	<div class="form-group  parent-license-info parent-license_no col-lg-6 {{ $errors->employeeInfo->has('license_no') ? 'has-error' : '' }} required-field driver-field">
		<label class="col-lg-5" for="license_no">License Number</label>
		<input type="text" class="form-control col-lg-7" id="license_no" name="license_no" value="{{ $data['license_no'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('license_no'))
			<span class="help-block">{{ $errors->employeeInfo->first('license_no') }}</span>
		@endif
	</div>
    
	<div class="form-group  parent-license-info col-lg-6 {{ $errors->employeeInfo->has('license_copy') ? 'has-error' : '' }} required-field driver-field">
		<label class="col-lg-5" for="license_copy">License Copy</label>
        <div class="{{$licenseLayout}} custom-file">
          <input type="file" class="form-control custom-file-input" name="license_copy" id="customFile">
          <label class="custom-file-label" for="customFile">{{$licenseInput}}</label>
        </div>
        @if( isset($licenseCard) )
            <div class="col-lg-1 show-file">
            	<a href="{{url("{$licenseCard}")}}" class="btn btn-primary">View</a>
            </div>
        @endif
        @if($errors->employeeInfo->has('license_copy'))
			<span class="help-block">{{ $errors->employeeInfo->first('license_copy') }}</span>
		@endif
    </div>
    
</div> 

<div class="row">

	<div class="form-group parent-license-info parent-lic_exp_date col-lg-6 {{ $errors->employeeInfo->has('lic_exp_date') ? 'has-error' : '' }} required-field driver-field">
		<label class="col-lg-5" for="lic_exp_date">License Expiry Date</label>
		<input type="text" class="form-control col-lg-7 date-picker" id="lic_exp_date" name="lic_exp_date" value="{{ $data['lic_exp_date'] }}" {{ $disabledAttribute }} />
		@if($errors->employeeInfo->has('lic_exp_date'))
			<span class="help-block">{{ $errors->employeeInfo->first('lic_exp_date') }}</span>
		@endif
	</div>
	
	<div class="form-group col-lg-6 {{ $errors->employeeInfo->has('medical_certificate') ? 'has-error' : '' }} driver-field">
		<label class="col-lg-5" for="medical_certificate">Medical Certificate</label>
        <div class="{{$medicalCertLayout}} custom-file">
          <input type="file" class="form-control custom-file-input" name="medical_certificate" id="customFile">
          <label class="custom-file-label" for="customFile">{{$medicalCertInput}}</label> 
        </div>
        @if( isset($medicalCertCopy) )
            <div class="col-lg-1 show-file">
              	<a href="{{url("{$medicalCertCopy}")}}" class="btn btn-primary">View</a>
            </div>
        @endif
        @if($errors->employeeInfo->has('medical_certificate'))
			<span class="help-block">{{ $errors->employeeInfo->first('medical_certificate') }}</span>
		@endif
    </div>
</div>
<div class="row">
	<div class="form-group col-lg-6">
		<div class="form-group">
			<label class="col-lg-5" for="parivahan"> Parivahan Verified </label>
			<label class="radio-inline">
				<input type="radio" name="parivahan_verified" value="yes" {{($data['parivahan_verified']	 ===	"yes")?"checked":""}} {{ $disabledAttribute }}>Yes
			</label>
			<label class="radio-inline">
				<input type="radio" name="parivahan_verified"  value="no" {{($data['parivahan_verified']	===	"no")?"checked":""}} {{ $disabledAttribute }}>No
			</label>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group col-lg-6">
		
		<div class="form-group">
			<label class="col-lg-5" for="branch">Police Verification Required</label>
			<label class="radio-inline">
				<input type="radio" name="police_verification_required" value="yes"
				{{($data['police_verification_required']	===	"yes")?"checked":""}}
				{{ $disabledAttribute }}>Yes
			</label>
			<label class="radio-inline">
				<input type="radio" name="police_verification_required"  value="no" {{($data['police_verification_required']	===	"no")?"checked":""}}{{ $disabledAttribute }}>No
			</label>
		</div>
		<div class="form-group {{ $errors->employeeInfo->has('isDedicated') ? 'has-error' : '' }}">
			<div class="custom-control col-lg-5 custom-checkbox mt-2">
				<input type="checkbox" class="custom-control-input" id="isDedicated" name="isDedicated" value="yes" {{ $data['isDedicated'] ? 'checked="true"' : '' }} {{ $disabledAttribute }} />
				<label class="custom-control-label" for="isDedicated">Dedicated to Customer</label>
			</div>
			@if($errors->employeeInfo->has('isDedicated'))
				<span class="help-block">{{ $errors->employeeInfo->first('isDedicated') }}</span>
			@endif
		</div>
	</div>

	<div class="form-group col-lg-6 parent-police-verify-certificate {{ $errors->employeeInfo->has('police_verify_certificate') ? 'has-error' : '' }}" style='display:none' >
		<label class="col-lg-5" for="police_certificate">Police  Verification Certificate</label>
        <div class="{{$policeCertLayout}} custom-file">
          <input type="file" class="form-control custom-file-input" name="police_verify_certificate" id="police_verify_certificate">
          <input type="hidden" name="police_verify_certificate_hidden" value="{{$data['police_certificate']}}">
          <label class="custom-file-label" for="customFile">{{$policeCertInput}}</label> 
        </div>
        @if( isset($policeCertCopy) )
            <div class="col-lg-1 show-file">
              	<a href="{{url("{$policeCertCopy}")}}" class="btn btn-primary">View</a>
            </div>
        @endif
        @if($errors->employeeInfo->has('police_verify_certificate'))
			<span class="help-block">{{ $errors->employeeInfo->first('police_verify_certificate') }}</span>
		@endif
    </div>
</div>

<div class="row">
	<div class="form-group parent-customer col-lg-6 required-field {{ $errors->employeeInfo->has('customer') ? 'has-error' : '' }}" style='display:none' id="dedicatedCustomerBlock" >
		<label class="col-lg-5" for="customer">Customer</label>
		<select class="form-control col-lg-7 selectpicker" data-placeholder="" id="customer" name="customer" {{ $disabledAttribute }}>
			<option></option>
			@foreach($hotelCoporateCustomer as $id => $name)
				<option value="{{ $id }}" {{ $id == $data['customer'] ? "selected" : "" }}>{{ $name }}</option>
			@endforeach
		</select>
		@if($errors->employeeInfo->has('customer'))
			<span class="help-block">
				{{ str_replace(" checkbox is yes"," Dedicated to Customer is checked",$errors->employeeInfo->first('customer')) }}
			</span>
		@endif
	</div>
</div>
<script type="text/javascript">
	var defaultEmpValues = {!! json_encode($data) !!};
	const empTypeDriver = {!! CODELIST_EMPLOYEE_TYPE_DRIVER !!};
</script>
