@php

	$settingInfo = isset($generalSettingInfo) ? $generalSettingInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];

	$data = 
	[
		'invoiceNoPrefix' => old('invoiceNoPrefix') ? old('invoiceNoPrefix') : ( isset($settingInfo->invoiceNoPrefix) ? $settingInfo->invoiceNoPrefix : (isset($defaultValues['invoiceNoPrefix']) ? $defaultValues['invoiceNoPrefix'] : '') ),

	];
	$kmEditable = old('kmEditable') ? old('kmEditable') : (isset($otsParamInfo->parameter_value) ? $otsParamInfo->parameter_value : 'yes');

@endphp

<style type="text/css">
	.parent-taxes .card
	{
		margin: 5px;
	}
</style>

<div class="row">

	<div class="form-group parent-invoiceNoPrefix col-lg-6 {{ $errors->settingInfo->has('invoiceNoPrefix') ? 'has-error' : '' }} required-field">
		<label class="col-lg-5" for="invoiceNoPrefix">Invoice No Format</label>
		<table class="form-input-table text-box-no-border col-lg-7">
			<tbody>
				<tr>
					<td>Prefix</td>
					<td>Year</td>
					<td>Month</td>
					<td>Seq</td>
				</tr>
				<tr>
					<td>
						<input type="text" class="form-control width-3 input-length-3 input-uppercase padding-0" id="invoiceNoPrefix" name="invoiceNoPrefix" value="{{ $data['invoiceNoPrefix'] }}">
					</td>
					<td>{{ date('Y') }}</td>
					<td>{{ date('m') }}</td>
					<td>{{ str_pad('', INV_SEQ_NO_DIGITS, '0', STR_PAD_LEFT) }}</td>
				</tr>
			</tbody>
		</table>
		@if($errors->settingInfo->has('invoiceNoPrefix'))
			<span class="help-block">{{ $errors->settingInfo->first('invoiceNoPrefix') }}</span>
		@endif
	</div>

	<div class="form-group parent-taxes col-lg-6">
		<fieldset class="fieldset-group col-lg-12">
			<legend>
				Taxes
				<span>
					@if(auth()->user()->can('editTax'))
					<a id="btnAddTax" href="javascript:void(0);" title="Add New Tax"><i class="fas fa-plus-circle"></i></a>
					@endif
					<a class="ml-1" id="btnRefreshTaxTbl" href="javascript:void(0);" title="Refresh"><i class="fas fa-sync"></i></a>
				</span>
			</legend>

			<div class="form-group">
				<div class="table-responsive">

					<table class="table" id="tblTaxesList">
						<thead>
							<tr>
								<th>Name</th>
								<th class="text-right">Gst Code</th>
								<th class="text-right">Percent (%)</th>
								<th>Effective Date</th>
								@if(auth()->user()->can('editTax'))
								<th class="text-center">Action</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@if(isset($taxes) && !empty($taxes))
								@foreach($taxes as $tax)
									<tr>
										<td>{{ $tax->tax_name }}</td>
										<td class="text-right">{{ $tax->gst_state_code }}</td>
										<td class="text-right">{{ $tax->rate }}</td>
										<td>{{ $tax->formatedEffectiveDate }}</td>
										@if(auth()->user()->can('editTax'))
										<td class="text-center">
											<a class="text-theme btnEditTax" title="Edit" data-tax-id="{{ $tax->tax_id }}"><i class="fas fa-pencil-alt"></i></a>
											/ <a class="text-danger btnDeleteTax" title="Delete" data-tax-id="{{ $tax->tax_id }}"><i class="fas fa-times"></i></a>
										</td>
										@endif
									</tr>
								@endforeach
							@else
								<tr>
									<td class="text-center no-data" colspan="4">No data found</td>
								</tr>
							@endif
						</tbody>
					</table>

				</div>
			</div>
		</fieldset>
	</div>

</div>
<div class="row">
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
<script type="text/html" id="templateTaxInfo">
	<form id="frmTaxInfo_XYZ">
		<input type="hidden" class="form-control" id="taxId_XYZ" name="taxId_XYZ" />

		<div class="row">
			<div class="col-lg-5 required-field">
				<label for="name_XYZ">Name</label>
			</div>
			<div class="col-lg-7 form-group">
				<input type="text" class="form-control" id="name_XYZ" name="name_XYZ" />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 required-field">
				<label for="stateCode_XYZ">State Code</label>
			</div>
			<div class="col-lg-7 form-group">
				<input type="text" class="form-control" id="stateCode_XYZ" name="stateCode_XYZ" />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 required-field">
				<label for="percent_XYZ">Percent (%)</label>
			</div>
			<div class="col-lg-7 form-group">
				<input type="text" class="form-control" id="percent_XYZ" name="percent_XYZ" />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-5 required-field">
				<label for="effectiveDate_XYZ">Effective Date</label>
			</div>
			<div class="col-lg-7 form-group">
				<input type="text" class="form-control date-picker_XYZ" id="effectiveDate_XYZ" name="effectiveDate_XYZ" value="{{ date('d-m-Y') }}" />
			</div>
		</div>
	</form>
</script>

<script type="text/javascript">
	const canUserEditTaxInfo = '{{ auth()->user()->can("editTax") ? "yes" : "no" }}';

	function showTaxInfoPopup(action = 'add')
	{
		var title = 'Tax Details &mdash; ' + ucfirst(action);
		var html = $('#templateTaxInfo').html();
			html = html.replace(/\_XYZ/g, '');
		var saveBtn = '<button class="btn" id="btnSaveTaxInfo">Save</button>';

		$(document).prop('taxPopupAction', action);

		showModelWindow(title, html, saveBtn, '', true);
	}

	function collectTaxInfo()
	{
		var taxId = $(document).prop('editingTaxId');

		if(typeof(taxId) != 'undefined'){
			var form = $('.modal #frmTaxInfo');
			var success = function(data){
				if(data && !$.isEmpty(data) && typeof(data.data) != 'undefined'){
					var fields = ['name', 'stateCode', 'percent', 'effectiveDate'];
					var values = ['tax_name', 'gst_state_code', 'rate', 'formatedEffectiveDate'];

					$.each(fields, function(index, field){
						form.find('#' + field).val(data.data[values[index]]);
					});

					form.find('#taxId').val(btoa(data.data.tax_id));
				}else{
					setTimeout(function(){
						form.closest('.modal').modal('hide');
					}, 500);
				}
			};

			createJSONAjax(baseUrl + '/user/manage/company/general-settings/tax/info/' + btoa(taxId), 'GET', success, '', form);
		}
	}

	function showTaxFieldMessage(field, message)
	{
		var parent = field.closest('.form-group');
		var errBlock = parent.find('.help-block');

		if(!parent.hasClass('has-error')){
			parent.addClass('has-error');
		}

		if(errBlock.length == 0){
			parent.append('<span class=\"help-block\">' + message + '</span>');
		}else{
			errBlock.html(message);
		}

		var showingElement = null;

		if(field.prop('tagName') == 'INPUT' && field.prop('type') == 'file'){
			showingElement = field.closest('.custom-file');
		}else if(field.prop('tagName') == 'SELECT'){
			showingElement = parent.find('.select2-container');
		}else{
			showingElement = field;
		}

		showingElement.removeClass('shake');

		setTimeout(function(){
			showingElement.addClass('shake');
		}, 10);
	}

	function refreshTaxesTable()
	{
		var success = function(data){
			if(typeof(data.list) != 'undefined'){
				var taxesTbl = $('#tblTaxesList');
				var taxesHtml = '';

				$.each(data.list, function(i, tax){
					taxesHtml +=  '<tr>' 
								+ '<td>' + tax.tax_name +'</td>'
								+ '<td class=\"text-right\">' + tax.gst_state_code +'</td>'
								+ '<td class=\"text-right\">' + tax.rate +'</td>'
								+ '<td>' + tax.formatedEffectiveDate +'</td>';

					if(canUserEditTaxInfo == 'yes') {
						taxesHtml +=  '<td class="text-center">' 
									+ '<a class="text-theme btnEditTax" title="Edit" data-tax-id=\"' + tax.tax_id + '\"><i class="fas fa-pencil-alt"></i></a>'
									+ ' / <a class="text-danger btnDeleteTax" title="Delete" data-tax-id=\"' + tax.tax_id + '\"><i class="fas fa-times"></i></a>'
								  '</td>';
					}

					taxesHtml += '</tr>';
				});

				if(data.list.length == 0){
					taxesHtml = '<tr><td class=\"text-center no-data\" colspan=\"' + taxesTbl.find('> thead th').length + '\">No data found</td></tr>';
				}

				taxesTbl.find('> tbody').html(taxesHtml);

				$('#btnRefreshTaxTbl > .fa-sync').removeClass('fa-spin');
				$('#btnRefreshTaxTbl').removeClass('spin-faster');
			}
		};

		createJSONAjax(baseUrl + '/user/manage/company/general-settings/taxes/list', 'GET', success, '', $('.parent-taxes'));
	}

	function saveTaxInfo()
	{
		var form = $('.modal #frmTaxInfo');
			form.find('.has-error').removeClass('has-error');
			form.find('.help-block').remove();
		var input = {};

		$.each(form.serializeArray(), function(i, field){
			input[field.name] = field.value;
		});

		var success = function(data){
			if(typeof(data.errors) != 'undefined'){
				$.each(data.errors, function(field, msg){
					showTaxFieldMessage(form.find('#' + field), msg[0]);
				});
			}

			if(typeof(data.alert) != 'undefined'){
				showToastMessage(data.alert);

				if(data.alert.type == 'success'){
					form.closest('.modal').modal('hide');
					refreshTaxesTable();
				}
			}
		};

		createJSONAjax(baseUrl + '/user/manage/company/general-settings/taxes/save', 'POST', success, input, form);
	}

	function removeTaxInfo(taxId)
	{
		if(taxId){
			var success = function(data){
				if(typeof(data.alert) != 'undefined'){
					showToastMessage(data.alert);

					if(data.alert.type == 'success'){
						refreshTaxesTable();
					}
				}
			};

			createJSONAjax(baseUrl + '/user/manage/company/general-settings/tax/delete/' + btoa(taxId), 'GET', success, '', $('.parent-taxes'));
		}
	}

	$(document).on('show.bs.modal', '.modal:has(#frmTaxInfo)', function(){
		var action = $(document).prop('taxPopupAction');

		if(action == 'edit'){
			collectTaxInfo();
		}
	});

	$(document).on('shown.bs.modal', '.modal:has(#frmTaxInfo)', function(){
		makeDateTimePicker($(this).find('#effectiveDate'));
		$(this).find('#name').focus();
	});

	$(document).on('hide.bs.modal', '.modal:has(#frmTaxInfo)', function(){
		makeDateTimePicker($(this).find('#effectiveDate'));
	});

	$(document).on('click', '.modal #effectiveDate', function(e){
		$(this).closest('.modal-body').removeAttr('style');
		$(this).closest('.modal-body').attr('style', 'overflow-y: visible');
	}).on('focus', '#insuranceDate', function(e){
		$(this).closest('.modal-body').removeAttr('style');
		$(this).closest('.modal-body').attr('style', 'overflow-y: visible');
	});

	$(document).on('click', '.modal #btnSaveTaxInfo', function(e){
		e.preventDefault();
		$(this).closest('.modal').find('#frmTaxInfo').submit();
	});

	$(document).on('submit', '.modal #frmTaxInfo', function(e){
		e.preventDefault();
		saveTaxInfo();
	});

	$(document).on('click', '#btnRefreshTaxTbl', function(e){
		e.preventDefault();
		$(this).addClass('spin-faster');
		$(this).find('> .fa-sync').addClass('fa-spin');

		refreshTaxesTable();
	});

	$(document).on('click', '#btnAddTax', function(e){
		e.preventDefault();
		showTaxInfoPopup();
	});

	$(document).on('click', '.btnEditTax', function(e){
		e.preventDefault();
		$(document).prop('editingTaxId', $(this).attr('data-tax-id'));
		showTaxInfoPopup('edit');
	});

	$(document).on('click', '.btnDeleteTax', function(e){
		e.preventDefault();
		var conf = confirm('Are you sure you want to delete this tax?');
		if(conf){
			removeTaxInfo($(this).attr('data-tax-id'));
		}
	});
</script>
