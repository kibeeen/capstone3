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
				<li>
					<div class='game-id clearfix'>
						<div class='game-info'>
							<img src='../uploads/admin/game-icons/dota2.png' class='game-ico'>
							<span class='game-time text-live'> 30 minutes ago</span>
							<span class='game-desc'>Semi Finals</span>
						</div>

						<!-- <a href='#'> -->
							<div class='match clearfix'>
								<div class='match-teams clearfix'>
									<span class='team-1-name'>
										TNC Pro Team
										<br>
										22%
									</span>
									<div class='team-1-logo'>
										<img src='https://img.bets4.pro/teams/cs_go/Recca_eSports.png?4604' class='team-logo-md'>
									</div>
									<span class='vs'>
										BO3
										<br>
										vs
									</span>

									<span class='team-2-name'>
										Midas Club Elite
										<br>
										78%
									</span>
									<div class='team-2-logo'>
										<img src='https://img.bets4.pro/teams/dota2/Midas_Club_Elite.png?4370' class='team-logo-md'>
									</div>

									
									
								</div>

								<div class='match-tourney-img-box clearfix'>
									<img src='../uploads/admin/tourney-imgs/dream-league-season-7.jpeg' class='match-tourney-img'>
								</div>
							</div>
						<!-- </a> -->

					</div>
				</li>
				<li>
					<div class='game-id clearfix'>
						<div class='game-info'>
							<img src='../uploads/admin/game-icons/dota2.png' class='game-ico'>
							<span class='game-time text-live'> 30 minutes ago</span>
							<span class='game-desc'>Semi Finals</span>
						</div>

						<!-- <a href='#'> -->
							<div class='match clearfix'>
								<div class='match-teams clearfix'>
									<span class='team-1-name'>
										TNC Pro Team
										<br>
										22%
									</span>
									<div class='team-1-logo'>
										<img src='https://img.bets4.pro/teams/cs_go/Recca_eSports.png?4604' class='team-logo-md'>
									</div>
									<span class='vs'>
										BO3
										<br>
										vs
									</span>

									<span class='team-2-name'>
										Midas Club Elite
										<br>
										78%
									</span>
									<div class='team-2-logo'>
										<img src='https://img.bets4.pro/teams/dota2/Midas_Club_Elite.png?4370' class='team-logo-md'>
									</div>

									
									
								</div>

								<div class='match-tourney-img-box clearfix'>
									<img src='http://www.gosugamers.net/uploads/images/tournaments/2017/june/15016-1498005108.jpeg' class='match-tourney-img'>
								</div>
							</div>
						<!-- </a> -->

					</div>
				</li>
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
							<img src='<?php echo e(asset($match->MatchHomeTeam->TeamSportsCategory->sportsCatIMG)); ?>' class='game-ico'>
							<span class='game-time'> 
								<?php echo e(Carbon\Carbon::parse($match->startTime)->diffForHumans()); ?>

							</span>

							<span id='timeleft<?php echo e($match->id); ?>'>
								<?php echo e(Carbon\Carbon::parse($match->startTime)->diffinSeconds(Carbon\Carbon::now())); ?>

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

				<span id="match_id"><?php echo e(count($matches)); ?></span>--

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
	</div> <!-- end of home matches left section -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('home-content-right'); ?>
	<div class='home-matches-right clearfix'>
		<div class='matches-header-box'>
			<h4 class='matches-header'> Recent results </h4>
		</div>

		<div class='side-match clearfix'>

			
			<div class='team-1-side'>
				<span class='team-1-name-side clearfix'>Golden State Warriors</span>
				<img src='http://dehayf5mhw1h7.cloudfront.net/wp-content/uploads/sites/27/2016/10/08023220/Golden-State-Warriors-Wallpaper2.jpg' class='team-1-logo-sm'>
				<i class="fa fa-check" aria-hidden="true"></i>
			</div>

			<span class='vs-side'>vs</span>

			<div class='team-2-side'>
				<span class='team-2-name-side clearfix'>Golden State Warriors</span>
				<img src='http://dehayf5mhw1h7.cloudfront.net/wp-content/uploads/sites/27/2016/10/08023220/Golden-State-Warriors-Wallpaper2.jpg' class='team-2-logo-sm'>
			</div>


		</div>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascripts'); ?>
	

<?php $__env->stopSection(); ?>		
	


<?php echo $__env->make('..layout/master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>