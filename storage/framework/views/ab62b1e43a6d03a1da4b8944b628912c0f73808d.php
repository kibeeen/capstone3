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

		<div id='add-leagues'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Leagues
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" action='/leagues/add/' method="post" enctype="multipart/form-data">
						<div class="form-group">
						<?php echo e(csrf_field()); ?>

						    <label class="control-label col-sm-2" for="add_league_name">League Name :</label>
						    <div class="col-sm-5">
						      	<input type="text" class="form-control" id="add_league_name" name='add_league_name' placeholder='Enter league name' required>
						    </div>
						</div>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_league_banner">League Banner :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="add_league_banner" name='add_league_banner' accept='image/*'>
						    </div>
						</div>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="league_start_date">Start Date :</label>
						    <div class="col-sm-3 date-padding">
						      	<input type="date" class="form-control" id="league_start_date" name='league_start_date' required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="league_end_date">End Date :</label>
						    <div class="col-sm-3 date-padding">
						      	<input type="date" class="form-control" id="league_end_date" name='league_end_date'>
						    </div>
						</div>


					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add League</button>
						    </div>
					  	</div>
					</form>	
				</div> 
			</div> 
		</div> 

		<div id='edit-leagues'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-pencil-square-o"></i>&nbsp; Edit Leagues
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" action='/leagues/edit/' method="post" enctype="multipart/form-data">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
						    <label for="select_league_name" class="control-label col-sm-2">Select League :</label>
						  	<div class="col-sm-5">
							  	<select class="form-control" id="select_league_name" name='select_league_name' required>
							  		<option selected disabled>Select a league to edit / delete</option>

							    	<?php $__currentLoopData = $leagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $league): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  	
							    	<option value="<?php echo e($league->id); ?>">
							    		<?php echo e($league->leagueName); ?>

						    		</option>

								  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
							  	<input type="hidden" id="token" value="<?php echo e(csrf_token()); ?>">
						  	</div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="edit_league_name">New League Name :</label>
						    <div class="col-sm-5">
						      	<input type="text" class="form-control" id="edit_league_name" name='edit_league_name' placeholder='Edit league name' required>
						    </div>
						</div>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="edit_league_banner">New League Banner :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="edit_league_banner" name='edit_league_banner' accept='image/*'>
						    </div>
						</div>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="league_start_date">Start Date :</label>
						    <div class="col-sm-3 date-padding">
						      	<input type="date" class="form-control" id="league_start_date" name='league_start_date' required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="league_end_date">End Date :</label>
						    <div class="col-sm-3 date-padding">
						      	<input type="date" class="form-control" id="league_end_date" name='league_end_date'>
						    </div>
						</div>


					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-5">
							    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i></i>&nbsp; Update League</button>&nbsp;

							    <a href=' <?php echo e(url("/teams/delete/{id}")); ?>'>
								    <button type='button' class="btn btn-danger" id='delete_league' name='delete_league'>
								    	<i class="fa fa-trash-o"></i>&nbsp; Delete League
								    </button>
							    </a>
						    </div>

						    
					  	</div>
					</form>	
				</div> 
			</div> 
		</div> 

	</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('..layout/master-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>