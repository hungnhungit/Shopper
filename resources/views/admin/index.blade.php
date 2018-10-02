<h1>Admin</h1>
<a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
	@csrf
</form>