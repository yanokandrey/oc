<div class="ccnteiner">
	<a href="{{ route('dashboard.basicWelcome') }}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuItem @if(request()->is('dashboard/basicWelcome') or request()->is('dashboard/basicSEO')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 DashboardMenuItemName">Basic</div>
		</div>
	</a>
			@if(request()->is('dashboard/basicWelcome') or request()->is('dashboard/basicSEO'))
		<a href="{{ route('dashboard.basicWelcome') }}">
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuSubItem @if(request()->is('dashboard/basicWelcome')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 DashboardMenuSubItemName">Welcome</div>
		</div>
		</a>
		<a href="{{ route('dashboard.basicSEO') }}">
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuSubItem @if(request()->is('dashboard/basicSEO')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 DashboardMenuSubItemName">SEO</div>
		</div>
		</a>
			@endif
 	<a href="{{ route('dashboard.steps') }}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuItem @if(request()->is('dashboard/steps')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 DashboardMenuItemName">Steps</div>
		</div>
	</a>

	<a href="{{ route('dashboard.package') }}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuItem @if(request()->is('dashboard/package')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 DashboardMenuItemName">Package</div>
		</div>
	</a>
	<a href="{{ route('dashboard.delivery') }}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuItem @if(request()->is('dashboard/delivery')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 DashboardMenuItemName">Delivery</div>
		</div>
	</a>
	<a href="{{ route('dashboard.payments') }}">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"><div class='DashboardMenuItem @if(request()->is('dashboard/payments')) activeMenu @endif'>&nbsp;</div></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 DashboardMenuItemName">Payments</div>
		</div>
	</a>
</div>