
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


		    	@if(\Request::is('tournaments/*'))
		    		
		    		@foreach($user_bets as $ubets)
						<span class='place-bet-on'>
							You've placed
							<span class='gold-text'>
							{{ $ubets-> coinsWagered }} 
							</span>
							<span class="glyphicon glyphicon-coins glyph-coins"></span> 
							on &nbsp;

								@foreach($matches as $match)

									@if($match->homeTeamID == $ubets->teamChosenID)
										<img src="{{ asset($match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs'>
										{{ $match->homeTeamOddsPcnt }}%
									@elseif($match->awayTeamID == $ubets->teamChosenID)
									<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs'>
										{{ $match->awayTeamOddsPcnt }}%
									@endif

								@endforeach

						</span>
					@endforeach
		    	
		    	@elseif(\Request::is('/'))

		    		@foreach($user_bets_all as $ubetsall)
						<span class='place-bet-on'>
							You've placed
							<span class='gold-text'>
							{{ $ubetsall-> coinsWagered }} 
							</span>
							<span class="glyphicon glyphicon-coins glyph-coins"></span> 
							on 
								@foreach($all_matches as $all_match)
									@if($all_match->homeTeamID == $ubetsall->teamChosenID)
										<img src="{{ asset($all_match->MatchHomeTeam->teamLogo) }}" class='team-logo-xs'> 
										({{ $all_match->homeTeamOddsPcnt }}%)
									@elseif($all_match->awayTeamID == $ubetsall->teamChosenID)
										<img src="{{ asset($all_match->MatchAwayTeam->teamLogo) }}" class='team-logo-xs'> 
										({{ $all_match->awayTeamOddsPcnt }}%)
									@endif

								@endforeach

						</span>
					@endforeach

		    	@endif

				
			</div>


		</div>

	</div>