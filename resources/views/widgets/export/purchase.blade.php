@include("widgets.export.exportStyle")

<div>
	<table class="outline" style="width: 70%;" cellspacing="7">
		<tbody>
			<tr>
				<td><b>Veh. No:</b> {{ $purchaseInfo->vehicle }}</td>
				<td></td>
			</tr>
			<tr>
				<td><b>Driver:</b> {{ $tripSheet->driverName }}</td>
				<td><b>Vendor:</b> {{ $purchaseInfo->vendor }}</td>
			</tr>
			<tr>
				<td><b>OP KM:</b> {{ $tripSheet->startKm }}</td>
				<td><b>CL KM:</b> {{ $tripSheet->endKm }}</td>
			</tr>
			<tr>
				<td><b>Date From:</b> {{ $tripSheet->travelDate }}</td>
				<td><b>Date To:</b> {{ $tripSheet->endDate }}</td>
			</tr>
			<tr>
				<td><b>Time From:</b> {{ $tripSheet->startTime }}</td>
				<td><b>Time To:</b> {{ $tripSheet->endTime }}</td>
			</tr>
		</tbody>
	</table>

	<p><br></p>

	<table class="outline" style="width: 100%;" cellspacing="7">
		<tbody>
			<tr>
				<td><b>Hire Charges:</b></td>
				<td></td>
				<td><span class="inr-symbol">&#8377;</span> {{ $purchaseInfo->tripCharge }}</td>
			</tr>
			<tr>
				<td><b>Driver Bata:</b></td>
				<td></td>
				<td><span class="inr-symbol">&#8377;</span> {{ empty($tripSheet->driverBata) ? '0.00' : $tripSheet->driverBata }}</td>
			</tr>
			<tr>
				<td><b>Parking and Toll Fees:</b></td>
				<td></td>
				<td><span class="inr-symbol">&#8377;</span> {{ empty($tripSheet->parkingTollCharges) ? '0.00' : $tripSheet->parkingTollCharges }}</td>
			</tr>
			@foreach($taxes as $tax)
				@php
					$taxAmount = isset($purchaseTaxInfo[$tax->tax_id]) ? $purchaseTaxInfo[$tax->tax_id] : '0.00';
				@endphp
				<tr>
					<td><b>{{ $tax->tax_name . ' @' . $tax->rate . '%' }}:</b></td>
					<td></td>
					<td><span class="inr-symbol">&#8377;</span> {{ $taxAmount }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<p><br></p>

	<table class="outline" style="width: 100%;" cellspacing="7">
		<tbody>
			<tr>
				<td><b>Total Amount:</b></td>
				<td></td>
				<td><span class="inr-symbol">&#8377;</span> {{ $purchaseInfo->grandTotal }}</td>
			</tr>
			<tr>
				<td><b>Total Amount (In Words):</b></td>
				<td colspan="2">{{ \OTSHelper::amountToWord($purchaseInfo->grandTotal) }}</td>
			</tr>
		</tbody>
	</table>
</div>