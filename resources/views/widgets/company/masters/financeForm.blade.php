@php

	$vehicleInfo = isset($vehicleInfo) ? $vehicleInfo : (object) [];
	$disableEditing = isset($disableEditing) ? $disableEditing : false;
	$disabledAttribute = $disableEditing ? 'disabled="disabled"' : '';
	$defaultValues = isset($defaultValues) ? $defaultValues : [];
	$vehicleCostValidationError = Session::has('vehicleCostValidationError') ? Session::get('vehicleCostValidationError') : [];
	$vehicleCostData = Session::has('vehicleCostData') ? Session::get('vehicleCostData') : [];
	$vehicleCostData = !empty($vehicleCostData) ? $vehicleCostData : (isset($vehicleCostData) ? $vehicleCostData : []);

	if(!empty((array) $vehicleInfo) && empty($vehicleCostData)){
		$vehicleCostData["vehicleCost"]["cost"] = $vehicleInfo->vehicleCostAmount;
		$vehicleCostData["vehicleCost"]["hypothecatedTo"] = $vehicleInfo->vehicleCostHypothecatedTo;
		$vehicleCostData["vehicleCost"]["downPayment"] = $vehicleInfo->vehicleCostDownPayment;
		$vehicleCostData["vehicleCost"]["emiTenure"] = $vehicleInfo->vehicleCostEmiTenure;
		$vehicleCostData["vehicleCost"]["startDate"] = $vehicleInfo->vehicleCostStartDate;
		$vehicleCostData["vehicleCost"]["emiAmount"] = $vehicleInfo->vehicleCostEmiAmount;

		$vehicleCostData["bodyBuilding"]["cost"] = $vehicleInfo->bodyBuildingAmount;
		$vehicleCostData["bodyBuilding"]["hypothecatedTo"] = $vehicleInfo->bodyBuildingHypothecatedTo;
		$vehicleCostData["bodyBuilding"]["downPayment"] = $vehicleInfo->bodyBuildingDownPayment;
		$vehicleCostData["bodyBuilding"]["emiTenure"] = $vehicleInfo->bodyBuildingEmiTenure;
		$vehicleCostData["bodyBuilding"]["startDate"] = $vehicleInfo->bodyBuildingStartDate;
		$vehicleCostData["bodyBuilding"]["emiAmount"] = $vehicleInfo->bodyBuildingEmiAmount;

		$vehicleCostData["acCost"]["cost"] = $vehicleInfo->acCostAmount;
		$vehicleCostData["acCost"]["hypothecatedTo"] = $vehicleInfo->acCostHypothecatedTo;
		$vehicleCostData["acCost"]["downPayment"] = $vehicleInfo->acCostDownPayment;
		$vehicleCostData["acCost"]["emiTenure"] = $vehicleInfo->acCostEmiTenure;
		$vehicleCostData["acCost"]["startDate"] = $vehicleInfo->acCostStartDate;
		$vehicleCostData["acCost"]["emiAmount"] = $vehicleInfo->acCostEmiAmount;
	}

	$data = 
	[
		'incExpInsurance' => old('incExpInsurance') ? old('incExpInsurance') : (isset($vehicleInfo->incExpInsurance) ? $vehicleInfo->incExpInsurance : ''),
		'incExpFC' => old('incExpFC') ? old('incExpFC') : (isset($vehicleInfo->incExpFC) ? $vehicleInfo->incExpFC : ''),
		'incExpPermit' => old('incExpPermit') ? old('incExpPermit') : (isset($vehicleInfo->incExpPermit) ? $vehicleInfo->incExpPermit : ''),
		'incExpRoadTax' => old('incExpRoadTax') ? old('incExpRoadTax') : (isset($vehicleInfo->incExpRoadTax) ? $vehicleInfo->incExpRoadTax : ''),
		'incExpFuel' => old('incExpFuel') ? old('incExpFuel') : (isset($vehicleInfo->incExpFuel) ? $vehicleInfo->incExpFuel : ''),
		'incExpOthers' => old('incExpOthers') ? old('incExpOthers') : (isset($vehicleInfo->incExpOthers) ? $vehicleInfo->incExpOthers : '')
	];

@endphp

<style type="text/css">
	.fieldset-group
	{
		padding: 10px;
	}

	#tbl-vehicle-cost > tbody > tr > td, #tbl-vehicle-cost > thead > tr > th
	{
		width: 12% !important;
	}

	#tbl-vehicle-cost > tbody > tr > td:first-child, #tbl-vehicle-cost > thead > tr > th:first-child
	{
		width: 15% !important;
	}

	#tbl-vehicle-cost > tbody > tr > td:nth-child(3), #tbl-vehicle-cost > thead > tr > th:nth-child(3)
	{
		width: 17% !important;
	}
</style>
<div class="row">
	<fieldset class="fieldset-group">
		<legend>Vehicle Cost</legend>
		<div class="form-group">
			<table class="table" id="tbl-vehicle-cost">
				<thead>
					<tr>
						<th></th>
						<th>Cost</th>
						<th>Hypothecated To</th>
						<th>Down payment</th>
						<th>EMI Tenure</th>
						<th>Start Date</th>
						<th>EMI Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Vehicle Cost</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[vehicleCost][cost]" {{ $disabledAttribute }}>
						</td>
						<td>
							<select class="form-control selectpicker" name="vehicleCost[vehicleCost][hypothecatedTo]" {{ $disabledAttribute }}>
								@foreach($banksList as $id => $name)
									<option value="{{ $id }}">{{ $name }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[vehicleCost][downPayment]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control" name="vehicleCost[vehicleCost][emiTenure]" {{ $disabledAttribute }}>
						</td>
						<td class="position-relative">
							<input type="text" class="form-control date-picker" name="vehicleCost[vehicleCost][startDate]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[vehicleCost][emiAmount]" {{ $disabledAttribute }}>
						</td>
					</tr>
					<tr>
						<td>Body Building</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[bodyBuilding][cost]" {{ $disabledAttribute }}>
						</td>
						<td>
							<select class="form-control selectpicker" name="vehicleCost[bodyBuilding][hypothecatedTo]" {{ $disabledAttribute }}>
								@foreach($banksList as $id => $name)
									<option value="{{ $id }}">{{ $name }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[bodyBuilding][downPayment]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control" name="vehicleCost[bodyBuilding][emiTenure]" {{ $disabledAttribute }}>
						</td>
						<td class="position-relative">
							<input type="text" class="form-control date-picker" name="vehicleCost[bodyBuilding][startDate]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[bodyBuilding][emiAmount]">
						</td>
					</tr>
					<tr>
						<td>AC Cost</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[acCost][cost]" {{ $disabledAttribute }}>
						</td>
						<td>
							<select class="form-control selectpicker" name="vehicleCost[acCost][hypothecatedTo]" {{ $disabledAttribute }}>
								@foreach($banksList as $id => $name)
									<option value="{{ $id }}">{{ $name }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[acCost][downPayment]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control" name="vehicleCost[acCost][emiTenure]" {{ $disabledAttribute }}>
						</td>
						<td class="position-relative">
							<input type="text" class="form-control date-picker" name="vehicleCost[acCost][startDate]" {{ $disabledAttribute }}>
						</td>
						<td>
							<input type="text" class="form-control currency" name="vehicleCost[acCost][emiAmount]" {{ $disabledAttribute }}>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</fieldset>
</div>

<div class="row">
	<fieldset class="fieldset-group">
		<legend>Incurred Expenses & Revenue</legend>
		<div class="form-group">
			<div class="row">
				<div class="form-group parent-incExpInsurance col-lg-6 {{ $errors->vehicleInfo->has('incExpInsurance') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpInsurance">Insurance</label>
					<input type="text" class="form-control col-lg-7" id="incExpInsurance" name="incExpInsurance" value="{{ $data['incExpInsurance'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }} />
					@if($errors->vehicleInfo->has('incExpInsurance'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpInsurance') }}</span>,
					@endif
				</div>
				<div class="form-group parent-incExpFC col-lg-6 {{ $errors->vehicleInfo->has('incExpFC') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpFC">FC</label>
					<input type="text" class="form-control col-lg-7" id="incExpFC" name="incExpFC" value="{{ $data['incExpFC'] }}" {{ $disabledAttribute }}  />
					@if($errors->vehicleInfo->has('incExpFC'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpFC') }}</span>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="form-group parent-incExpPermit col-lg-6 {{ $errors->vehicleInfo->has('incExpPermit') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpPermit">Permit</label>
					<input type="text" class="form-control col-lg-7" id="incExpPermit" name="incExpPermit" value="{{ $data['incExpPermit'] }}" {{ $disabledAttribute }} />
					@if($errors->vehicleInfo->has('incExpPermit'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpPermit') }}</span>
					@endif
				</div>
				<div class="form-group parent-incExpRoadTax col-lg-6 {{ $errors->vehicleInfo->has('incExpRoadTax') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpRoadTax">RoadTax</label>
					<input type="text" class="form-control col-lg-7" id="incExpRoadTax" name="incExpRoadTax" value="{{ $data['incExpRoadTax'] }}" {{ $disabledAttribute }} />
					@if($errors->vehicleInfo->has('incExpRoadTax'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpRoadTax') }}</span>
					@endif
				</div>
			</div>
			
			<div class="row">
				<div class="form-group parent-incExpFuel col-lg-6 {{ $errors->vehicleInfo->has('incExpFuel') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpFuel">Fuel</label>
					<input type="text" class="form-control col-lg-7" id="incExpFuel" name="incExpFuel" value="{{ $data['incExpFuel'] }}" data-max-date="{{ OTSHelper::Date('+1 day') }}" {{ $disabledAttribute }}>
					@if($errors->vehicleInfo->has('incExpFuel'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpFuel') }}</span>
					@endif
				</div>
			<div class="form-group parent-incExpOthers col-lg-6 {{ $errors->vehicleInfo->has('incExpOthers') ? 'has-error' : '' }}">
					<label class="col-lg-5" for="incExpOthers">Others</label>
					<input type="text" class="form-control col-lg-7" id="incExpOthers" name="incExpOthers" value="{{ $data['incExpOthers'] }}" {{ $disabledAttribute }}>
					@if($errors->vehicleInfo->has('incExpOthers'))
						<span class="help-block">{{ $errors->vehicleInfo->first('incExpOthers') }}</span>
					@endif
				</div>
			</div>
		</div>
	</fieldset>
</div>

<script type="text/javascript">
	const vehicleCostValidationError = {!! json_encode($vehicleCostValidationError) !!};
	const vehicleCostData = {!! json_encode($vehicleCostData) !!};
</script>