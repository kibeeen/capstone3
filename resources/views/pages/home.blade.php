@extends('..layout/master')


@section('title')
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
@endsection


		
@section('home-content-left')

	<div class='home-matches-left clearfix'>
		<input type="hidden" id="token" value="{{csrf_token()}}">

		<!-- start of live matches section -->
		<div id='live-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-live'> Live Matches </h4>
			</div>

			<ul class='ul-matches clearfix'>

				@foreach($live_matches as $live_match)
					<li>
						<div class='game-id clearfix'>
							<div class='game-info'>
								<img src="{{ asset($live_match->MatchSportsCategory->sportsCatIMG) }}" class='game-ico'>
								<span class='game-time text-live'>
									{{ Carbon\Carbon::parse($live_match->startTime)->diffForHumans() }}
								</span>
								<span class='game-desc'>
									{{ $live_match->MatchLeague->leagueName }}
								</span>
							</div>

							<a href='tournaments/{{ $live_match->id }}'>
								<div class='match clearfix'>
									<div class='match-teams clearfix'>
										<span class='team-1-name'>
											{{ $live_match->MatchHomeTeam->teamName }}
											<br>
											{{ $live_match->homeTeamOddsPcnt }}%
										</span>
										<div class='team-1-logo'>
											<img src="{{ asset($live_match->MatchHomeTeam->teamLogo) }}" class='team-logo-md'>
										</div>
										<span class='vs'>
											{{ $live_match->GameSeries->gameSeriesName }}
											<br>
											<img src="../uploads/admin/vs.png" class='vs-ico'>
										</span>

										<span class='team-2-name'>
											{{ $live_match->MatchAwayTeam->teamName }}
											<br>
											{{ $live_match->awayTeamOddsPcnt }}%
										</span>
										<div class='team-2-logo'>
											<img src="{{ asset($live_match->MatchAwayTeam->teamLogo) }}" class='team-logo-md'>
										</div>

										
										
									</div>

									<div class='match-tourney-img-box clearfix'>
										<img src="{{ asset($live_match->MatchLeague->leagueBanner) }}" class='match-tourney-img'>
									</div>
								</div>
							</a>

						</div>
					</li>

				@endforeach

			</ul>
		</div> <!-- end of live matches section -->

		<!-- start of upcoming matches section -->
		<div id='upcoming-matches' class='clearfix'>
			<div class='matches-header-box'>
				<h4 class='matches-header box-upcoming'> Upcoming Matches</h4>
			</div>

			<ul class='ul-matches clearfix'>



			@foreach($matches as $match)
				<li>
					<div class='game-id clearfix'>
						<div class='game-info'>
							<img src='{{ asset($match->MatchSportsCategory->sportsCatIMG) }}' class='game-ico'>
							<span class='game-time'> 
								{{ Carbon\Carbon::parse($match->startTime)->diffForHumans() }}
							</span>

							<span id='timeleft{{$match->id}}'>
								<!-- {{ Carbon\Carbon::parse($match->startTime)->diffinSeconds(Carbon\Carbon::now()) }} -->
							</span>

							<span class='game-desc'>{{ $match->MatchLeague->leagueName }}</span>
						</div>

						<a href='tournaments/{{ $match->id }}'>
							<div class='match clearfix'>
								<div class='match-teams clearfix'>
									<span class='team-1-name'>
										{{ $match->MatchHomeTeam->teamName }}
										<br>
										{{ $match->homeTeamOddsPcnt }}%
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
										{{ $match->awayTeamOddsPcnt }}%
									</span>

									<div class='team-2-logo'>
										<img src="{{ asset($match->MatchAwayTeam->teamLogo) }}" class='team-logo-md'>
									</div>

									
									
								</div>

								<div class='match-tourney-img-box clearfix'>
									<img src="{{ asset($match->MatchLeague->leagueBanner) }}" class='match-tourney-img'>
								</div>
							</div>
						</a>

					</div>
				</li>

				{{-- <span id="match_id">{{ count($matches) }}</span> --}}

				<script type="text/javascript">
					
				</script>

			@endforeach

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
				
				@foreach($recent_matches as $recent_match)
					<li>
						<div class='game-id-recent clearfix'>
							<div class='game-info'>
								<img src='{{ asset($recent_match->MatchSportsCategory->sportsCatIMG) }}' class='game-ico'>
								<span class='game-time text-recent'>
									{{ Carbon\Carbon::parse($recent_match->startTime)->diffForHumans() }}
								</span>
								<span class='game-desc'>
									{{ $recent_match->MatchLeague->leagueName }}
								</span>
							</div>

							<a href='tournaments/{{ $recent_match->id }}'>
								<div class='match clearfix'>
									<div class='match-teams clearfix'>
										<span class='team-1-name'>
											{{ $recent_match->MatchHomeTeam->teamName }}
											<br>
											{{ $recent_match->homeTeamOddsPcnt }}%
										</span>
										<div class='team-1-logo'>
											@if($recent_match->homeTeamWin == 1)
											<img src="../uploads/admin/win.png" class='win-crown'>
											@else
											@endif
											<img src="{{ asset($recent_match->MatchHomeTeam->teamLogo) }}" class='team-logo-md'>
										</div>
										<span class='vs-score-recent'>
											{{ $recent_match->homeTeamScore }}
											 <span class='colon' id='colon'> : </span>  
											{{ $recent_match->awayTeamScore }}
											<br>
											<img src="../uploads/admin/vs.png" class='vs-ico-recent'>
										</span>

										<span class='team-2-name'>
											{{ $recent_match->MatchAwayTeam->teamName }}
											<br>
											{{ $recent_match->awayTeamOddsPcnt }}%
										</span>
										<div class='team-2-logo'>
											@if($recent_match->awayTeamWin == 1)
												<img src="../uploads/admin/win.png" class='win-crown'>
											@else
											@endif
											<img src="{{ asset($recent_match->MatchAwayTeam->teamLogo) }}" class='team-logo-md'>
										</div>

										
										
									</div>

									<div class='match-tourney-img-box clearfix'>
										<img src="{{ asset($recent_match->MatchLeague->leagueBanner) }}" class='match-tourney-img'>
									</div>
								</div>
							</a>

						</div>
					</li>

				@endforeach

			</ul>
		</div> <!-- end of recent matches section -->
	</div> <!-- end of home matches left section -->
@endsection



@section('home-content-right')
	@include("pages\sidebar", ['user_bets_won' => $user_bets_won])
	{{-- @include("pages\sidebar", ['user_bets_all' => $user_bets_all], ['all_matches' => $all_matches], ['user_bets_won' => $user_bets_won]) --}}
@endsection

@section('javascripts')
	

@endsection		
	

