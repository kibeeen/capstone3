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

	<div class='admin-main-content'>

		<div id='add-sports-category'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Sports Category
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action='<?php echo e(url("/game-series/add/")); ?>' enctype="multipart/form-data">

						<?php echo e(csrf_field()); ?>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_game_series">Add Game Series :</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="add_game_series" name='add_game_series' placeholder='ex. BO1, First-Quarter, Match+1.5..' required>
						    </div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Game Series</button>
						    </div>
					  	</div>
					</form>	
				</div> 
			</div> 
		</div> 

	</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('..layout/master-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>