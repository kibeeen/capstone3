
<div class='home-matches-right clearfix'>

	<div class='recent-bets-sidebar clearfix'>

		<div class='matches-header-box'>
			<h4 class='matches-header'> Recent Bets </h4>
		</div>

		<div class='side-match clearfix'>
			<div class='team-1-side'>
		    	@if(\Request::is('tournaments/*'))
		    		<ul class='ul-placed-bets'>
		    		@foreach($user_bets as $ubets)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubets->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							{{ $ubets->Bettor->username }} placed
							<span class='gold-text-xs'>
							{{ $ubets->coinsWagered }}&nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubets->teamChosenID)
										<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchHomeTeam->teamName}}">
										{{ $match->homeTeamOdds }}
									@elseif($match->awayTeamID == $ubets->teamChosenID)
									<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchAwayTeam->teamName}}">
										{{ $match->awayTeamOdds }}
									@endif

								@endforeach

						</span>
						</li>
					@endforeach
					</ul>
		    	
		    	@elseif(\Request::is('/'))

		    		<ul class='ul-placed-bets'>
		    		@foreach($user_bets_all as $ubetsall)
		    			<li class='li-placed-bets'>
		    				<img src="{{ asset($ubetsall->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
							<span class='place-bet-on'>
								You've placed
								<span class='gold-text-xs'>
								{{ $ubetsall->coinsWagered }}&nbsp;
								</span>
								<span class="glyphicon glyphicon-coins glyph-coins"></span> 
								on 
									@foreach($all_matches as $all_match)
										@if($all_match->homeTeamID == $ubetsall->teamChosenID && $all_match->id == $ubetsall->matchID)
											<img src="{{ asset($all_match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$all_match->MatchHomeTeam->teamName}}">
											{{ $all_match->homeTeamOdds }}
										@elseif($all_match->awayTeamID == $ubetsall->teamChosenID && $all_match->id == $ubetsall->matchID)
											<img src="{{ asset($all_match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$all_match->MatchAwayTeam->teamName}}">
											{{ $all_match->awayTeamOdds }}
										@endif

									@endforeach

							</span>
						</li>
					@endforeach
					</ul>
		    	@endif
			</div>
		</div>

	</div> {{-- recent-bets-sidebar clearfix --}}

	<div class='won-bets-sidebar clearfix'>
		<div class='matches-header-box'>
			<h4 class='matches-header'> Bets Result </h4>
		</div>

		<div class='side-match clearfix'>
			<div class='team-1-side'>
		    	@if(\Request::is('tournaments/*'))
		    		<ul class='ul-placed-bets'>
		    		@foreach($user_bets_won as $ubetswon)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubetswon->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							{{ $ubetswon->Bettor->username }} <span class='green'>won</span>
							@if($ubetswon->UserBetMatchID->homeTeamID == $ubetswon->teamChosenID)
								{{ $odds = $ubetswon->UserBetMatchID->homeTeamOdds }}
							@elseif($ubetswon->UserBetMatchID->awayTeamID == $ubetswon->teamChosenID)
								{{ $odds = $ubetswon->UserBetMatchID->awayTeamOdds }}
							@endif
							<span class='gold-text-xs'>
							{{ $ubetswon->coinsWagered + ($ubetswon->coinsWagered * $odds) }}&nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubetswon->teamChosenID)
										<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchHomeTeam->teamName}}">
										{{ $match->homeTeamOdds }}
									@elseif($match->awayTeamID == $ubetswon->teamChosenID)
									<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchAwayTeam->teamName}}">
										{{ $match->awayTeamOdds }}
									@endif

								@endforeach

						</span>
						</li>
					@endforeach

					@foreach($user_bets_lose as $ubetslose)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubetslose->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							{{ $ubetslose->Bettor->username }} <span class='red'>lose</span>
							<span class='gold-text-xs'>
							{{ $ubetslose->coinsWagered }}&nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubetslose->teamChosenID)
										<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchHomeTeam->teamName}}">
										{{ $match->homeTeamOdds }}
									@elseif($match->awayTeamID == $ubetslose->teamChosenID)
									<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchAwayTeam->teamName}}">
										{{ $match->awayTeamOdds }}
									@endif

								@endforeach

						</span>
						</li>
					@endforeach
					</ul>
		    	
		    	@elseif(\Request::is('/'))

		    		<ul class='ul-placed-bets'>
		    		@foreach($user_bets_won as $ubetswon)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubetswon->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							You <span class='green'>won</span>
							@if($ubetswon->UserBetMatchID->homeTeamID == $ubetswon->teamChosenID)
								{{ $odds = $ubetswon->UserBetMatchID->homeTeamOdds }}
							@elseif($ubetswon->UserBetMatchID->awayTeamID == $ubetswon->teamChosenID)
								{{ $odds = $ubetswon->UserBetMatchID->awayTeamOdds }}
							@endif
							<span class='gold-text-xs'>
							{{ $ubetswon->coinsWagered + ($ubetswon->coinsWagered * $odds) }}&nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubetswon->teamChosenID)
										<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchHomeTeam->teamName}}">
										{{ $match->homeTeamOdds }}
									@elseif($match->awayTeamID == $ubetswon->teamChosenID)
									<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchAwayTeam->teamName}}">
										{{ $match->awayTeamOdds }}
									@endif

								@endforeach

						</span>
						</li>
					@endforeach

					@foreach($user_bets_lose as $ubetslose)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubetslose->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							You <span class='red'>lost</span>
							<span class='gold-text-xs'>
							{{ $ubetslose->coinsWagered }}&nbsp;
							</span>
							<span class="glyphicon glyphicon-coins-sm glyph-coins"></span> 
							on

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubetslose->teamChosenID)
										<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchAwayTeam->teamName}}">
										{{ $match->homeTeamOdds }}
									@elseif($match->awayTeamID == $ubetslose->teamChosenID)
									<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$match->MatchHomeTeam->teamName}}">
										{{ $match->awayTeamOdds }}
									@endif

								@endforeach

						</span>
						</li>
					@endforeach
		    	@endif
			</div>
		</div>
	</div>




























	</div>