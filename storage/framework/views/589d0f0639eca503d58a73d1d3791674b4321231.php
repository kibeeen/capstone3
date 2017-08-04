<?php $__env->startSection('title'); ?>
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inline-css'); ?>

	body {
		
		
		background-attachment: fixed;
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

		<div id='add-sports-category'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Sports Category
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action='<?php echo e(url("/sports-categories/add/")); ?>' enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_sportscat_name">Category Name :</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="add_sportscat_name" name='add_sportscat_name' placeholder='Add sports category name' required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_sportscat_logo">Category Thumb :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="add_sportscat_logo" name='add_sportscat_logo' accept='image/*'>
						    </div>
						</div>


					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Sports Category</button>
						    </div>
					  	</div>
					</form>	
				</div> 
			</div> 
		</div> 



</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('..layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>