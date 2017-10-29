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
	<link href="{{ asset('css/authmain.css') }}" rel="stylesheet">


	<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
</head>
<body>
	<header class="login-header">
		<nav class="navbar navbar-default">
		  <div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="{{route('login')}}">WorkTime Worklog</a>
		    </div>
		  </div>
		</nav>

	</header>



	<div class="container">
    	<div class="row login-body">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								{{ Form::open(array('url'=>'/login', 'role'=>'form', 'action'=>route('login.login'), 'id'=>'login-form', 'style'=>'display:block;')) }}
								
								{{ csrf_field() }}
									<div class="form-group">
										{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
									</div>
									<div class="form-group">
										{{ Form::password('password', array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'Password')) }}
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
									{{ Form::close() }}
								{{-- </form> --}}
								<form id="register-form" action="https://phpoll.com/register/process" method="post" role="form" style="display: none;">
								{{ csrf_field() }}
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="2" class="form-control" placeholder="First name">
									</div>
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="2" class="form-control" placeholder="Last name">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/auth.js') }}"></script>
</html>