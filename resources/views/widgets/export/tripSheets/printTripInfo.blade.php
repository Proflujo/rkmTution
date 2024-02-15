@include("widgets.export.printPDF-CSS-Styles")

<script type="text/html" id="templateExportTripSheet">
	<div class="hide panelPrintContent" style="display: none;">
		<table border="1">
			<tbody>
				<tr>
					<td colspan="4" align="center">(From T.S.C RULE 275 OF TAMILNADU MOTOR VEHICLE RULE 1950)</td>
				</tr>
				<tr>
					<td class="padding-10" align="center" style="border-right: 0;">
						<img class="companyLogo" src="COMPANY_LOGO" style="max-width: 91px; max-height: 38px;">
					</td>
					<td class="padding-10" colspan="2" style="border-left: 0; border-right: 0;">
						<h6 style="margin: 0;">COMPANY_NAME.</h6>
						COMPANY_ADDRESS
					</td>
					<td class="padding-10" style="border-left: 0;">
						<i class="fas fa-phone"></i> COMPANY_CONTACT_PHONE_NO<br>
						<i class="fas fa-envelope"></i> COMPANY_CONTACT_EMAIL_ID<br>
						<i class="fas fa-globe"></i> COMPANY_WEBSITE
					</td>
				</tr>
				<tr>
					<td class="padding-0" colspan="4">
						<table class="td-padding-v-5 td-padding-h-10" width="100%">
							<tbody>
								<tr>
									<td width="15%">Client Name</td>
									<td width="25%">: CUSTOMER_NAME</td>
									<td width="25%" align="right">Trip Sheet No</td>
									<td width="40%">: TRIP_SHEET_NO</td>
								</tr>
								<tr>
									<td rowspan="5" style="vertical-align: top;">Address</td>
									<td rowspan="5" style="vertical-align: top;">: CUSTOMER_ADDRESS</td>
									<td align="right">D.S. No / Booking ID</td>
									<td>: BOOKING_ID</td>
								</tr>
								<tr>
									<td align="right">Date</td>
									<td>: TRAVEL_DATE</td>
								</tr>
								<tr>
									<td align="right">Duty Type</td>
									<td>: DUTY_TYPE</td>
								</tr>
								<tr>
									<td align="right">Vehicle Type</td>
									<td>: VEHICLE_TYPE</td>
								</tr>
								<tr>
									<td align="right">Vehicle Number</td>
									<td>: VEHICLE_NO</td>
								</tr>
								<tr>
									<td>Booked By</td>
									<td>: BOOKED_BY</td>
									<td align="right">Driver Name</td>
									<td>: DRIVER_NAME</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td align="right">Driver Cell Number</td>
									<td>: DRIVER_CONTACT_PHONE_NO</td>
								</tr>
								<tr>
									<td>Report to</td>
									<td>: REPORT_TO</td>
									<td align="right">Licence Number</td>
									<td>: DRIVER_LICENSE_NO</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td class="padding-10" colspan="2">From : PICKUP_POINT</td>
					<td class="padding-10" colspan="2">To : DESTINATION</td>
				</tr>
				<tr>
					<td class="padding-0" colspan="2">
						<table class="inner-border" width="100%">
							<tbody>
								<tr>
									<td class="padding-10" width="25%"></td>
									<td class="padding-10" width="25%">Date</td>
									<td class="padding-10" width="25%">Hours</td>
									<td class="padding-10" width="25%">Kms</td>
								</tr>
								<tr>
									<td class="padding-10" width="25%">Closing</td>
									<td class="padding-10" width="25%">CLOSE_DATE</td>
									<td class="padding-10" width="25%">CLOSE_HOUR</td>
									<td class="padding-10" align="right" width="25%">CLOSE_KM</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td class="padding-h-10 fs-small" colspan="2">
						Time & Kilometers charged from Garage to Garage. Licensed Seating Capacity not <br>to be exceeded. Kindly check your belongings & Kms before releasing the vehicle. <br>All disputes subject to Chennai Jurisdiction
					</td>
				</tr>
				<tr>
					<td class="padding-0" colspan="2">
						<table class="inner-border" width="100%">
							<tbody>
								<tr>
									<td class="padding-10" width="25%">Starting</td>
									<td class="padding-10" width="25%">START_DATE</td>
									<td class="padding-10" width="25%">START_HOUR</td>
									<td class="padding-10" align="right" width="25%">START_KM</td>
								</tr>
								<tr>
									<td class="padding-10" width="25%">Total</td>
									<td class="padding-10" width="25%">TOTAL_TRAVEL_DAYS</td>
									<td class="padding-10" width="25%">TOTAL_TRAVEL_HOURS</td>
									<td class="padding-10" align="right" width="25%">TOTAL_KMS</td>
								</tr>
							</tbody>
						</table>
					</td>
					<td class="padding-0" colspan="2">
						<table width="100%">
							<tbody>
								<tr>
									<td class="padding-10" width="50%">Feedback</td>
									<td class="padding-10" width="50%"></td>
								</tr>
								<tr>
									<td class="padding-10" width="50%"></td>
									<td class="padding-10" width="50%" align="right">Customer Signature</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>

<script type="text/javascript">
	/*
		Note:
		----------------------------------------------
			Use below codes to print the trip sheet details
		----------------------------------------------

		$('#tripSheetPrintStyle').removeAttr('media');
		window.print();
		$('#tripSheetPrintStyle').attr('media', 'max-width: 1px');
	*/
</script>