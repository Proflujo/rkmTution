<script type="text/html" id="templateTripSheetDetails">
	<div class="row trips" id="contTrip_XYZ">
		<fieldset class="fieldset-group small-text">
			<legend id="lblTripSheetNo_XYZ"></legend>
			<div class="form-group">

				<div class="row">
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Customer </label>
						<label id="lblCustomer_XYZ"></label>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Start Date </label>
						<label id="lblStartDate_XYZ"></label>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">End Date </label>
						<label id="lblEndDate_XYZ"></label>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Vehicle </label>
						<label id="lblVehicle_XYZ"></label> (<label id="lblVehicleType_XYZ"></label>)
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Driver </label>
						<label id="lblDriver_XYZ"></label>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Package </label>
						<label id="lblPackage_XYZ"></label>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Total Km </label>
						<label id="lblTotalKm_XYZ"></label>
					</div>
					<div class="form-group col-lg-6">
						<label class="col-lg-4 label">Total Amount (&#8377;) </label>
						<label id="lblTotalAmount_XYZ"></label>
					</div>
				</div>

			</div>
		</fieldset>
	</div>
</script>

<script type="text/javascript">
	function showRetailInvoiceTripSheetDetails(data)
	{
		// Generating trip details
		var parent = $('.tab-pane#tripDetails');
		var index = parent.children('.trips').length;
		var template = $('#templateTripSheetDetails').html();
			template = template.replace(/\_XYZ/g, index);
		parent.append(template);

		// Updating trip details
		// fields object : index => element id, value => column name
		var fields = 	{
							'lblTripSheetNo': 'tripSheetNo', 'lblCustomer': 'customerName',
							'lblStartDate': 'startDateTime', 'lblEndDate': 'endDateTime',
							'lblVehicle': 'vehicleNo', 'lblVehicleType': 'vehicleType',
							'lblDriver': 'driverName', 'lblPackage': 'custPkg', 'lblPackage': 'custPkg',
							'lblTotalKm': 'totalKm', 'lblTotalAmount': 'totalAmount'
						};
		var tripDetail = $('#contTrip' + index);
		$.each(fields, function(field, column){
			tripDetail.find('#' + field + index).html(data[column]);
		});
	}
</script>