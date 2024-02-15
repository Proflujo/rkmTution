@hasSection('datetimepicker')
@else
	@include('widgets.common.plugins.datetimepicker.datetimepickerStyle')
	@include('widgets.common.plugins.datetimepicker.datetimepickerScript')
@endif

<script type="text/html" id="templateSettingsExportOptions">
	<form id="frmExportSettings" autocomplete="off">
		<div class="row margin">
			<div class="form-group col-lg-6">
				<label class="float-left" for="fromDate">From Date: </label>
				<input type="text" class="form-control col-lg-7 date-picker" name ="fromDate" id="fromDate" data-default-date="{{ \OTSHelper::Date('-6 days') }}">
			</div>

			<div class="form-group col-lg-6">
				<label class="float-left " for="toDate">To Date: </label>
				<input type="text" class="form-control col-lg-7 date-picker" name ="toDate" id="toDate" data-default-date="{{ \OTSHelper::Date() }}">
			</div>
		</div>

		<div class="row margin">
			<div class="form-group">
				<label class="float-left"></label>
				<input type="hidden" class="form-control col-lg-7" name ="exportDate" id="exportDate" data-default-date="{{ \OTSHelper::Date() }}">
			</div>
		</div>

		<div class="row margin col-lg-12">
			<div class="custom-control custom-radio col-lg-3">
				<input type="radio" class="custom-control-input" id="fresh" name="includeType" value="1" checked="true">
				<label class="custom-control-label" for="fresh">Fresh</label>
			</div>

			<div class="custom-control custom-radio col-lg-3">
				<input type="radio" class="custom-control-input" id="all" name="includeType" value="2">
				<label class="custom-control-label" for="all">All</label>
			</div>
		</div><br>

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="invoice" name="detailsToExport[]" value="InvoiceDetails" checked="true"/>
				<label class="custom-control-label" for="invoice">Invoice</label>
			</div>
		</div>

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="purchase" name="detailsToExport[]" value="PurchaseDetails"/>
				<label class="custom-control-label" for="purchase">Purchase</label>
			</div>
		</div>

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="expanse" name="detailsToExport[]" value="ExpenseDetails"/>
				<label class="custom-control-label" for="expanse">Expense</label>
			</div>
		</div>

	</form>
</script>

<script type="text/javascript">
	var exportUrl = "{{ url('/user/manage/company/exportexcelsheet') }}";
	
	$(document).on('click', '#exportSettingsForm', function(e){
		e.preventDefault();
		showSettingsExportOptions($(this));
	});

	function showSettingsExportOptions(element)
	{
		$(document).prop('exportUrl', element.attr('href'));
		var html  = $('#templateSettingsExportOptions').html();
			html  = html.replace(/\_XYZ/g, '');
		var exportBtnHtml = "<button class=\"btn\" name=\"btnDetailExport\" id=\"btnDetailExport\">Export</button>";

		showModelWindow('The Details to be Select and Export', html, exportBtnHtml, '', true);
	}

   $(document).on('click', '#btnDetailExport',function()
   {
     var checked = [];

		 $("input[type='checkbox']:checked").each(function() 
		 {            
		    checked.push($(this).val());
		  });

		if (checked > $(this).val()) 
		{
		 window.location.href = exportUrl + '?' + getSelectedSettingsExportOptions();
		}

		else
		{
			alert("Please Select the Check box");
		}
   	});

	$(document).on('shown.bs.modal', '.modal:has(#frmExportSettings)', function(){
		makeDateTimePicker($(this).find('#fromDate'));
		makeDateTimePicker($(this).find('#toDate'));
		makeDateTimePicker($(this).find('#exportDate'));
	});

	$(document).on('click', '.date-picker', function(e){
		$(".modal-body").removeAttr("style");
		$(".modal-body").attr("style","overflow-y:visible");
	})
	.on('focus', '.date-picker', function(e){
		$(".modal-body").removeAttr("style");
		$(".modal-body").attr("style","overflow-y:visible");
	});

   function getSelectedSettingsExportOptions()
	{
		var query = '';
		var form = $('#modal-dialog #frmExportSettings');

		if(typeof(form) != 'undefined' && form.length > 0){
		   query = new URLSearchParams(new FormData(form[0])).toString();
		}
		console.log(query);
		return query;
	}
</script>
