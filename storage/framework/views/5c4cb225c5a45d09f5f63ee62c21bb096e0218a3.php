<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>

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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"> -->

	<link rel='stylesheet' href='<?php echo e(asset('css/style.css')); ?>'>
	<style>
		<?php echo $__env->yieldContent('inline-css'); ?>
	</style>

</head>
<body>
	
	<header class='clearfix'>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="nav-container container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="/">
		      	<img src='<?php echo e(URL::asset("uploads/admin/logo.png")); ?>' class='navbar-brand-img'>
		      </a>
		    </div>
		    <ul class="nav navbar-nav navbar-right">
		    	
		      <li><a href="#" class='gold-text'><span class="glyphicon glyphicon-coins glyph-coins"></span> <?php echo e(Auth::user()->coins); ?></a></li>
		      <li><a href="#" class='inplay-text'>( <span class="glyphicon glyphicon-coins-inplay glyph-coins"></span> 
		      <?php echo e(Auth::user()->coinsInPlay); ?> In Play )</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		  </div>
		</nav>	
	</header>

		<div class='main-content clearfix'>
			<div class='home-matches-container container clearfix'>

				<div class='home-matches-left-box clearfix'>
					<?php echo $__env->yieldContent('home-content-left'); ?>
				</div> <!-- end of home matches left box section -->

				<div class='home-matches-right-box clearfix'>
					<?php echo $__env->yieldContent('home-content-right'); ?>
				</div> <!-- end of home matches right box section -->

			</div>

		</div>


</body>
</html>