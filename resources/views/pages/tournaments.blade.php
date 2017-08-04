@extends('..layout/master')


@section('title')
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
@endsection


		
@section('home-content-left')
	<div class='home-matches-left clearfix'>

	@foreach($matches as $match)

		<div id='tournament-matches' class='clearfix col-12-xs style' ">
			<div class='tournament-heading-overlay'>
				<div class='tourney-header-wrapper'>

					<h4 class='tourney-name'>The International 2017</h4>
					{{-- <h4 class='tourney-name'>{{ $matchMatchLeague()->leagueBanner }}</h4> --}}
					<h3 class='tourney-startdate'>Dota 2 - July 2, 2017</h3>
					<h3 class='tourney-seriesname'>BO5</h3>
				</div>



				<div class='tourney-teams clearfix'>

					<span class='team-1-name'>
						{{ $match->MatchHomeTeam->teamName }}
						<br>
						{{ $match->homeTeamOddsPcnt }}%
					</span>
					<div class='team-1-logo'>
						<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-md'>
					</div>

					<span class='vs-score'>
						{{ $match->homeTeamScore }}
						 <span class='colon' id='colon'> : </span>  
						{{ $match->awayTeamScore }}
						<br>
						<img src="../uploads/admin/vs.png" class='vs-ico'>
						<br>
						<span class='box-sm-live'>Live</span>
					</span>

					<span class='team-2-name'>
						{{ $match->MatchAwayTeam->teamName }}
						<br>
						{{ $match->awayTeamOddsPcnt  }}%
					</span>
					<div class='team-2-logo'>
						<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-md'>
					</div>

					
					
				</div>


								

			</div>
		</div> {{-- end of tournament matches id --}}


		<div class='tourney-header-box'>
		@foreach ($matches as $match)
			@if ($match->inPlay == 0)
				<h4 class='team-pick-header'>Place Bet</h4>
			
			@elseif ($match->inPlay == 1)
				<h4 class='team-pick-header'>Bets are locked</h4>
			@endif 
		@endforeach

			
		</div>

		<div id='place-bet-content' class='t-top-border clearfix'>

			<form method="post" action='{{ url("/tournaments/placebet/") }}' >
				{{ csrf_field() }}

				<div class="radio">
				  	<label><input type="radio" name="selected_team" value='{{ $match->MatchHomeTeam->id }}' required>
				  		{{ $match->MatchHomeTeam->teamName }}
			  		</label>
				</div>
				<div class="radio">
				  	<label><input type="radio" name="selected_team" value='{{ $match->MatchAwayTeam->id }}' required>
					  	{{ $match->MatchAwayTeam->teamName }}
				  	</label>
				</div>


				<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-coin"></i></span>
				    <input id="input_bet_coins" type="text" class="form-control input-bet-coins" name="input_bet_coins" placeholder="0" required>

				    <input type='hidden' name='tourney_match_id' value="{{ $match->id }}">

				    <input type='submit' class='btn btn-default' value='Place bet'>
				</div>


			</form>

			@if (Session::has('insf_coins'))
			   <div class="alert alert-info">{{ Session::get('insf_coins') }}</div>
			@endif

			@if (Session::has('no_coin_input'))
			   <div class="alert alert-info">{{ Session::get('no_coin_input') }}</div>
			@endif

		</div>

	@endforeach











{{-- 
		<!-- start of upcoming matches section -->
		<div id='upcoming-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-upcoming'> Upcoming Match</h4>
			</div>

			<!-- display teams -->
			<ul class='ul-matches clearfix'>
				@foreach($matches as $match)
					<li>
						<div class='game-id clearfix'>
							<div class='game-info'>
								<img src='{{ asset($match->MatchHomeTeam->TeamSportsCategory->sportsCatIMG) }}' class='game-ico'>
								<span class='game-time'> 
								{{ Carbon\Carbon::parse($match->startTime)->diffForHumans() }}</span>
								<span class='game-desc'>{{ $match->MatchLeague->leagueName }}</span>
							</div>

							<!-- <a href='#'> -->
								<div class='match clearfix'>
									<div class='match-teams clearfix'>
										<span class='team-1-name'>
											{{ $match->MatchHomeTeam->teamName }}
											<br>
											{{ $match->homeTeamOdds }}%
										</span>
										<div class='team-1-logo'>
											<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-md'>
										</div>
										<span class='vs'>
											{{ $match->GameSeries->gameSeriesName }}
											<br>
											<img src="../uploads/admin/vs.png" class='vs-ico'>
										</span>

										<span class='team-2-name'>
											{{ $match->MatchAwayTeam->teamName }}
											<br>
											{{ $match->awayTeamOdds }}%
										</span>
										<div class='team-2-logo'>
											<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-md'>
										</div>

										
										
									</div>

									<div class='match-tourney-img-box clearfix'>
										<img src="{{ asset($match->MatchLeague->leagueBanner) }}" class='match-tourney-img'>
									</div>
								</div>
							<!-- </a> -->

						</div>
					</li>
				@endforeach
			</ul>
		</div> <!-- end of upcoming matches section --> --}}


		

	</div> <!-- end of home matches left section -->
@endsection



@section('home-content-right')

	@include("pages\sidebar",['user_bets' => $user_bets], ['matches' => $matches])

@endsection
		
	

