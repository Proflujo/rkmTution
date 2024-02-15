<script type="text/html" id="templateInvExportOptions">
	<form id="frmExportInvoice_XYZ">

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="invoiceDetail" name="detailsToExport[]" value="invoice-details" checked="true" />
				<label class="custom-control-label" for="invoiceDetail">Invoice Details</label>
			</div>
		</div>

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="tripSummary" name="detailsToExport[]" value="trip-summary" />
				<label class="custom-control-label" for="tripSummary">Trip Summary</label>
			</div>
		</div>

		<div class="row margin-h-0">
			<div class="custom-control col-lg-12 custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="tripDetails" name="detailsToExport[]" value="trip-details" />
				<label class="custom-control-label" for="tripDetails">Trip Details</label>
			</div>
		</div>

	</form>
</script>

<script type="text/javascript">
	$(document).on('click', '.btn-export', function(e){
		e.preventDefault();
		showInvoiceExportOptions($(this));
	});

	$(document).on('click', '#btnExportDetails', function(e){
		e.preventDefault();
		var exportUrl = $(document).prop('exportUrl');

		if(typeof(exportUrl) != 'undefined'){
			window.location.href = exportUrl + '?' + getSelectedInvoiceExportOptions();
		}
	});

	function showInvoiceExportOptions(element)
	{
		$(document).prop('exportUrl', element.attr('href'));
		var html = $('#templateInvExportOptions').html();
			html = html.replace(/\_XYZ/g, '');
		var exportBtnHtml = '<button class=\"btn\" id=\"btnExportDetails\">Export</button>';

		showModelWindow('Choose the details to be exported', html, exportBtnHtml, '', true);
	}

	function getSelectedInvoiceExportOptions()
	{
		var query = '';
		var form = $('#modal-dialog #frmExportInvoice');

		if(typeof(form) != 'undefined' && form.length > 0){
			query = new URLSearchParams(new FormData(form[0])).toString();
		}

		return query;
	}
</script>