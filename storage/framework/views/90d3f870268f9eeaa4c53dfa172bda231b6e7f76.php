
<div class='home-matches-right clearfix'>
		<div class='matches-header-box'>
			<h4 class='matches-header'> User bets </h4>
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
				<?php $__currentLoopData = $user_bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ubets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<span class='place-bet-on'>
						You've placed 
						
						<span class='gold-text'>
						<?php echo e($ubets-> coinsWagered); ?> 
						</span>
						<span class="glyphicon glyphicon-coins glyph-coins"></span> 
						on 
						<?php echo e($ubets->teamChosenName->teamABV); ?>


					</span>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>


		</div>

	</div>