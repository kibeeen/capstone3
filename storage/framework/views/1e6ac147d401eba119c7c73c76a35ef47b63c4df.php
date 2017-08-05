
<div class='home-matches-right clearfix'>
		<div class='matches-header-box'>
			<h4 class='matches-header'> Recent Bets </h4>
		</div>

		<div class='side-match clearfix'>

			
			<!-- <div class='team-1-side'>
				<span class='team-1-name-side clearfix'>Golden State Warriors</span>
				<img src='http://dehayf5mhw1h7.cloudfront.net/wp-content/uploads/sites/27/2016/10/08023220/Golden-State-Warriors-Wallpaper2.jpg' class='team-1-logo-sm'>
				<i class="fa fa-check" aria-hidden="true"></i>
			</div>

			<span class='vs-side'>vs</span>

			<div class='team-2-side'>
				<span class='team-2-name-side clearfix'>Golden State Warriors</span>
				<img src='http://dehayf5mhw1h7.cloudfront.net/wp-content/uploads/sites/27/2016/10/08023220/Golden-State-Warriors-Wallpaper2.jpg' class='team-2-logo-sm'>
			</div> -->

			<div class='team-1-side'>
		    	<?php if(\Request::is('tournaments/*')): ?>
		    		<ul class='ul-placed-bets'>
		    		<?php $__currentLoopData = $user_bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    			<li class='li-placed-bets'>
		    			<img src="<?php echo e(asset($ubets->UserBetMatchID->MatchSportsCategory->sportsCatIMG)); ?>" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							<?php echo e($ubets->Bettor->username); ?> placed
							<span class='gold-text-xs'>
							<?php echo e($ubets->coinsWagered); ?> &nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									<?php if($match->homeTeamID == $ubets->teamChosenID): ?>
										<img src="<?php echo e(asset($match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-xs' title="<?php echo e($match->MatchHomeTeam->teamName); ?>">
										<?php echo e($match->homeTeamOdds); ?>

									<?php elseif($match->awayTeamID == $ubets->teamChosenID): ?>
									<img src="<?php echo e(asset($match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-xs' title="<?php echo e($match->MatchAwayTeam->teamName); ?>">
										<?php echo e($match->awayTeamOdds); ?>

									<?php endif; ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</span>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
		    	
		    	<?php elseif(\Request::is('/')): ?>

		    		<ul class='ul-placed-bets'>
		    		<?php $__currentLoopData = $user_bets_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubetsall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    			<li class='li-placed-bets'>
		    				<img src="<?php echo e(asset($ubetsall->UserBetMatchID->MatchSportsCategory->sportsCatIMG)); ?>" class='team-logo-xs sidebar-gameico' title="1">
							<span class='place-bet-on'>
								You've placed
								<span class='gold-text-xs'>
								<?php echo e($ubetsall-> coinsWagered); ?> &nbsp;
								</span>
								<span class="glyphicon glyphicon-coins glyph-coins"></span> 
								on 
									<?php $__currentLoopData = $all_matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $all_match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($all_match->homeTeamID == $ubetsall->teamChosenID): ?>
											<img src="<?php echo e(asset($all_match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-xs' title="<?php echo e($all_match->MatchHomeTeam->teamName); ?>">
											<?php echo e($all_match->homeTeamOdds); ?>

										<?php elseif($all_match->awayTeamID == $ubetsall->teamChosenID): ?>
											<img src="<?php echo e(asset($all_match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-xs' title="<?php echo e($all_match->MatchAwayTeam->teamName); ?>">
											<?php echo e($all_match->awayTeamOdds); ?>

										<?php endif; ?>

									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							</span>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
		    	<?php endif; ?>
			</div>


		</div>

	</div>