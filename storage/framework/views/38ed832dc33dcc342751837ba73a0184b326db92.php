<?php $__env->startSection('title'); ?>
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
<?php $__env->stopSection(); ?>


		
<?php $__env->startSection('home-content-left'); ?>
	<div class='home-matches-left clearfix'>

	<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<div id='tournament-matches' class='clearfix col-12-xs style' ">
			<div class='tournament-heading-overlay'>
				<div class='tourney-header-wrapper'>

					<h4 class='tourney-name'><?php echo e($match->MatchLeague->leagueName); ?></h4>
					
					<h3 class='tourney-startdate'><?php echo e(Carbon\Carbon::parse($match->startTime)->diffForHumans()); ?></h3>
					<h3 class='tourney-seriesname'><?php echo e($match->GameSeries->gameSeriesName); ?></h3>
				</div>



				<div class='tourney-teams clearfix'>

					<span class='team-1-name-lg'>
						<?php echo e($match->MatchHomeTeam->teamName); ?>

						<br>
						<?php echo e($match->homeTeamOddsPcnt); ?>%
					</span>
					<div class='team-1-logo-lg'>
						<?php if($match->homeTeamWin == 1): ?>
								<img src="../uploads/admin/win.png" class='win-crown-lg'>
						<?php else: ?>
						<?php endif; ?>
						<img src="<?php echo e(asset($match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-lg'>
					</div>

					<span class='vs-score'>
						<?php echo e($match->homeTeamScore); ?>

						 <span class='colon' id='colon'> : </span>  
						<?php echo e($match->awayTeamScore); ?>

						<br>
						<img src="../uploads/admin/vs.png" class='vs-ico'>
						<br>

						<?php if($match->inPlay == 0 && $match->finished == 0): ?>
							<span class='box-sm-upcoming'>
								Upcoming
							</span>
						<?php elseif($match->inPlay == 1 && $match->finished == 0): ?>
							<span class='box-sm-live'>Live</span>
						<?php elseif($match->inPlay == 0 && $match->finished == 1): ?>
							<span class='box-sm-ended'>Ended</span>
						<?php endif; ?>

					</span>

					<span class='team-2-name-lg'>
						<?php echo e($match->MatchAwayTeam->teamName); ?>

						<br>
						<?php echo e($match->awayTeamOddsPcnt); ?>%
					</span>
					<div class='team-2-logo-lg'>
						<?php if($match->awayTeamWin == 1): ?>
						<img src="../uploads/admin/win.png" class='win-crown-lg'>
						<?php else: ?>
						<?php endif; ?>
						<img src="<?php echo e(asset($match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-lg'>
					</div>

					
					
				</div>


								

			</div>
		</div> 


		<div class='tourney-header-box'>
		<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($match->inPlay == 0 && $match->finished == 0): ?>
				<h4 class='team-pick-header'>Place Bet</h4>
			
			<?php elseif($match->inPlay == 1 && $match->finished == 0): ?>
				<h4 class='team-pick-header'>Bets are locked &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></h4>
			<?php elseif($match->finished == 1 && $match->inPlay == 0): ?>
				<h4 class='team-pick-header'>This match has already ended &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></h4>
			<?php endif; ?> 
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			
		</div>

		<div id='place-bet-content' class='t-top-border clearfix'>

		<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($match->inPlay == 0 && $match->finished == 0): ?>
				<form method="post" action='<?php echo e(url("/tournaments/placebet/")); ?>' >
					<?php echo e(csrf_field()); ?>


					<div class="radio">
					  	<label><input type="radio" name="selected_team" value='<?php echo e($match->MatchHomeTeam->id); ?>' required>
					  		<?php echo e($match->MatchHomeTeam->teamName); ?>

				  		</label>
					</div>
					<div class="radio">
					  	<label><input type="radio" name="selected_team" value='<?php echo e($match->MatchAwayTeam->id); ?>' required>
						  	<?php echo e($match->MatchAwayTeam->teamName); ?>

					  	</label>
					</div>


					<div class="input-group">
					    <span class="input-group-addon"><i class="glyphicon glyphicon-coin"></i></span>
					    <input id="input_bet_coins" type="text" class="form-control input-bet-coins" name="input_bet_coins" placeholder="0" required>

					    <input type='hidden' name='tourney_match_id' value="<?php echo e($match->id); ?>">

					    <input type='submit' class='btn btn-default' value='Place bet'>
					</div>
				</form>

				<?php if(Session::has('insf_coins')): ?>
				   <div class="alert alert-info"><?php echo e(Session::get('insf_coins')); ?></div>
				<?php endif; ?>

				<?php if(Session::has('no_coin_input')): ?>
				   <div class="alert alert-info"><?php echo e(Session::get('no_coin_input')); ?></div>
				<?php endif; ?>
			<?php elseif($match->inPlay == 1 && $match->finished == 0): ?>
				
			<?php elseif($match->inPlay == 0 && $match->finished == 1): ?>
				
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>














		

	</div> <!-- end of home matches left section -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('home-content-right'); ?>

	<?php echo $__env->make("pages\sidebar",['user_bets' => $user_bets], ['matches' => $matches], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
		
	


<?php echo $__env->make('..layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>