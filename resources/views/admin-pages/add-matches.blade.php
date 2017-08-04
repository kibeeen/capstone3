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
						{{ csrf_field() }}



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
							  	@foreach($leagues as $league)
							    	<option value='{{ $league->id }}'>
								    	{{ $league->leagueName }}
							    	</option>
						    	@endforeach
							  	</select>
						    </div>
						</div>

						<div class="form-group">
						  	<label for="addmatch_addsportscat" class="control-label col-sm-2">Sports Category :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="addmatch_addsportscat" name='addmatch_addsportscat' required>
							  	@foreach($sports_categories as $scat)
							    	<option value='{{ $scat->id }}'>
								    	{{ $scat->sportsCatName }}
							    	</option>
						    	@endforeach
							  	</select>
						  	</div>
						</div>

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_home_team">Home Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="add_home_team" name='add_home_team' required>
							  	@foreach($teams as $team)
							    	<option value='{{ $team->id }}'>
								    	{{ $team->teamName }}
							    	</option>
						    	@endforeach
							  	</select>
						    </div>
						</div>

					{{-- 	<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_score">Home TeamScore :</label>
						    <div class="col-sm-2">
						      	<input type="text" class="form-control" id="add_home_team_score" name='add_home_team_score' value='0' disabled>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_odds">Home TeamOdds :</label>
						    <div class="col-sm-1">
						      	<input type="text" class="form-control" id="add_home_team_odds" name='add_home_team_odds' value='0' disabled>
						    </div>
						</div> --}}

						<hr>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_away_team">Away Team :</label>
						    <div class="col-sm-4">
						      	<select class="form-control" id="add_away_team" name='add_away_team' required>
							  	@foreach($teams as $team)
							    	<option value='{{ $team->id }}'>
								    	{{ $team->teamName }}
							    	</option>
						    	@endforeach
							  	</select>
						    </div>
						</div>

					{{-- 	<div class="form-group">
						    <label class="control-label col-sm-2" for="add_away_team_score">Away TeamScore :</label>
						    <div class="col-sm-2">
						      	<input type="text" class="form-control" id="add_away_team_score" name='add_away_team_score' value='0' disabled>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_odds">Away TeamOdds :</label>
						    <div class="col-sm-1">
						      	<input type="text" class="form-control" id="add_away_team_odds" name='add_away_team_odds' value='0' disabled>
						    </div>
						</div> --}}

						<hr>


						<div class="form-group">
						  	<label for="match_game_series" class="control-label col-sm-2">Game Series :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="match_game_series" name='match_game_series' required>
							  	@foreach($game_series as $gameseries)
							    	<option value='{{ $gameseries->id }}'>
								    	{{ $gameseries->gameSeriesName }}
							    	</option>
						    	@endforeach
							  	</select>
						  	</div>
						</div>

	

						<div class="form-group">
						  	<label for="match_game_category" class="control-label col-sm-2">Match Category :</label>
						  	<div class="col-sm-4">
							  	<select class="form-control" name='match_game_category' id="match_game_category" required>
							    	@foreach($match_categories as $match_category)
							    	<option value='{{ $match_category->id }}'>
								    	{{ $match_category->matchCatName }}
							    	</option>
						    	@endforeach
							  	</select>
						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Match</button>
						    </div>
					  	</div>
					</form>	
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}

	</div>


@endsection

