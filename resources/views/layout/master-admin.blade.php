<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- FONTS FROM GOOGLE -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lobster"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">

	<!-- ICONS -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" media="all">

	<link href="{{ asset('css/hover.css') }}" rel="stylesheet" media="all">

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->

	<link rel='stylesheet' href='{{ asset('css/style.css') }}'>

	<style>
		@yield('inline-css')
	</style>

	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	
	<header class='clearfix'>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="nav-container container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="/">
		      	<img src='{{ URL::asset("uploads/admin/logo.png") }}' class='navbar-brand-img'>
		      </a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		  </div>
		</nav>	
	</header>


	<div class='container admin-container clearfix'>
		<div class='admin-sidebar clearfix'>

			{{-- box 1 --}}
			<div class='admin-sidebar-boxes'>
				<ul class='ul-admin-sidebar'>
					<a><li><i class="fa fa-tachometer"></i> Dashboard</li></a>
					<a><li><i class="fa fa-users"></i> Users <span class="badge users-badge">147</span></li></a>
					<a><li><i class="fa fa-cart-arrow-down"></i> Deposits <span class="badge deposits-badge">5</span></li></a>
					<a><li><i class="fa fa-money"></i> Withdrawals <span class="badge withdrawals-badge">2</span></li></a>

				</ul>
			</div> {{-- end of box 1 --}}

			{{-- box 2 --}}
			<div class='admin-sidebar-boxes'>
				<ul class='ul-admin-sidebar'>
					<a><li><i class="fa fa-bolt"></i></i> Live Matches <span class="badge live-badge">10</span></li></a>
				</ul>
			</div> {{-- end of box 2 --}}

			{{-- box 3 --}}
			<div class='admin-sidebar-boxes'>
				<ul class='ul-admin-sidebar'>
					<a href="update-matches"><li><i class="fa fa-hourglass-end"></i> Update Matches </li></a>
				</ul>
			</div>{{-- end of box 3 --}}

			{{-- box 4 --}}
			<div class='admin-sidebar-boxes'>
				<ul class='ul-admin-sidebar'>
					<a href='matches'><li><i class="fa fa-book"></i> Add Matches</li></a>
					<a href='teams'><li><i class="fa fa-user-plus"></i> Add Teams</li></a>
					<a href='leagues'><li><i class="fa fa-trophy"></i> Add Leagues</li></a>
					<a href='match-categories'><li><i class="fa fa-tag"></i> Add Match Category</li></a>
					<a href='sports-categories'><li><i class="fa fa-futbol-o"></i> Add Sports Category</li></a>
					<a href='game-series'><li><i class="fa fa-list-alt"></i> Add Game Series</li></a>
				</ul>
			</div>{{-- end of box 4 --}}

			{{-- box 5 --}}
			<div class='admin-sidebar-boxes'>
				<ul class='ul-admin-sidebar'>
					<a><li><i class="fa fa-inbox"></i> Inbox <span class="badge message-badge">27</span></li></a>
					<a><li><i class="fa fa-cog"></i> Settings </li></a>
					
				</ul>
			</div>{{-- end of box 5 --}}	

		</div> {{-- end of admin-sidebar --}}

		@yield('admin-home-content')

	</div> {{-- end of admin container section --}}



	

	@yield('javascripts')

	

	





</body>
</html>