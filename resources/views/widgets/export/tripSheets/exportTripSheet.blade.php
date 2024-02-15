@include("widgets.export.exportStyle")

<div>
	<table class="outline" style="width: 60%;" cellspacing="9">
		<tr>
			<th><b>TripSheet No</b></th>
			<th>{{ $tripSheetNo }}</th>
		</tr>
		<tr>
			<td><b>Date</b></td>
			<td>{{ $travelDate }}</td>
		</tr>
		<tr>
			<td><b>Veh. Type</b></td>
			<td>Toyata Innova</td>
		</tr>
		<tr>
			<td><b>Veh. No</b></td>
			<td>{{ $vehicleNo }}</td>
		</tr>
		<tr>
			<td><b>Driver</b></td>
			<td>{{ $driverName }}</td>
		</tr>
		<tr>
			<td><b>Pass. Name </b></td>
			<td>{{ $customerName }}</td>
		</tr>
		<tr>
			<td><b>Address</b></td>
			<td>{{ $customerAddress }}</td>
		</tr>
	</table>

	<p><br></p>

	<table class="border" style="width: 100%;">
		<tr>
			<th></th>
			<th><b>Start</b></th>
			<th><b>End</b></th>
			<th><b>Total</b></th>
			<th><b>Extra</b></th>
		</tr>
		<tr>
			<td><b>KM</b></td>
			<td>{{ $startKm }}</td>
			<td>{{ $endKm }}</td>
			<td>{{ $totalKm }}</td>
			<td>{{ $extraKm }}</td>
		</tr>
		<tr>
			<td><b>Time</b></td>
			<td>{{ $travelDate ." ". $startTime   }}</td>
			<td>{{ $endDate ." ". $endTime }}</td>
			<td>{{ $totalHour }}</td>
			<td>{{ $extraTime }}</td>
		</tr>

		<p>Customer Signature</p>
	</table>

	<p><br></p>
</div>


