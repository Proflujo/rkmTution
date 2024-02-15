<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		{{ Lang::get("company.setting") }}
	</a>

	<div class="dropdown-menu">
		<a class="dropdown-item" href="{{url('/dev/company')}}">
			{{ Lang::get("company.company") }}
		</a>
	</div>
</li>

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbardropSecutiry" data-toggle="dropdown">
		{{ Lang::get("admin.security") }}
	</a>

	<div class="dropdown-menu">
		<a class="dropdown-item" href="{{ url('dev/manage/roles-permissions') }}">
			{{ Lang::get("admin.rolesPermissions") }}
		</a>
	</div>
</li>
