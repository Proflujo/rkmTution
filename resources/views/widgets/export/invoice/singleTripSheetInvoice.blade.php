@include("widgets.export.exportStyle")

@php
	$detailsToExport = isset($detailsToExport) ? $detailsToExport : [];
@endphp

<div>
	@if(in_array("invoice-details", $detailsToExport))
	<h1>Invoice Details</h1>

	<table class="outline" style="width: 100%;" cellspacing="6">
		<tbody>
			<tr>
				<th><b>Date</b></th>
				<td>{{ $invInfo->invDate }}</td>
			</tr>
			<tr>
				<th><b>Payment Status</b></th>
				<td>{{ $invInfo->paymentStatus }}</td>
			</tr>
			<tr>
				<th><b>Hire Charges</b></th>
				<td><span class="inr-symbol">&#8377;</span> {{ $invInfo->vehCharges }}</td>
			</tr>
			<tr>
				<th><b>Extra Charges</b></th>
				<td><span class="inr-symbol">&#8377;</span> {{ $invInfo->extCharges }}</td>
			</tr>
			<tr>
				<th><b>Discount</b></th>
				<td><span class="inr-symbol">&#8377;</span> {{ empty($invInfo->discAmount) ? "0.00" : $invInfo->discAmount }}</td>
			</tr>
			@if(!empty($taxes))
			<tr>
				<td colspan="2"></td>
			</tr>
			@foreach($taxes as $tax)
			<tr>
				<td><b>{{ $tax->taxName . ' @' . $tax->taxRate . '%' }}</b></td>
				<td><span class="inr-symbol">&#8377;</span> {{ $tax->amount }}</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="2"></td>
			</tr>
			@endif
			<tr>
				<th><b>Grand Total</b></th>
				<td><span class="inr-symbol">&#8377;</span> {{ $invInfo->grandTotal }}</td>
			</tr>
		</tbody>
	</table>

		@if(in_array("trip-summary", $detailsToExport) || in_array("trip-details", $detailsToExport))
		<br pagebreak="true"/>
		@endif
	@endif

	@if(in_array("trip-summary", $detailsToExport))
	<h1>Trip Summary</h1>

	<table class="border" style="width: 100%;">
		<thead>
			<tr>
				<th><b>Trip Sheet No</b></th>
				<th><b>Veh. No</b></th>
				<th><b>Driver Name</b></th>
				<th><b>End Date</b></th>
				<th><b>Km</b></th>
				<th><b>Charge</b> (<span class="inr-symbol">&#8377;</span>)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $tripSheet->tripSheetNo }}</td>
				<td>{{ $tripSheet->vehicleNo }}</td>
				<td>{{ $tripSheet->driverName }}</td>
				<td>{{ $tripSheet->travelDate }}</td>
				<td>{{ $tripSheet->totalKm }}</td>
				<td>{{ $tripSheet->totalAmount }}</td>
			</tr>
		</tbody>
	</table>

		@if(in_array("trip-details", $detailsToExport))
		<br pagebreak="true"/>
		@endif
	@endif

	@if(in_array("trip-details", $detailsToExport))
	<h1>Trip Details</h1>

	<table class="outline" style="width: 100%;" cellspacing="9">
		<tr>
			<th><b>TripSheet No</b></th>
			<th>{{ $tripSheet->tripSheetNo }}</th>
		</tr>
		<tr>
			<td><b>Pass. Name </b></td>
			<td>{{ $tripSheet->customerName }}</td>
		</tr>
		<tr>
			<td><b>Start Date:</b></td>
			<td>{{ $tripSheet->travelDate }}</td>
		</tr>
		<tr>
			<td><b>End Date:</b></td>
			<td>{{ $tripSheet->endKm }}</td>
		</tr>
		<tr>
			<td><b>Veh. Type:</b></td>
			<td>{{ $tripSheet->vehicleNo. ' - ' .($tripSheet->vehicleType)  }}</td>
		</tr>
		<tr>
			<td><b>Driver</b></td>
			<td>{{ $tripSheet->driverName }}</td>
		</tr>
		<tr>
			<td><b>Package:</b></td>
			<td>{{ $tripSheet->custPkg }}</td>
		</tr>
		<tr>
			<td><b>Total Km:</b></td>
			<td>{{ $tripSheet->totalKm }}</td>
		</tr>
		<tr>
			<td><b>Total Amount:</b></td>
			<td><span class="inr-symbol">&#8377;</span> {{ $tripSheet->totalAmount }}</td>
		</tr>
	</table>
	@endif

</div>