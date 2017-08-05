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

	<input type="hidden" id="token" value="<?php echo e(csrf_token()); ?>">

	<div class='admin-main-content'>

		<div id='update-matches'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-hourglass-end"></i>&nbsp; Update Matches
					</h3>
				</div>

				

				<div class="panel-body">

					<form class="form-horizontal" action='/matches/update/' method="post">
						<?php echo e(csrf_field()); ?>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="select_match_id">Match Name :</label>
						    <div class="col-sm-6">
						      	<select class="form-control" id="select_match_id" name='select_match_id' required>
						      	<option selected disabled>Select a match to edit / delete</option>
							  	<?php $__currentLoopData = $matches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    		<?php if($match->inPlay == 1): ?>
							    			<option value="<?php echo e($match->id); ?>">
								    			Live - 
								    			<?php echo e($match->matchName . " " . $match->id); ?>

							    			</option>
							    		<?php elseif($match->inPlay == 0): ?>
							    			<option value="<?php echo e($match->id); ?>">
								    			Upcoming - 
								    			<?php echo e($match->matchName . " " . $match->id); ?>

							    			</option>
						    			<?php endif; ?>
							    	
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>


						    </div>

						    <div class="col-sm-2" id='start-match-div'>
								
						    </div>
						</div>

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_home_team">Home Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="update_home_team" name='update_home_team' required disabled>
							  	<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($team->id); ?>'>
								    	<?php echo e($team->teamName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>


						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_home_team_score">Home TeamScore : </label>
						    <div class="col-sm-2 input-11">
						      	<input type="text" class="form-control center-me" id="update_home_team_score" name='update_home_team_score' disabled>
							    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_team_odds">Home TeamOdds :</label>
						    <div class="col-sm-2 input-11">
						      	<input type="text" class="form-control center-me" id="update_home_team_odds" name='update_home_team_odds' readonly>
						    </div>
						</div>

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_away_team">Away Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="update_away_team" name='update_away_team' required disabled>
							  	<?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($team->id); ?>'>
								    	<?php echo e($team->teamName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_away_team_score">Away TeamScore :</label>
						    <div class="col-sm-2 input-11">
						      	<input type="text" class="form-control center-me" id="update_away_team_score" name='update_away_team_score' value='0' disabled>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_team_odds">Away TeamOdds :</label>
						    <div class="col-sm-2 input-11">
						      	<input type="text" class="form-control center-me" id="update_away_team_odds" name='update_away_team_odds' value='0' readonly>
						    </div>
						</div>

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="update_match_league_id">League :</label>
						    <div class="col-sm-6">
						      	<select class="form-control" id="update_match_league_id" name='update_match_league_id' required disabled>
							  	<?php $__currentLoopData = $leagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $league): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($league->id); ?>'>
								    	<?php echo e($league->leagueName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						    </div>
						</div>

						<div class="form-group">
						  	<label for="match_game_category" class="control-label col-sm-2">Match Category :</label>
						  	<div class="col-sm-4">
							  	<select class="form-control" name='match_game_category' id="match_game_category" required disabled>
							    	<?php $__currentLoopData = $match_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($match_category->id); ?>'>
								    	<?php echo e($match_category->matchCatName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						  	</div>
						</div>

						<div class="form-group">
						  	<label for="match_game_series" class="control-label col-sm-2">Game Series :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="match_game_series" name='match_game_series' required disabled>
							  	<?php $__currentLoopData = $game_series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gameseries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							    	<option value='<?php echo e($gameseries->id); ?>'>
								    	<?php echo e($gameseries->gameSeriesName); ?>

							    	</option>
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							  	</select>
						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Update Match</button>
						    </div>
					  	</div>
					</form>	
				</div> 
			</div> 
				

		    <div class="panel panel-primary margin-bot-0">
			  	<div class="panel-heading end-match-panel">End Match</div>
			 	<div class="panel-body">
			 	<form class="form-horizontal" action='/matches/end/' method="post">
						<?php echo e(csrf_field()); ?>


			 		<div class="form-group">
					  	<label for="select_game_winner_id" class="control-label col-sm-2">Game Winner :</label>
					  	<div class="col-sm-4">

					  		<input type='hidden' value='' id="hidden_match_id1" name='hidden_match_id1'>
					  		<input type='hidden' value='' id="hidden_otherteam" name='hidden_otherteam'>
					  
						  	<select class="form-control" id="select_game_winner_id" name='select_game_winner_id' disabled>
						  	
						    	<option  id="option_game_winner1" name='option_game_winner1' value=''></option>
						    	<option  id="option_game_winner2" name='option_game_winner2' value='0'>Draw</option>
						    	<option  id="option_game_winner3" name='option_game_winner3' value=''></option>


					    	
						  	</select>
					  	</div>
					</div>

					<div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-2">
						    <button type="submit" class="btn btn-primary">
						    	<i class="fa fa-trophy" aria-hidden="true"></i>
						    	&nbsp; Declare Winner!
					    	</button>
					    </div>
				  	</div>
			  	</form>
		 		</div>
			</div>

					    
		</div> 

	</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascripts'); ?>

<script type="text/javascript">

	token = $('#token').val();

	$('#select_match_id').change(function(){

		var selected_team = $('#select_match_id').val();

		$('#start-match-div').html("<a href='/matches/start/" + selected_team + "'><button type='button' class='form-control center-me btn btn-primary' id='start_match' name='start_match' disabled><i class='fa fa-play-circle'></i>&nbsp; Start Match</button></a>");


		$.post("/api/displayMatchInfo/",

	    {
	    	_token : token,
	        match_id: $('#select_match_id').val(),


	    },
	    function(data){

    	    var match_info = JSON.parse(data);

	        $('#update_home_team').val(match_info.homeTeamID);
	        $('#update_away_team').val(match_info.awayTeamID);

	        $('#update_match_league_id').val(match_info.leagueID);

	        $('#update_home_team_score').val(match_info.homeTeamScore);
	        $('#update_away_team_score').val(match_info.awayTeamScore);


	        $('#option_game_winner1').val(match_info.homeTeamID);
	        $('#option_game_winner1').html(match_info.homeTeamID);


	        $('#option_game_winner3').val(match_info.awayTeamID);

	        $('#option_game_winner3').html(match_info.awayTeamID);
	        // $('#endmatch_href').attr('href',"/matches/end/"+match_info.id);

	        $('#hidden_match_id1').val($('#select_match_id').val());
	        // $('#hidden_otherteam').val($('#select_match_id').val());

	        $('#update_home_team_odds').val(match_info.homeTeamOddsPcnt+"%");
	        $('#update_away_team_odds').val(match_info.awayTeamOddsPcnt+"%");
	        
	        $('#update_home_team_score').removeAttr('disabled');
	        $('#update_away_team_score').removeAttr('disabled');

	        $('#match_game_series').removeAttr('disabled');
	        $('#match_game_category').removeAttr('disabled');

	        $('#start_match').removeAttr('disabled');
	        $('#end_match').removeAttr('disabled');

	        $('#select_game_winner_id').removeAttr('disabled');
 	        
	    });

	});		

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('..layout/master-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>