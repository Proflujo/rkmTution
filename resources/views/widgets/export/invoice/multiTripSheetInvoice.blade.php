@include("widgets.export.exportStyle")

@php
	$detailsToExport = isset($detailsToExport) ? $detailsToExport : [];
@endphp

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
	<table class="border" cellpadding="2">
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
			@if(isset($tripSheets) && !empty($tripSheets))
				@foreach($tripSheets as $sheet)
					<tr>
						<td>{{ $sheet->tripSheetNo }}</td>
						<td>{{ $sheet->vehicleNo . ' - ' . $sheet->vehicleType }}</td>
						<td>{{ $sheet->driverName }}</td>
						<td>{{ $sheet->endDate }}</td>
						<td>{{ $sheet->totalKm }}</td>
						<td class="text-right">{{ $sheet->totalAmount }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td class="text-danger text-center" colspan="10">No Data</td>
				</tr>
			@endif
		</tbody>
	</table>

	@if(in_array("trip-details", $detailsToExport))
	<br pagebreak="true"/>
	@endif
@endif

@if(in_array("trip-details", $detailsToExport))
	<h1>Trip Details</h1>

	@foreach($tripSheets as $sheet)
	<table class="outline" style="width: 100%;" cellspacing="9">
		<tr>
			<th><b>TripSheet No</b></th>
			<th>{{ $sheet->tripSheetNo }}</th>
		</tr>
		<tr>
			<td><b>Pass. Name </b></td>
			<td>{{ $sheet->customerName }}</td>
		</tr>
		<tr>
			<td><b>Start Date:</b></td>
			<td>{{ $sheet->travelDate }}</td>
		</tr>
		<tr>
			<td><b>End Date:</b></td>
			<td>{{ $sheet->endKm }}</td>
		</tr>
		<tr>
			<td><b>Veh. Type:</b></td>
			<td>{{ $sheet->vehicleNo. ' - ' .($sheet->vehicleType)  }}</td>
		</tr>
		<tr>
			<td><b>Driver</b></td>
			<td>{{ $sheet->driverName }}</td>
		</tr>
		<tr>
			<td><b>Package:</b></td>
			<td>{{ $sheet->custPkg }}</td>
		</tr>
		<tr>
			<td><b>Total Km:</b></td>
			<td>{{ $sheet->totalKm }}</td>
		</tr>
		<tr>
			<td><b>Total Amount:</b></td>
			<td><span class="inr-symbol">&#8377;</span> {{ $sheet->totalAmount }}</td>
		</tr>
	</table>
	<p><br></p>
	@endforeach
@endif