@include("widgets.export.printPDF-CSS-Styles")

<script type="text/html" id="templateExportInvoice-SingleTripSheet">
	<div class="hide panelPrintContent" style="display: none;">
		<table border="1">
			<tbody>
				<tr>
					<td class="padding-10" align="center">
						<img class="companyLogo" src="COMPANY_LOGO" style="max-width: 91px; max-height: 38px;" onerror="this.src='{{ $appLogo }}'">
					</td>
					<td class="padding-10" colspan="5">
						<h6 style="margin: 0;">COMPANY_NAME</h6>
						COMPANY_ADDRESS<br>
						<i class="fas fa-phone transform-rotate-90-deg"></i> COMPANY_CONTACT_PHONE_NO<br>
						<i class="fas fa-envelope"></i> COMPANY_CONTACT_EMAIL_ID
					</td>
					<td class="padding-10" colspan="3">
						GST No: COMPANY_GST_NO<br>
						PAN No: COMPANY_PAN_NO<br>
						CIN No: COMPANY_CIN_NO<br>
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-right-0" align="left" width="10%">
						Invoice No:
					</td>
					<td class="padding-10 border-x-0" align="left" width="10%">
						INVOICE_NO
					</td>
					<td class="padding-10 border-right-0" align="left" width="10%">
						Date:
					</td>
					<td class="padding-10 border-x-0" align="left" width="10%">
						INVOICE_DATE
					</td>
					<td class="padding-10 border-right-0" align="left" width="10%">
						TS No:
					</td>
					<td class="padding-10 border-left-0" align="left" width="10%">
						TRIP_SHEET_NO
					</td>
					<td colspan="3" rowspan="4" class="padding-10" width="40%" style="vertical-align: top;">
						To: <br>CUSTOMER_NAME<br>
						CUSTOMER_ADDRESS<br>
						<span class="only-for-{{ CODELIST_INV_TYPE_GROUP }} only-for-{{ CODELIST_INV_TYPE_MONTHLY }}" style="display: none;">GST: CUSTOMER_GST</span>
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Vehicle No
					</td>
					<td class="padding-10 border-0" colspan="2" align="left" width="10%">
						: <span style="display: inline;">VEHICLE_NO</span>
					</td>
					<td class="padding-10 border-0" width="10%">
						Type
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: VEHICLE_TYPE
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Place From
					</td>
					<td class="padding-10 border-0" colspan="2" align="left" width="10%">
						: PLACE_FROM
					</td>
					<td class="padding-10 border-0" width="10%">
						To
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: PLACE_TO
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Driver Name
					</td>
					<td class="padding-10 border-0" colspan="2" width="10%" style="max-width: 1px;">
						: <span style="display: inline;">DRIVER_NAME</span>
					</td>
					<td class="padding-10 border-0" width="10%">
						&nbsp;
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Opening KM
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: OPENING_KM
					</td>
					<td class="padding-10 border-0" width="10%">
						Closing KM
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: CLOSING_KM
					</td>
					<td colspan="3" rowspan="CHARGES_BLANK_TD_ROW_SPAN">
						<table border="0" class="width-100">
							<tbody>
								<tr>
									<td class="padding-10" style="width: 50%;">Hire Charges</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; HIRE_CHARGES
									</td>
								</tr>
								<tr>
									<td class="padding-10" style="width: 50%;">Extra Charges</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; EXTRA_CHARGES
									</td>
								</tr>
								<tr>
									<td class="padding-10" style="width: 50%;">Ext. KM Charges</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; EXTRA_KM_CHARGES
									</td>
								</tr>
								<tr>
									<td class="padding-10" style="width: 50%;">Discount</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; DISCOUNT
									</td>
								</tr>
								TAXES
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Date From
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: TRAVEL_DATE
					</td>
					<td class="padding-10 border-0" width="10%">
						To
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: END_DATE
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Time From
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: START_TIME
					</td>
					<td class="padding-10 border-0" width="10%">
						To
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: END_TIME
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Package
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: PACKAGE - RATE_TYPE
					</td>
					<td class="padding-10 border-0" width="10%">
						&nbsp;
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						&nbsp;
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Toll Charges
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: &#8377; TOLL_CHARGES
					</td>
					<td class="padding-10 border-0" width="10%" style="font-size: 13.5px;">
						Parking Charges
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: &#8377; PARKING_CHARGES
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-y-0 border-right-0" width="10%">
						Permit Charges
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: &#8377; PERMIT_CHARGES
					</td>
					<td class="padding-10 border-0" width="10%">
						Driver Bata
					</td>
					<td class="padding-10 border-y-0 border-left-0" colspan="2" width="10%">
						: &#8377; DRIVER_BATA
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-0" width="10%">
						Tax Paid
					</td>
					<td class="padding-10 border-0" align="left" colspan="2" width="10%">
						: &#8377; TAX_PAID
					</td>
					<td class="padding-10 border-0" width="10%">
						Fuel Charges
					</td>
					<td class="padding-10 border-0" colspan="2" width="10%">
						: &#8377; FUEL_CHARGES
					</td>
				</tr>
				ADDITIONAL_CHARGES
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6"></td>
					<td colspan="3">
						<table border="0" class="width-100">
							<tbody>
								<tr>
									<td class="padding-10" style="width: 50%;">Total Amount</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; TOTAL_AMOUNT
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</script>

<script type="text/html" id="templateExportInvoice-MultipleTripSheets">
	<div class="hide panelPrintContent" style="display: none;">
		<table border="1">
			<tbody>
				<tr>
					<td class="padding-10" align="center">
						<img class="companyLogo" src="COMPANY_LOGO" style="max-width: 91px; max-height: 38px;" onerror="this.src='{{ $appLogo }}'">
					</td>
					<td class="padding-10" colspan="5">
						<h6 style="margin: 0;">COMPANY_NAME</h6>
						COMPANY_ADDRESS<br>
						<i class="fas fa-phone transform-rotate-90-deg"></i> COMPANY_CONTACT_PHONE_NO<br>
						<i class="fas fa-envelope"></i> COMPANY_CONTACT_EMAIL_ID
					</td>
					<td class="padding-10" colspan="3">
						GST No: COMPANY_GST_NO<br>
						PAN No: COMPANY_PAN_NO<br>
						CIN No: COMPANY_CIN_NO<br>
					</td>
				</tr>
				<tr>
					<td class="padding-10 border-right-0" align="left" width="10%">
						Invoice No:
					</td>
					<td class="padding-10 border-x-0" align="left" width="10%">
						INVOICE_NO
					</td>
					<td class="padding-10 border-right-0" align="left" width="10%">
						&nbsp;
					</td>
					<td class="padding-10 border-x-0" align="left" width="10%">
						&nbsp;
					</td>
					<td class="padding-10 border-right-0" align="left" width="10%">
						Date:
					</td>
					<td class="padding-10 border-left-0" align="left" width="10%">
						INVOICE_DATE
					</td>
					<td rowspan="CUSTOMER_INFO_ROW_SPAN" colspan="3" class="padding-10 v-align-top" width="40%" style="vertical-align: top;">
						To: CUSTOMER_NAME<br>
						CUSTOMER_ADDRESS<br>
						<span class="only-for-{{ CODELIST_INV_TYPE_GROUP }} only-for-{{ CODELIST_INV_TYPE_MONTHLY }}" style="display: none;">GST: CUSTOMER_GST</span>
					</td>
				</tr>
				<tr class="only-for-{{ CODELIST_INV_TYPE_GROUP }}" style="display: none;">
					<td class="border-0 padding-10">Date From</td>
					<td class="border-0 padding-10">: DATE_FROM</td>

					<td colspan="2" class="border-0"></td>

					<td class="border-0 padding-10">To</td>
					<td class="border-0 padding-10">: DATE_TO</td>
				</tr>
				<tr>
					<td class="border-0 padding-10">Toll Charges</td>
					<td class="border-0 padding-10">: &#8377; TOLL_CHARGES</td>

					<td colspan="2" class="border-0"></td>

					<td class="border-0 padding-10" style="font-size: 13.5px;">Parking Charges</td>
					<td class="border-0 padding-10">: &#8377; PARKING_CHARGES</td>
				</tr>
				<tr>
					<td class="border-0 padding-10">Permit Charges</td>
					<td class="border-0 padding-10">: &#8377; PERMIT_CHARGES</td>

					<td colspan="2" class="border-0"></td>

					<td class="border-0 padding-10">Driver Bata</td>
					<td class="border-0 padding-10">: &#8377; DRIVER_BATA</td>
				</tr>
				<tr>
					<td class="border-0 padding-10">Tax Paid</td>
					<td class="border-0 padding-10">: &#8377; TAX_PAID</td>

					<td colspan="2" class="border-0"></td>

					<td class="border-0 padding-10">Fuel Charges</td>
					<td class="border-0 padding-10">: &#8377; FUEL_CHARGES</td>
				</tr>
				ADDITIONAL_CHARGES
				<tr>
					<td class="border-0 padding-10">Hire Charges</td>
					<td class="border-0 padding-10">: &#8377; HIRE_CHARGES</td>

					<td colspan="2" class="border-0"></td>

					<td class="border-0 padding-10">Ext. KM Charges</td>
					<td class="border-0 padding-10">: &#8377; EXTRA_KM_CHARGES</td>
				</tr>
				<tr>
					<td class="border-0 padding-10">Extra Charges</td>
					<td class="border-0 padding-10">: &#8377; EXTRA_CHARGES</td>
					<td class="border-0" colspan="4" rowspan="CHARGES_BLANK_TD_ROW_SPAN"></td>
				</tr>
				<tr>
					<td class="border-0 padding-10">Discount</td>
					<td class="border-0 padding-10">: &#8377; DISCOUNT</td>
				</tr>
				TAXES
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6"></td>
					<td colspan="3">
						<table border="0" class="width-100">
							<tbody>
								<tr>
									<td class="padding-10" style="width: 50%;">Total Amount</td>
									<td class="padding-10" style="width: 50%;">
										: &#8377; TOTAL_AMOUNT
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</script>

<script type="text/javascript">
	$(document).ready(function() {
		window.defaultPageTitle = document.title;
	});

	function formatInvoiceTaxDetails(taxes)
	{
		var taxesHTML = '';

		$.each(taxes, function(i, tax) {
			taxesHTML += '<tr>' +
						 '<td class="border-0 padding-10" style="width: 50%;">' +
							tax.taxName + ' @ ' + tax.taxRate + '%' +
						 '</td>' +
						 '<td class="border-0 padding-10" style="width: 50%;">' +
							': &#8377; ' + tax.amount +
						 '</td>' +
						 '</tr>';
		});

		return taxesHTML;
	}

	function formatInvoiceAdditionalCharges(additionalCharges, tripSheetsCount)
	{
		var additionalChargesHTML = '';

		if(!$.isEmpty(additionalCharges)) {
			$.each(additionalCharges, function(i, charge) {
				if(i % 2 == 0) {
					if(i > 0) {
						additionalChargesHTML += '</tr>';
					}

					additionalChargesHTML += '<tr>';
				} else {
					if(tripSheetsCount > 1) {
						additionalChargesHTML += '<td colspan="2" class="border-0"></td>';
					}
				}

				additionalChargesHTML += '<td class="border-0 padding-10" style="width: 50%;">' + charge.label + '</td>';
				additionalChargesHTML += '<td class="border-0 padding-10" style="width: 50%;" ' + (tripSheetsCount == 1 ? 'colspan="2"' : '') + '>' + ': &#8377; ' + charge.value + '</td>';
			});
		}

		return additionalChargesHTML;
	}

	function generateTotalTimeStr(tripSheet)
	{
		var totalTimeHTML = '';

		if(tripSheet.totalDays > 0) {
			totalTimeHTML = tripSheet.totalDays + ' day(s), ';
		}

		totalTimeHTML += tripSheet.noOfHours + ' hour';

		if(tripSheet.noOfHours > 1) {
			totalTimeHTML += 's';
		}

		return totalTimeHTML;
	}

	function printInvoicePDF(invoiceType, invoiceId, ajaxLoaderElement)
	{

		createJSONAjax(baseUrl + '/invoice/export-data/' + invoiceType + '/' + invoiceId, 'GET', function(result){
			if(typeof(result.data) != 'undefined' && typeof(result.companyInfo) != 'undefined'){
				var invoiceInfo = result.data.invoiceInfo;
				var tripSheets = result.data.tripSheets;
				var companyInfo = result.companyInfo;
				var templateHtml = '';
				var taxes = result.data.taxAmounts;
				var extraChargesFields = {'tollCharges': 'TOLL_CHARGES', 'parkingCharges': 'PARKING_CHARGES', 'permitCharges': 'PERMIT_CHARGES', 'taxPaid': 'TAX_PAID', 'driverBata': 'DRIVER_BATA', 'fuelCharges': 'FUEL_CHARGES'};
				var customerInfoRowSpan = chargesBlankTdRowSpan = 0;
				var additionalChargesLength = 0;

				if(tripSheets.length > 1) {
					templateHtml = $('#templateExportInvoice-MultipleTripSheets').html();
				} else {
					templateHtml = $('#templateExportInvoice-SingleTripSheet').html();
				}

				templateHtml = templateHtml.replaceAll('COMPANY_LOGO', companyInfo.company_logo);
				templateHtml = templateHtml.replaceAll('COMPANY_NAME', companyInfo.company_name);
				templateHtml = templateHtml.replaceAll('COMPANY_ADDRESS', companyInfo.address1 + ', ' + companyInfo.address2 + ', ' + companyInfo.address3 + ', ' + companyInfo.city + ' - ' + companyInfo.pin_code);
				templateHtml = templateHtml.replaceAll('COMPANY_CONTACT_PHONE_NO', companyInfo.mobile);
				templateHtml = templateHtml.replaceAll('COMPANY_CONTACT_EMAIL_ID', companyInfo.email);
				templateHtml = templateHtml.replaceAll('COMPANY_GST_NO', companyInfo.company_gst);
				templateHtml = templateHtml.replaceAll('COMPANY_PAN_NO', companyInfo.company_pan);
				templateHtml = templateHtml.replaceAll('COMPANY_CIN_NO', companyInfo.company_cin);
				templateHtml = templateHtml.replaceAll('INVOICE_NO', invoiceInfo.invNo);
				templateHtml = templateHtml.replaceAll('INVOICE_DATE', invoiceInfo.invDate);
				templateHtml = templateHtml.replaceAll('HIRE_CHARGES', invoiceInfo.vehCharges);
				templateHtml = templateHtml.replaceAll('EXTRA_CHARGES', invoiceInfo.extCharges);
				templateHtml = templateHtml.replaceAll('DISCOUNT', invoiceInfo.discAmount);
				templateHtml = templateHtml.replaceAll('TRIP_CATEGORY', invoiceInfo.tripCategories);
				templateHtml = templateHtml.replaceAll('TAXES', formatInvoiceTaxDetails(taxes));
				templateHtml = templateHtml.replaceAll('TOTAL_AMOUNT', invoiceInfo.grandTotal);
				templateHtml = templateHtml.replaceAll('CUSTOMER_NAME', tripSheets[0].customerName);
				templateHtml = templateHtml.replaceAll('CUSTOMER_ADDRESS', tripSheets[0].customerAddress);
				templateHtml = templateHtml.replaceAll('CUSTOMER_GST', tripSheets[0].customerGST);
				templateHtml = templateHtml.replaceAll('ADDITIONAL_CHARGES', formatInvoiceAdditionalCharges(invoiceInfo.additionalCharges, tripSheets.length));
				templateHtml = templateHtml.replaceAll('DATE_FROM', invoiceInfo.fromDate ? invoiceInfo.fromDate : '');
				templateHtml = templateHtml.replaceAll('DATE_FROM', invoiceInfo.fromDate ? invoiceInfo.fromDate : '');
				templateHtml = templateHtml.replaceAll('EXTRA_KM_CHARGES', invoiceInfo.extraKmCharges ? invoiceInfo.extraKmCharges : '');

				if(!$.isEmpty(invoiceInfo.additionalCharges)) {
					additionalChargesLength = Math.round((Array.isArray(invoiceInfo.additionalCharges) ? invoiceInfo.additionalCharges.length : Object.keys(invoiceInfo.additionalCharges).length) / 2);

					customerInfoRowSpan = chargesBlankTdRowSpan = additionalChargesLength;
				}

				$.each(invoiceInfo.extraChargesDetail, function(chargeName, charge) {
					var extraChargeFieldLabel = typeof(extraChargesFields[chargeName]) != 'undefined' ? extraChargesFields[chargeName] : '';

					if(!$.isEmpty(extraChargeFieldLabel)) {
						templateHtml = templateHtml.replaceAll(extraChargeFieldLabel, charge.amount);
					}
				});

				chargesBlankTdRowSpan += Object.keys(taxes).length + 2;

				if(tripSheets.length > 1) {
					var tripSheetsHTML = '';

					$.each(tripSheets, function(i, tripSheet) {
						var tripSheetRowHTML = '<td class="padding-10 v-align-top">' +
													tripSheet.tripSheetNo +
												  '</td>' +
												  '<td class="padding-10 v-align-top">' +
													tripSheet.vehicleNo +
												  '</td>' +
												  '<td class="padding-10 v-align-top">' +
													tripSheet.driverName +
												  '</td>' +
												  '<td class="padding-10 v-align-top">' +
													 generateTotalTimeStr(tripSheet) +
												  '</td>' +
												  '<td class="padding-10 v-align-top">' +
													tripSheet.totalKm +
												  '</td>' +
												  '<td class="padding-10 v-align-top">' +
													tripSheet.totalAmount +
											  	'</td>';

						if(i == 0) {
							templateHtml = templateHtml.replaceAll('TRIP_SHEETS_FIRST_ROW', tripSheetRowHTML);
						} else {
							tripSheetsHTML += '<tr>' + tripSheetRowHTML + '</tr>';
						}
					});

					templateHtml = templateHtml.replaceAll('TRIP_SHEETS', tripSheetsHTML);

					customerInfoRowSpan += Object.keys(taxes).length + 8;

					templateHtml = templateHtml.replaceAll('CUSTOMER_INFO_ROW_SPAN', customerInfoRowSpan);
					templateHtml = templateHtml.replaceAll('CHARGES_BLANK_TD_ROW_SPAN', chargesBlankTdRowSpan);
				} else {
					templateHtml = templateHtml.replaceAll('TRIP_SHEET_NO', tripSheets[0].tripSheetNo);

					var vehicleNo = tripSheets[0].vehicleNo;

					if(!$.isEmpty(tripSheets[0].dispatchedVehicle)) {
						if(tripSheets[0].dispatchedVehicle != vehicleNo) {
							vehicleNo += ',<br> ' + tripSheets[0].dispatchedVehicle;
						}
					}

					templateHtml = templateHtml.replaceAll('VEHICLE_NO', vehicleNo);

					templateHtml = templateHtml.replaceAll('VEHICLE_TYPE', tripSheets[0].vehicleType);
					templateHtml = templateHtml.replaceAll('PLACE_FROM', tripSheets[0].pickupPoint);
					templateHtml = templateHtml.replaceAll('PLACE_TO', tripSheets[0].destination);
					templateHtml = templateHtml.replaceAll('DRIVER_NAME', tripSheets[0].driverName);
					templateHtml = templateHtml.replaceAll('OPENING_KM', tripSheets[0].startKm);
					templateHtml = templateHtml.replaceAll('CLOSING_KM', tripSheets[0].endKm);
					templateHtml = templateHtml.replaceAll('TRAVEL_DATE', tripSheets[0].travelDate);
					templateHtml = templateHtml.replaceAll('END_DATE', tripSheets[0].endDate);
					templateHtml = templateHtml.replaceAll('START_TIME', tripSheets[0].startTime);
					templateHtml = templateHtml.replaceAll('END_TIME', tripSheets[0].endTime);
					templateHtml = templateHtml.replaceAll('PACKAGE', tripSheets[0].custPkg);
					templateHtml = templateHtml.replaceAll('RATE_TYPE', tripSheets[0].rateType);

					if(chargesBlankTdRowSpan <= 7) {
						chargesBlankTdRowSpan = 7 + additionalChargesLength;
					}

					templateHtml = templateHtml.replaceAll('CHARGES_BLANK_TD_ROW_SPAN', chargesBlankTdRowSpan);
				}

				if($('.panelPrintContent').length > 0){
					$('.panelPrintContent').remove();
				}

				$('body').append(templateHtml);

				$('.panelPrintContent .only-for-' + invoiceInfo.invoiceType).show();

				/* Print Trip sheet after the company logo is loaded */
				$('.panelPrintContent .companyLogo').one('load', function(){
					$('#tripSheetPrintStyle').removeAttr('media');
					document.title = invoiceInfo.invNo;

					window.print();

					$('#tripSheetPrintStyle').attr('media', 'max-width: 1px');
					document.title = defaultPageTitle;
					$('.panelPrintContent').remove();
				});
			}else{
				showToastMessage({ type: 'failed', message: 'Invalid response from server. Please contact support' });
			}
		}, '', ajaxLoaderElement);

	}

	$(document).on('click', '.btnExportInvoiceInfo', function(e) {
		e.preventDefault();

		printInvoicePDF($(this).attr('data-invoiceType'), $(this).attr('data-invoiceId'), $(this).closest('tr'));
	});
</script>