
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
		    	@if(\Request::is('tournaments/*'))
		    		<ul class='ul-placed-bets'>
		    		@foreach($user_bets as $ubets)
		    			<li class='li-placed-bets'>
		    			<img src="{{ asset($ubets->UserBetMatchID->MatchSportsCategory->sportsCatIMG) }}" class='team-logo-xs sidebar-gameico' title="1">
						<span class='place-bet-on'>
							{{ $ubets->Bettor->username }} placed
							<span class='gold-text-xs'>
							{{ $ubets->coinsWagered }} &nbsp;
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
								{{ $ubetsall-> coinsWagered }} &nbsp;
								</span>
								<span class="glyphicon glyphicon-coins glyph-coins"></span> 
								on 
									@foreach($all_matches as $all_match)
										@if($all_match->homeTeamID == $ubetsall->teamChosenID)
											<img src="{{ asset($all_match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs' title="{{$all_match->MatchHomeTeam->teamName}}">
											{{ $all_match->homeTeamOdds }}
										@elseif($all_match->awayTeamID == $ubetsall->teamChosenID)
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

	</div>