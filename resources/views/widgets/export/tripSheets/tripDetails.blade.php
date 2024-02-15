@include("widgets.export.exportStyle")
<!--  Unused file -->
<div>

	<h1>Trip Details</h1>

	<table class="" style="width: 100%;" cellspacing="6">
		<tbody>
			<tr>
				<th><b>Date</b></th>
				<td>{{ $tripInfo->travel_date }}</td>
			</tr>
			<tr>
				<th><b>Time</b></th>
				<td>{{ $tripInfo->reporting_time }}</td>
			</tr>
			<tr>
				<th><b>Vehicle</b></th>
				<td>{{ $tripInfo->vehicle . " (" . $tripInfo->vehicleType . ")" }}</td>
			</tr>
			<tr>
				<th><b>Driver</b></th>
				<td>{{ $tripInfo->driver }}</td>
			</tr>
		</tbody>
	</table>

	<p><br></p>

	<h1>Customer Details</h1>

	<table class="" style="width: 100%;" cellspacing="6">
		<tbody>
			<tr>
				<th><b>Name</b></th>
				<td>{{ $tripInfo->customer }}</td>
			</tr>
			<tr>
				<th><b>Address</b></th>
				<td>{{ $tripInfo->custAddress }}</td>
			</tr>
			<tr>
				<th><b>Contact No</b></th>
				<td>{{ $tripInfo->custContNo }}</td>
			</tr>
			<tr>
				<th><b>Pickup Point</b></th>
				<td>{{ $tripInfo->pickup_point }}</td>
			</tr>
		</tbody>
	</table>

</div>