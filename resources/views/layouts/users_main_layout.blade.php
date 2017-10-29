<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>@yield('title')</title>

	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/admin_main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/user_main.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
<header>
	<nav class="navbar navbar-default">
		<div class="container">
		   <div class="navbar-header">
		    	<a class="navbar-brand" href="{{route('admin_dashboard')}}">WorkTime Worklog</a>
		    </div>
		    <ul class="nav navbar-nav pull-right">
		    	<li> <a><strong>{{ Auth::user()->username }}</strong> | {{ Auth::user()->position }} <!-- add position --> </a></li>
		    	<li><a href="{{route('logout')}}">Logout</a></li>
		    </ul>
		</div>

	</nav>
</header>
	<div class="container-fluid main-container">
		
		<div class="col-md-12 content">
			@yield('content')
		</div>
		
	</div>
	
</body>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</html>