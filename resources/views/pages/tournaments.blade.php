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

					<h4 class='tourney-name'>{{ $match->MatchLeague->leagueName }}</h4>
					{{-- <h4 class='tourney-name'>{{ $matchMatchLeague()->leagueBanner }}</h4> --}}
					<h3 class='tourney-startdate'>{{ Carbon\Carbon::parse($match->startTime)->diffForHumans() }}</h3>
					<h3 class='tourney-seriesname'>{{ $match->GameSeries->gameSeriesName}}</h3>
				</div>



				<div class='tourney-teams clearfix'>

					<span class='team-1-name-lg'>
						{{ $match->MatchHomeTeam->teamName }}
						<br>
						{{ $match->homeTeamOddsPcnt }}%
					</span>
					<div class='team-1-logo-lg'>
						@if($match->homeTeamWin == 1)
								<img src="../uploads/admin/win.png" class='win-crown-lg'>
						@else
						@endif
						<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-lg'>
					</div>

					<span class='vs-score'>
						{{ $match->homeTeamScore }}
						 <span class='colon' id='colon'> : </span>  
						{{ $match->awayTeamScore }}
						<br>
						<img src="../uploads/admin/vs.png" class='vs-ico'>
						<br>

						@if ($match->inPlay == 0 && $match->finished == 0)
							<span class='box-sm-upcoming'>
								Upcoming
							</span>
						@elseif ($match->inPlay == 1 && $match->finished == 0)
							<span class='box-sm-live'>Live</span>
						@elseif ($match->inPlay == 0 && $match->finished == 1)
							<span class='box-sm-ended'>Ended</span>
						@endif

					</span>

					<span class='team-2-name-lg'>
						{{ $match->MatchAwayTeam->teamName }}
						<br>
						{{ $match->awayTeamOddsPcnt  }}%
					</span>
					<div class='team-2-logo-lg'>
						@if($match->awayTeamWin == 1)
						<img src="../uploads/admin/win.png" class='win-crown-lg'>
						@else
						@endif
						<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-lg'>
					</div>

					
					
				</div>


								

			</div>
		</div> {{-- end of tournament matches id --}}


		<div class='tourney-header-box'>
		@foreach ($matches as $match)
			@if ($match->inPlay == 0 && $match->finished == 0)
				<h4 class='team-pick-header'>Place Bet</h4>
			
			@elseif ($match->inPlay == 1 && $match->finished == 0)
				<h4 class='team-pick-header'>Bets are locked &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></h4>
			@elseif ($match->finished == 1 && $match->inPlay == 0)
				<h4 class='team-pick-header'>This match has already ended &nbsp;<i class="fa fa-lock" aria-hidden="true"></i></h4>
			@endif 
		@endforeach

			
		</div>

		<div id='place-bet-content' class='t-top-border clearfix'>

		@foreach ($matches as $match)
			@if ($match->inPlay == 0 && $match->finished == 0)
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
			@elseif ($match->inPlay == 1 && $match->finished == 0)
				{{-- hide betting options --}}
			@elseif($match->inPlay == 0 && $match->finished == 1)
				{{-- hide betting options --}}
			@endif
		@endforeach

		</div>

	@endforeach

	</div> <!-- end of home matches left section -->
@endsection



@section('home-content-right')

	@include("pages\sidebar", ['user_bets' => $user_bets])

	{{-- @include("pages\sidebar", ['matches' => $matches], ['user_bets_won' => $user_bets_won]) --}}
	


@endsection
		
	

