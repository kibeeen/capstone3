@extends('..layout/master-admin')


@section('title')
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
@endsection

@section('inline-css')

	body {
		{{-- background-image: none; --}}
		{{-- background-color: #fff; --}}
		background-attachment: fixed;
	} 

	.navbar-inverse {
		box-shadow: 0 0px 5px rgba(0,0,0,0);
	}

@endsection


@section('admin-home-content')

	<input type="hidden" id="token" value="{{csrf_token()}}">

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
						{{ csrf_field() }}

						<div class="form-group">
						    <label class="control-label col-sm-2" for="select_match_id">Match Name :</label>
						    <div class="col-sm-6">
						      	<select class="form-control" id="select_match_id" name='select_match_id' required>
						      	<option selected disabled>Select a match to edit / delete</option>
							  	@foreach($matches as $match)
							    		@if($match->inPlay == 1)
							    			<option value="{{ $match->id }}">
								    			Live - 
								    			{{ $match->matchName . " " . $match->id }}
							    			</option>
							    		@elseif($match->inPlay == 0)
							    			<option value="{{ $match->id }}">
								    			Upcoming - 
								    			{{ $match->matchName . " " . $match->id }}
							    			</option>
						    			@endif
							    	
						    	@endforeach
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
							  	@foreach($teams as $team)
							    	<option value='{{ $team->id }}'>
								    	{{ $team->teamName }}
							    	</option>
						    	@endforeach
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
							  	@foreach($teams as $team)
							    	<option value='{{ $team->id }}'>
								    	{{ $team->teamName }}
							    	</option>
						    	@endforeach
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
							  	@foreach($leagues as $league)
							    	<option value='{{ $league->id }}'>
								    	{{ $league->leagueName }}
							    	</option>
						    	@endforeach
							  	</select>
						    </div>
						</div>

						<div class="form-group">
						  	<label for="match_game_category" class="control-label col-sm-2">Match Category :</label>
						  	<div class="col-sm-4">
							  	<select class="form-control" name='match_game_category' id="match_game_category" required disabled>
							    	@foreach($match_categories as $match_category)
							    	<option value='{{ $match_category->id }}'>
								    	{{ $match_category->matchCatName }}
							    	</option>
						    	@endforeach
							  	</select>
						  	</div>
						</div>

						<div class="form-group">
						  	<label for="match_game_series" class="control-label col-sm-2">Game Series :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="match_game_series" name='match_game_series' required disabled>
							  	@foreach($game_series as $gameseries)
							    	<option value='{{ $gameseries->id }}'>
								    	{{ $gameseries->gameSeriesName }}
							    	</option>
						    	@endforeach
							  	</select>
						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Update Match</button>
						    </div>
					  	</div>
					</form>	
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}

	</div>


@endsection


@section('javascripts')

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
	    function(data, status){

    	    var match_info = JSON.parse(data);
	        $('#update_home_team').val(match_info.homeTeamID);
	        $('#update_away_team').val(match_info.awayTeamID);

	        $('#update_match_league_id').val(match_info.leagueID);

	        $('#update_home_team_score').val(match_info.homeTeamScore);
	        $('#update_away_team_score').val(match_info.awayTeamScore);

	        $('#update_home_team_odds').val(match_info.homeTeamOddsPcnt+"%");
	        $('#update_away_team_odds').val(match_info.awayTeamOddsPcnt+"%");
	        
	        $('#update_home_team_score').removeAttr('disabled');
	        $('#update_away_team_score').removeAttr('disabled');

	        $('#match_game_series').removeAttr('disabled');
	        $('#match_game_category').removeAttr('disabled');

	        $('#start_match').removeAttr('disabled');
	        $('#end_match').removeAttr('disabled');
	 	        
	    });

	});		

</script>

@endsection