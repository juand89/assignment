<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Blog</title>
		<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="{{ url('/') }}">Home</a>
						</li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						<li>
							<a href="{{ url('/auth/login') }}">Login</a>
						</li>
						<li>
							<a href="{{ url('/auth/register') }}">Register</a>
						</li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								@if (Auth::user()->can_post())
								<li>
									<a href="{{ url('/new-post') }}">Add new post</a>
								</li>
								@endif
								<li>
									<a href="{{ url('/auth/logout') }}">Logout</a>
								</li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		<div class="container">
			@if (Session::has('message'))
			<div class="flash alert-info">
				<p class="panel-body">
					{{ Session::get('message') }}
				</p>
			</div>
			@endif
			
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2>@yield('title')</h2>
							@yield('title-meta')
						</div>
						<div class="panel-body">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{ asset('/js/jquery.min-2.1.3.js') }}"></script>
		<script src="{{ asset('/js/bootstrap.min-3.3.1.js') }}"></script>
	</body>
</html>
