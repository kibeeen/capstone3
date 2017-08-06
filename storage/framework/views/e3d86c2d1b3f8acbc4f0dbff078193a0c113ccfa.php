<?php $__env->startSection('title'); ?>
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
<?php $__env->stopSection(); ?>


		
<?php $__env->startSection('home-content-left'); ?>

	<div class='home-matches-left clearfix'>
		<input type="hidden" id="token" value="<?php echo e(csrf_token()); ?>">

		<!-- start of live matches section -->
		<div id='live-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-live'> Live Matches </h4>
			</div>

			<ul class='ul-matches clearfix'>

				<?php $__currentLoopData = $live_matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $live_match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<div class='game-id clearfix'>
							<div class='game-info'>
								<img src="<?php echo e(asset($live_match->MatchSportsCategory->sportsCatIMG)); ?>" class='game-ico'>
								<span class='game-time text-live'>
									<?php echo e(Carbon\Carbon::parse($live_match->startTime)->diffForHumans()); ?>

								</span>
								<span class='game-desc'>
									<?php echo e($live_match->MatchLeague->leagueName); ?>

								</span>
							</div>

							<a href='tournaments/<?php echo e($live_match->id); ?>'>
								<div class='match clearfix'>
									<div class='match-teams clearfix'>
										<span class='team-1-name'>
											<?php echo e($live_match->MatchHomeTeam->teamName); ?>

											<br>
											<?php echo e($live_match->homeTeamOddsPcnt); ?>%
										</span>
										<div class='team-1-logo'>
											<img src="<?php echo e(asset($live_match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-md'>
										</div>
										<span class='vs'>
											<?php echo e($live_match->GameSeries->gameSeriesName); ?>

											<br>
											<img src="../uploads/admin/vs.png" class='vs-ico'>
										</span>

										<span class='team-2-name'>
											<?php echo e($live_match->MatchAwayTeam->teamName); ?>

											<br>
											<?php echo e($live_match->awayTeamOddsPcnt); ?>%
										</span>
										<div class='team-2-logo'>
											<img src="<?php echo e(asset($live_match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-md'>
										</div>

										
										
									</div>

									<div class='match-tourney-img-box clearfix'>
										<img src="<?php echo e(asset($live_match->MatchLeague->leagueBanner)); ?>" class='match-tourney-img'>
									</div>
								</div>
							</a>

						</div>
					</li>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</ul>
		</div> <!-- end of live matches section -->

		<!-- start of upcoming matches section -->
		<div id='upcoming-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-upcoming'> Upcoming Matches</h4>
			</div>

			<ul class='ul-matches clearfix'>



			<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li>
					<div class='game-id clearfix'>
						<div class='game-info'>
							<img src='<?php echo e(asset($match->MatchSportsCategory->sportsCatIMG)); ?>' class='game-ico'>
							<span class='game-time'> 
								<?php echo e(Carbon\Carbon::parse($match->startTime)->diffForHumans()); ?>

							</span>

							<span id='timeleft<?php echo e($match->id); ?>'>
								<!-- <?php echo e(Carbon\Carbon::parse($match->startTime)->diffinSeconds(Carbon\Carbon::now())); ?> -->
							</span>

							<span class='game-desc'><?php echo e($match->MatchLeague->leagueName); ?></span>
						</div>

						<a href='tournaments/<?php echo e($match->id); ?>'>
							<div class='match clearfix'>
								<div class='match-teams clearfix'>
									<span class='team-1-name'>
										<?php echo e($match->MatchHomeTeam->teamName); ?>

										<br>
										<?php echo e($match->homeTeamOddsPcnt); ?>%
									</span>

									<div class='team-1-logo'>
										<img src="<?php echo e(asset($match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-md'>
									</div>

									<span class='vs'>
										<?php echo e($match->GameSeries->gameSeriesName); ?>

										<br>
										<img src="../uploads/admin/vs.png" class='vs-ico'>
									</span>

									<span class='team-2-name'>
										<?php echo e($match->MatchAwayTeam->teamName); ?>

										<br>
										<?php echo e($match->awayTeamOddsPcnt); ?>%
									</span>

									<div class='team-2-logo'>
										<img src="<?php echo e(asset($match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-md'>
									</div>

									
									
								</div>

								<div class='match-tourney-img-box clearfix'>
									<img src="<?php echo e(asset($match->MatchLeague->leagueBanner)); ?>" class='match-tourney-img'>
								</div>
							</div>
						</a>

					</div>
				</li>

				

				<script type="text/javascript">
					
				</script>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<script type="text/javascript">
			$(document).ready(function() {


				var cnt = $('#match_id').html();


					function masterTimer() {
						for(var x=0;x<=cnt+1;x++){
							setInterval(checker(x), 1000);
						}

					}

					masterTimer();

					function checker(n) {

						token = $('#token').val();

						var time_left = $('#timeleft'+n).html();

						$('#timeleft'+n).html(time_left);
						
						
						// $('#timeleft'+n).html(n);

						if (time_left == 300) {

							$.post('/api/lockMatches/',

							{
								_token : token,

							}, function(data){

							});


						}  
					}
				});
			</script>

				

			</ul>
		</div> <!-- end of upcoming matches section -->












		<!-- start of live matches section -->
		<div id='recent-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-recent'> Recent Matches </h4>
			</div>

			<ul class='ul-matches clearfix'>
				
				<?php $__currentLoopData = $recent_matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<div class='game-id-recent clearfix'>
							<div class='game-info'>
								<img src='<?php echo e(asset($recent_match->MatchSportsCategory->sportsCatIMG)); ?>' class='game-ico'>
								<span class='game-time text-recent'>
									<?php echo e(Carbon\Carbon::parse($recent_match->startTime)->diffForHumans()); ?>

								</span>
								<span class='game-desc'>
									<?php echo e($recent_match->MatchLeague->leagueName); ?>

								</span>
							</div>

							<a href='tournaments/<?php echo e($recent_match->id); ?>'>
								<div class='match clearfix'>
									<div class='match-teams clearfix'>
										<span class='team-1-name'>
											<?php echo e($recent_match->MatchHomeTeam->teamName); ?>

											<br>
											<?php echo e($recent_match->homeTeamOddsPcnt); ?>%
										</span>
										<div class='team-1-logo'>
											<?php if($recent_match->homeTeamWin == 1): ?>
											<img src="../uploads/admin/win.png" class='win-crown'>
											<?php else: ?>
											<?php endif; ?>
											<img src="<?php echo e(asset($recent_match->MatchHomeTeam->teamLogo)); ?>" class='team-logo-md'>
										</div>
										<span class='vs-score-recent'>
											<?php echo e($recent_match->homeTeamScore); ?>

											 <span class='colon' id='colon'> : </span>  
											<?php echo e($recent_match->awayTeamScore); ?>

											<br>
											<img src="../uploads/admin/vs.png" class='vs-ico-recent'>
										</span>

										<span class='team-2-name'>
											<?php echo e($recent_match->MatchAwayTeam->teamName); ?>

											<br>
											<?php echo e($recent_match->awayTeamOddsPcnt); ?>%
										</span>
										<div class='team-2-logo'>
											<?php if($recent_match->awayTeamWin == 1): ?>
												<img src="../uploads/admin/win.png" class='win-crown'>
											<?php else: ?>
											<?php endif; ?>
											<img src="<?php echo e(asset($recent_match->MatchAwayTeam->teamLogo)); ?>" class='team-logo-md'>
										</div>

										
										
									</div>

									<div class='match-tourney-img-box clearfix'>
										<img src="<?php echo e(asset($recent_match->MatchLeague->leagueBanner)); ?>" class='match-tourney-img'>
									</div>
								</div>
							</a>

						</div>
					</li>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</ul>
		</div> <!-- end of recent matches section -->
	</div> <!-- end of home matches left section -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('home-content-right'); ?>
	<?php echo $__env->make("pages\sidebar", ['user_bets_won' => $user_bets_won], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascripts'); ?>
	

<?php $__env->stopSection(); ?>		
	


<?php echo $__env->make('..layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>