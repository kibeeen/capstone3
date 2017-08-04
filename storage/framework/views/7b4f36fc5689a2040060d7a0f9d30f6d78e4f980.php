<?php $__env->startSection('title'); ?>
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inline-css'); ?>

	body {
		
		
	} 

	.navbar-inverse {
		box-shadow: 0 0px 5px rgba(0,0,0,0);
	}

<?php $__env->stopSection(); ?>


<?php $__env->startSection('admin-home-content'); ?>

<div class='container admin-container clearfix'>

	<div class='admin-sidebar clearfix'>

		
		<div class='admin-sidebar-boxes'>
			<ul class='ul-admin-sidebar'>
				<li><i class="fa fa-tachometer"></i> Dashboard</li>
				<li><i class="fa fa-users"></i> Users <span class="badge users-badge">147</span></li>
				<li><i class="fa fa-cart-arrow-down"></i> Deposits <span class="badge deposits-badge">5</span></li>
				<li><i class="fa fa-money"></i> Withdrawals <span class="badge withdrawals-badge">2</span></li>

			</ul>
		</div> 

		
		<div class='admin-sidebar-boxes'>
			<ul class='ul-admin-sidebar'>
				<li><i class="fa fa-bolt"></i></i> Live Matches <span class="badge live-badge">10</span></li>
			</ul>
		</div> 

		
		<div class='admin-sidebar-boxes'>
			<ul class='ul-admin-sidebar'>
				<li><i class="fa fa-hourglass-end"></i> Update Matches <span class="badge update-badge">3</span></li>
			</ul>
		</div>

		
		<div class='admin-sidebar-boxes'>
			<ul class='ul-admin-sidebar'>
				<li><i class="fa fa-plus"></i> Add Matches</li>
				<li><i class="fa fa-plus"></i> Add Teams</li>
				<li><i class="fa fa-plus"></i> Add Leagues</li>
				<li><i class="fa fa-plus"></i> Add Match Category</li>
				<li><i class="fa fa-plus"></i> Add Sports Category</li>
				<li><i class="fa fa-plus"></i> Add Game Series</li>
			</ul>
		</div>

		
		<div class='admin-sidebar-boxes'>
			<ul class='ul-admin-sidebar'>
				<li><i class="fa fa-envelope"></i> Inbox <span class="badge message-badge">27</span></li>
				<li><i class="fa fa-cog"></i> Settings </li>
				
			</ul>
		</div>


	</div> 












	<div class='admin-main-content'>

		<form class="form-horizontal">
			<div class="form-group">
			    <label class="control-label col-sm-2" for="email">Email:</label>
			    <div class="col-sm-10">
			      	<input type="email" class="form-control" id="email" placeholder="Enter email">
			    </div>
			</div>

		  	<div class="form-group">
		    	<label class="control-label col-sm-2" for="pwd">Password:</label>
		    	<div class="col-sm-10"> 
		      		<input type="password" class="form-control" id="pwd" placeholder="Enter password">
		    	</div>
		  	</div>

		  	<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-10">
				    <button type="submit" class="btn btn-default">Submit</button>
			    </div>
		  	</div>
		</form>	

		asdasdasd
		asdasd
		asdasd
		

	</div>



































</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('..layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>