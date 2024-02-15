@permission("manageMasterPage")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" speech-action-text="manage menu">
		{{ Lang::get("masters.setup") }}
	</a>

	<div class="dropdown-menu">
		@permission("manageCodelist")
		<a class="dropdown-item" href="{{ url('masters/codelist') }}" speech-action-text="list of values">
			{{ Lang::get("masters.codelistMenuTitle") }}
		</a>
		@endpermission

		<a class="dropdown-item" href="{{ url('masters/codelist/initialSetup') }}" speech-action-text="initial setup">
			{{ Lang::get("masters.initialSetup") }}
		</a>

		@permission("manageBranch")	
		<a class="dropdown-item" href="{{ url('masters/branch') }}" speech-action-text="branch">
			{{ Lang::get("masters.branch") }}
		</a>
		@endpermission
		@permission("manageInsurer")
		<a class="dropdown-item" href="{{ url('masters/insurer') }}" speech-action-text="insurer">
			{{ Lang::get("masters.insurer") }}
		</a>
		@endpermission
		@permission("manageEmployee")
		<a class="dropdown-item" href="{{ url('masters/employee') }}" speech-action-text="employees|employee">
			{{ Lang::get("masters.employees") }}
		</a>
		@endpermission
		@permission("manageVehicle")
		<a class="dropdown-item" href="{{ url('masters/vehicle') }}" speech-action-text="vehicles|vehicle">
			{{ Lang::get("masters.vehicles") }}
		</a>
		@endpermission
		@permission("manageCustomers")
		<a class="dropdown-item" href="{{ url('masters/customers') }}" speech-action-text="customers|customer">
			{{ Lang::get("masters.customers") }}
		</a>
		@endpermission
		@permission("manageVendors")
		<a class="dropdown-item" href="{{ url('masters/vendors') }}" speech-action-text="vendors|vendor">
			{{ Lang::get("masters.vendors") }}
		</a>
		@endpermission
		@permission("manageCustomerPackage")
		<a class="dropdown-item" href="{{ url('masters/customer-package') }}" speech-action-text="trip packages|trip package">
			{{ Lang::get("masters.tripPakage") }}
		</a>
		@endpermission
		@permission("managePackage")
		<!-- <a class="dropdown-item" href="{{ url('masters/package') }}">
			{{ Lang::get("masters.package") }}
		</a> -->
		@endpermission
	</div>
</li>
@endpermission
@permission("manageVehMaintenance")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
		{{ Lang::get("common.maintenance") }}
	</a>

	<div class="dropdown-menu">
		@permission("manageVehMaintParams")
		<a class="dropdown-item" href="{{ url('maintenance/vehicle-maintenance-params') }}" speech-action-text="maintenance parameters|maintenance parameter">
			{{ Lang::get("company.vehMaintParams") }}
		</a>
		@endpermission
		@permission("manageVehMaintSchedule")
		<a class="dropdown-item" href="{{ url('maintenance/vehicle-maintenance-schedule') }}" speech-action-text="maintenance schedule">
			{{ Lang::get("company.vehMaintSchedule") }}
		</a>
		@endpermission
	</div>
</li>
@endpermission
@permission("manageVehiclePages")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
		{{ Lang::get("company.trip") }}
	</a>
	

	<div class="dropdown-menu">
<!-- 		@permission("manageBookings")
		<a class="dropdown-item" href="{{ url('vehicle-bookings') }}" speech-action-text="trip bookings|bookings|booking">
			{{ Lang::get("masters.bookings") }}
		</a>
		@endpermission -->
		@permission("manageAllocation")
		<a class="dropdown-item" href="{{ url('vehicle-allocation') }}" speech-action-text="trip allocation|allocation|vehicle allocation">
			{{ Lang::get("company.bookings") }}
		</a>
		@endpermission
		@permission("manageHotelBookings")
		<a class="dropdown-item" href="{{ url('vehicle-bookings/hotel-customer') }}" speech-action-text="trip hotel bookings|hotel bookings">
			{{ Lang::get("masters.hotelCustVehBookings") }}
		</a>
		@endpermission
		@permission("manageNonBillTrip")
		<a class="dropdown-item" href="{{ url('vehicle/nonBillTrips') }}" speech-action-text="trip non billable trips|non billable trips|non bill trips">
			{{ Lang::get("company.nonBillTrips") }}
		</a>
		@endpermission
		@permission("manageAllocation")
		<a class="dropdown-item" href="{{ url('trip-sheets') }}" speech-action-text="trip sheets|trip sheet">
			{{ Lang::get("company.tripSheets") }}
		</a>
		@endpermission
	</div>
</li>
@endpermission
@permission("manageInvoice")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardropInvoice" data-toggle="dropdown">
		{{ Lang::get("company.billing") }}
	</a>
	<div class="dropdown-menu">
		@permission("manageRetailInvoice")
		<a class="dropdown-item" href="{{ url('invoice-retail') }}" speech-action-text="billing retail invoice|retail invoice">
			{{ Lang::get("company.retailInvoice") }}
		</a>
		@endpermission
		<a class="dropdown-item" href="{{ url('invoice') }}" speech-action-text="billing group invoice|group invoice">
			{{ Lang::get("company.groupInvoice") }}
		</a>
		@permission("manageMonthlyInvoice")
		<a class="dropdown-item" href="{{ url('invoice-monthly') }}" speech-action-text="billing monthly invoice|monthly invoice">
			{{ Lang::get("company.monthlyInvoice") }}
		</a>
		@endpermission
		@permission("managePurchase")
		<a class="dropdown-item" href="{{ url('purchase') }}" speech-action-text="billing purchase invoice|purchase invoice">
			{{ Lang::get("company.purchase") }}
		</a>
		@endpermission
	</div>
</li>
@endpermission
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardropSettings" data-toggle="dropdown">
		{{ Lang::get("company.payments") }}
	</a>
	<div class="dropdown-menu">
		<a class="dropdown-item" href="{{ url('invoice/payment') }}" speech-action-text="invoice payment|invoice payments">
			{{ Lang::get("company.payment")}}
		</a>
		<a class="dropdown-item" href="{{ url('vendor/payment') }}" speech-action-text="vendor payment|vendor payments">
			{{ Lang::get("company.vendorpayment")}}
		</a>
	</div>
</li>
@permission("manageReports")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
		{{ Lang::get("common.reports") }}
	</a>

	<div class="dropdown-menu">
		@permission("manageDBReport")
		<a class="dropdown-item" href="{{ url('reports/dbr') }}" speech-action-text="dbr|daily business report">
			{{ Lang::get("common.dbr") }}
		</a>
		@endpermission
		@permission("manageVehMaintReport")
		<a class="dropdown-item" href="{{ url('reports/vehicle-maintenance-report') }}" speech-action-text="vehicle maintenance report">
			{{ Lang::get("common.vehMaintReport") }}
		</a>
		@endpermission
		@permission("manageInvoiceReport")
		<a class="dropdown-item" href="{{ url('reports/invoices') }}" speech-action-text="invoice report">
    		{{ Lang::get("company.invoices") }}
    	</a>
    	@endpermission
    	@permission("manageRevenueReport")
    	<div class="dropdown-submenu">
			<a class="dropdown-toggle" href="#">
				{{ Lang::get("company.revenue") }}
			</a>

			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ url('reports/revenue/customers') }}" speech-action-text="customers revenue|customer revenue">
            		{{ Lang::get("masters.customers") }}
            	</a>
            	<a class="dropdown-item" href="{{ url('reports/revenue/vehicles') }}" speech-action-text="vehicles revenue|vehicle revenue">
            		{{ Lang::get("company.vehicles") }}
            	</a>
            	<a class="dropdown-item" href="{{ url('reports/revenue/netRevenue') }}" speech-action-text="net revenue">
            		{{ Lang::get("company.net_revenue") }}
            	</a>
            	<a class="dropdown-item" href="{{ url('reports/revenue/receivables') }}" speech-action-text="receivables">
            		{{ Lang::get("company.receivables") }}
            	</a>
            	<a class="dropdown-item" href="{{ url('reports/revenue/yearlyRevenue') }}" speech-action-text="yearly revenue">
            		{{ Lang::get("company.yearly_revenue") }}
            	</a>
            	<a class="dropdown-item" href="{{ url('reports/revenue/expenses/vehType') }}" speech-action-text="vehicle expenses">
            		{{ Lang::get("company.vehicle_expenses") }}
            	</a>
			</div>
		</div>
    	@endpermission
		@permission("manageActivity")
		<div class="dropdown-submenu">
			<a class="dropdown-toggle" href="#">
				{{ Lang::get("company.activity") }}
			</a>

			<div class="dropdown-menu">
				@permission("manageDriverActivity")
				<a class="dropdown-item" href="{{ url('activity/driver') }}" speech-action-text="driver activity|driver activity report">
					{{ Lang::get("company.drivers") }}
				</a>
				@endpermission
				@permission("manageVehicleActivity")
				<a class="dropdown-item" href="{{ url('activity/vehicle') }}" speech-action-text="vehicle activity|vehicle activity report">
					{{ Lang::get("company.vehicles") }}
				</a>
				@endpermission
				@permission("manageUpComingBookingActivity")
				<a class="dropdown-item" href="{{ url('activity/upcoming-booking') }}" speech-action-text="upcoming booking|upcoming booking report">
					{{ Lang::get("company.upcomingBookings") }}
				</a>
				@endpermission
			</div>
		</div>
		@endpermission
	</div>
</li>
@endpermission
@permission("manageSecurityPages")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardropSecutiry" data-toggle="dropdown">
		{{ Lang::get("admin.security") }}
	</a>

	<div class="dropdown-menu">
		@permission("manageCompanyUsers")
		<a class="dropdown-item" href="{{ url('user/manage/company-users') }}" speech-action-text="manage users">
			{{ Lang::get("Manage Users") }}
		</a>
		@endpermission
		@permission("rolesView")
		<a class="dropdown-item" href="{{ url('user/manage/roles-permissions') }}" speech-action-text="manage roles">
			{{ Lang::get("admin.rolesPermissions") }}
		</a>
		@endpermission
	</div>
</li>
@endpermission
@permission("manageSettingsPages")
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardropSettings" data-toggle="dropdown">
		{{ Lang::get("company.settings") }}
	</a>

	<div class="dropdown-menu">
		@permission("manageGeneralSettingsPage")
		<a class="dropdown-item" href="{{ url('user/manage/company/general-settings') }}" speech-action-text="general settings">
			{{ Lang::get("General Settings") }}
		</a>
		@endpermission
		<a class="dropdown-item" id="exportSettingsForm">
			{{ Lang::get("Export") }}
		</a>
	</div>
</li>
@endpermission


