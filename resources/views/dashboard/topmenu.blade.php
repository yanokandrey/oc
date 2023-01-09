<div class='container text-center'>
<div class='row'>
	<div class='col-2 topmenu welcomeLogo'>@include('logo')</div>
	<div class='col-8 topmenu topmenuText'>Hello,&nbsp;@if(Auth::user()) {{ Auth::user()->name}} @endif &nbsp;</div>
	<div class='col-2 tmain topmenu align-right'>
		<a class='' href='\logout'><button class='btn btn-danger logout'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
  <path d="M7.5 1v7h1V1h-1z"/>
  <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
</svg>&nbsp;Logout&nbsp;</button></a></div>
</div>
</div>