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

		<div id='add-matches'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Matches
					</h3>
				</div>

				

				<div class="panel-body">

					<form class="form-horizontal" action='/matches/add/' method="post">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_match_date">Start Time :</label>
						    <div class="col-sm-3 date-padding">
						      	<input type="date" class="form-control" id="add_match_date" name='add_match_date' required>
						    </div>
						    <div class="col-sm-3 time-padding">
						      	<input type="time" class="form-control" id="add_match_time" name='add_match_time' placeholder='Add Home Team' required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="match_league_id">League :</label>
						    <div class="col-sm-6">
						      	<select class="form-control" id="match_league_id" name='match_league_id' required>
							  	<?php $__currentLoopData = $leagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $league): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($league->id); ?>'>
								    	<?php echo e($league->leagueName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						    </div>
						</div>

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_home_team">Home Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="add_home_team" name='add_home_team' required>
							  	<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($team->id); ?>'>
								    	<?php echo e($team->teamName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						    </div>
						</div>

					

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_away_team">Away Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="add_away_team" name='add_away_team' required>
							  	<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($team->id); ?>'>
								    	<?php echo e($team->teamName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						    </div>
						</div>

					

						<hr>

						<div class="form-group">
						  	<label for="match_game_series" class="control-label col-sm-2">Game Series :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="match_game_series" name='match_game_series' required>
							  	<?php $__currentLoopData = $game_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gameseries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($gameseries->id); ?>'>
								    	<?php echo e($gameseries->gameSeriesName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						  	</div>
						</div>

	

						<div class="form-group">
						  	<label for="match_game_category" class="control-label col-sm-2">Match Category :</label>
						  	<div class="col-sm-4">
							  	<select class="form-control" name='match_game_category' id="match_game_category" required>
							    	<?php $__currentLoopData = $match_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($match_category->id); ?>'>
								    	<?php echo e($match_category->matchCatName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Match</button>
						    </div>
					  	</div>
					</form>	
				</div> 
			</div> 
		</div> 

	</div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('..layout/master-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>