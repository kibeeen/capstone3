<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App;
use App\SportsCategory;
use App\GameSeries;
use App\MatchCategory;
use App\Team;
use App\League;
use App\Match;
use App\UserBet;
use App\User;
use Auth;
use Session;

class ActionsController extends Controller
{

	public function displayPagesTeam(){
		$scategories = SportsCategory::all();
		$teams = Team::all();

		return view('admin-pages/add-teams', compact('scategories','teams'));
	}

    public function displayPagesLeague(){
        $leagues = League::all();

        return view('admin-pages/add-leagues', compact('leagues'));
    }



    public function displayAddMatchesPage(){
        $game_series = GameSeries::all();
        $match_categories = MatchCategory::all();
        $sports_categories = SportsCategory::all();
        $teams = Team::all();
        $leagues = League::all();

        return view('admin-pages/add-matches', compact('game_series','match_categories','teams','leagues','sports_categories'));
    }

    public function displayUpdateMatchesPage(){
        $matches = Match::orderBy('inPlay','desc')->get();
        $game_series = GameSeries::all();
        $match_categories = MatchCategory::all();
        $teams = Team::all();
        $leagues = League::all();

        $teams_participated = Match::where('id',10)->get();

        return view('admin-pages/update-matches', compact('game_series','match_categories','teams','matches','leagues'));
    }


    public function addMatch(request $request){
        $match_tba = new Match();

        // find home team id and convert to teamname
            $find_team1 = Team::all()->where('id',$request->add_home_team);
            
            foreach($find_team1 as $team1){
                $hteam = $team1->teamName;
            }

        // find away team id and convert to teamname

            $find_team2 = Team::all()->where('id',$request->add_away_team);
            
            foreach($find_team2 as $team2){
                $ateam = $team2->teamName;
            }

            $match_tba->matchName = $ateam . " vs " . $hteam;





        $match_tba->startTime = $request->add_match_date . " " . 
                                $request->add_match_time;

        $match_tba->betsTotal = 0;
        $match_tba->betsHomeTotal = 0;
        $match_tba->betsAwayTotal = 0;

        $match_tba->homeTeamID = $request->add_home_team;
        $match_tba->homeTeamScore = 0;
        $match_tba->homeTeamWin = 0;
        $match_tba->homeTeamOdds = 0;
        $match_tba->homeTeamOddsPcnt = 0;

        $match_tba->draw = 0;

        $match_tba->awayTeamID = $request->add_away_team;
        $match_tba->awayTeamScore = 0;
        $match_tba->awayTeamWin = 0;
        $match_tba->awayTeamOdds = 0;
        $match_tba->awayTeamOddsPcnt = 0;

        $match_tba->inPlay = 0;
        $match_tba->finished = 0;

        $match_tba->gameSeriesID = $request->match_game_series;
        $match_tba->matchCategoryID = $request->match_game_category;
        $match_tba->leagueID = $request->match_league_id;
        $match_tba->sportsCatID = $request->addmatch_addsportscat;

        $match_tba->save();

        return redirect('/matches');
    }

    public function updateMatch(request $request){
        $match_tbu = Match::find($request->select_match_id);

        $match_tbu->homeTeamScore = $request->update_home_team_score;
        $match_tbu->awayTeamScore = $request->update_away_team_score;

        $match_tbu->save();

        return redirect('/update-matches');
    }

    public function endMatch(request $request){
        $match_id = $request->hidden_match_id1;
        $end_match = Match::find($match_id);

        $winner_team = $request->select_game_winner_id;

        
        if($end_match->awayTeamID == $winner_team){

            $find_bet = UserBet::where('matchID',$match_id)
            ->where('teamChosenID',$winner_team)
            ->get();

            $other_bet = UserBet::where('matchID',$match_id)
            ->where('teamChosenID','!=',$winner_team)
            ->get();


            $admin_coins = User::where('role','admin')->get();
            foreach($admin_coins as $admin_coin){
                $bank = $admin_coin->coins;
            }

            foreach($other_bet as $obet){

                // find the bettor
                $find_bettors = User::where('id',$obet->userID)->get();

                foreach($find_bettors as $fbettors){

                $fbettors->coinsInPlay -= $obet->coinsWagered;
                $coinsInPlay = $fbettors->coinsInPlay;

                }

                UserBet::where('matchID', $match_id)
                ->where('teamChosenID','!=',$winner_team)
                ->update(array(
                    'inPlay' => 0,
                    'betWon' => 0,
                    'betLose' => 1,
                    'betLocked' => 1
                    ));


                // $find_bettors->coins = $coins;
                $find_bettors->coinsInPlay = $coinsInPlay;

                User::where('id', $obet->userID)->update(array(
                    'coinsInPlay' => $coinsInPlay
                    ));
            }

            foreach($find_bet as $fbet){

                // find the bettor
                $find_bettors = User::where('id',$fbet->userID)->get();

                foreach($find_bettors as $fbettors){

                    // dd($fbet->coinsWagered * $end_match->awayTeamOdds);
                    $fbettors->coinsInPlay -= $fbet->coinsWagered;
                    $fbettors->coins += ($fbet->coinsWagered * $end_match->awayTeamOdds) + $fbet->coinsWagered;
                    

                    $coins = $fbettors->coins;
                    $coinsInPlay = $fbettors->coinsInPlay;
                   
                    // add 5.5% betting fee coins to the bank
                    $bank += ($end_match->betsHomeTotal * 0.055);

                }

                $end_match->awayTeamWin = 1;
                $end_match->draw = 0;
                $end_match->homeTeamWin = 0;
                $end_match->inPlay = 0;
                $end_match->finished = 1;
                $end_match->save();


                $find_bet->inPlay = 0;
                $find_bet->betWon = 1;
                $find_bet->betLose = 0;
                $find_bet->betLocked = 1;

                UserBet::where('matchID', $match_id)
                ->where('teamChosenID',$winner_team)
                ->update(array(
                    'inPlay' => 0,
                    'betWon' => 1,
                    'betLose' => 0,
                    'betLocked' => 1
                    ));


                $find_bettors->coins = $coins;
                $find_bettors->coinsInPlay = $coinsInPlay;

                User::where('id', $fbet->userID)->update(array(
                    'coins' => $coins,
                    'coinsInPlay' => $coinsInPlay
                    ));


                $admin_coins->coins = $bank;

                User::where('role', 'admin')->update(array(
                    'coins' => $bank
                    ));

            }

        } // end of if

        elseif($end_match->homeTeamID == $winner_team){

            $find_bet = UserBet::where('matchID',$match_id)
            ->where('teamChosenID',$winner_team)
            ->get();

            $other_bet = UserBet::where('matchID',$match_id)
            ->where('teamChosenID','!=',$winner_team)
            ->get();


            $admin_coins = User::where('role','admin')->get();
            foreach($admin_coins as $admin_coin){
                $bank = $admin_coin->coins;
            }

            foreach($other_bet as $obet){

                // find the bettor
                $find_bettors = User::where('id',$obet->userID)->get();

                foreach($find_bettors as $fbettors){

                $fbettors->coinsInPlay -= $obet->coinsWagered;
                $coinsInPlay = $fbettors->coinsInPlay;

                }

                UserBet::where('matchID', $match_id)
                ->where('teamChosenID','!=',$winner_team)
                ->update(array(
                    'inPlay' => 0,
                    'betWon' => 0,
                    'betLose' => 1,
                    'betLocked' => 1
                    ));


                // $find_bettors->coins = $coins;
                $find_bettors->coinsInPlay = $coinsInPlay;

                User::where('id', $obet->userID)->update(array(
                    'coinsInPlay' => $coinsInPlay
                    ));
            }

            foreach($find_bet as $fbet){

                // find the bettor
                $find_bettors = User::where('id',$fbet->userID)->get();

                foreach($find_bettors as $fbettors){

                    // dd($fbet->coinsWagered * $end_match->awayTeamOdds);
                    $fbettors->coinsInPlay -= $fbet->coinsWagered;
                    $fbettors->coins += ($fbet->coinsWagered * $end_match->homeTeamOdds) + $fbet->coinsWagered;
                    

                    $coins = $fbettors->coins;
                    $coinsInPlay = $fbettors->coinsInPlay;
                   
                    // add 5.5% betting fee coins to the bank
                    $bank += ($end_match->betsAwayTotal * 0.055);

                }

                $end_match->awayTeamWin = 0;
                $end_match->draw = 0;
                $end_match->homeTeamWin = 1;
                $end_match->inPlay = 0;
                $end_match->finished = 1;
                $end_match->save();


                $find_bet->inPlay = 0;
                $find_bet->betWon = 1;
                $find_bet->betLose = 0;
                $find_bet->betLocked = 1;

                UserBet::where('matchID', $match_id)
                ->where('teamChosenID',$winner_team)
                ->update(array(
                    'inPlay' => 0,
                    'betWon' => 1,
                    'betLose' => 0,
                    'betLocked' => 1
                    ));


                $find_bettors->coins = $coins;
                $find_bettors->coinsInPlay = $coinsInPlay;

                User::where('id', $fbet->userID)->update(array(
                    'coins' => $coins,
                    'coinsInPlay' => $coinsInPlay
                    ));


                $admin_coins->coins = $bank;

                User::where('role', 'admin')->update(array(
                    'coins' => $bank
                    ));

            }

        } // end of elseif
  
        return redirect('/update-matches');
    }

    public function startMatch($id){
        $start_match = Match::find($id);
        $start_match->inPlay = 1;
        $start_match->finished = 0;
        $start_match->save();

        $lock_bets = UserBet::where('matchID', $id)->get();
        // dd($lock_bets);
        foreach ($lock_bets as $bet) {
            $bet->betLocked = 1;
            $bet->save();
        }

        return redirect('/update-matches');
    }
    
    public function addTeam(request $request){
    	$team_tba = new Team();

    	$team_tba->teamName = $request->add_team_name;
    	$team_tba->teamABV = $request->add_team_abv;

    	// add sports category thumbnail
			$teamname = $request->add_team_name;
	        $image = $request->add_team_logo;
	        $filename = $teamname . "." . $image->getClientOriginalExtension();
	        $image->move('uploads/admin/team-logos/',$filename);

    	$team_tba->teamLogo = 'uploads/admin/team-logos/'. $filename;
    	$team_tba->sportsCategoryID = $request->add_team_sports_category;
    	$team_tba->save();

    	return redirect('/teams');
    }

    public function editTeam(request $request){
        $team_tbe = Team::find($request->edit_select_team_name);

        $team_tbe->teamName = $request->edit_team_name;
        $team_tbe->teamABV = $request->edit_team_abv;

        // add sports category thumbnail
            $teamname = $request->edit_team_name;
            $image = $request->edit_team_logo;
            $filename = $teamname . "." . $image->getClientOriginalExtension();
            $image->move('uploads/admin/team-logos/',$filename);

        $team_tbe->teamLogo = 'uploads/admin/team-logos/'. $filename;
        $team_tbe->sportsCategoryID = $request->edit_sports_category;
        $team_tbe->save();

        return redirect('/teams');
    }

    public function deleteTeam($id){
        $delete_team = Team::find($id);
        $delete_team->delete();

        return back();
    }

    public function addLeague(request $request){

        $new_league = new League();

        // add sports category thumbnail
            $leaguename = $request->add_league_name;
            $image = $request->add_league_banner;
            $filename = $leaguename . "." . $image->getClientOriginalExtension();
            $image->move('uploads/admin/league-banners/',$filename);


        // insert values to database
            $new_league->leagueBanner = 'uploads/admin/league-banners/'. $filename;
            $new_league->leagueName = $request->add_league_name;
            $new_league->leagueStartDate = $request->league_start_date;
            $new_league->leagueEndDate = $request->league_end_date;
            $new_league->save();

        // return back()->with('success','Image Upload successful');

        return redirect('/leagues');
    }    

    public function addMatchCategory(request $request){

    	$new_matchcat = new MatchCategory();

        // insert values to database
	        $new_matchcat->matchCatName = $request->add_match_cat;
	        $new_matchcat->save();

	    // return back()->with('success','Image Upload successful');

    	return redirect('/match-categories');
    }

    public function addSportsCategory(request $request){

        $new_scategory = new SportsCategory();

        // add sports category thumbnail
            $sportscatname = $request->add_sportscat_name;
            $image = $request->add_sportscat_logo;
            $filename = $sportscatname . "." . $image->getClientOriginalExtension();
            $image->move('uploads/admin/sports-category-thumbnails/',$filename);


        // insert values to database
            $new_scategory->sportsCatIMG = 'uploads/admin/sports-category-thumbnails/'. $filename;
            $new_scategory->sportsCatName = $request->add_sportscat_name;
            $new_scategory->save();

        // return back()->with('success','Image Upload successful');

        return redirect('/sports-categories');
    }    

    public function addGameSeries(request $request){

        $new_gseries = new GameSeries();

        // insert values to database
            $new_gseries->gameSeriesName = $request->add_game_series;
            $new_gseries->save();

        // return back()->with('success','Image Upload successful');

        return redirect('/game-series');
    }

    public function addBet (request $request){
        $bets_tba = new UserBet();

        $bets_tba->inPlay = 1;

        $bets_tba->teamChosenID = $request->selected_team;



        // check if user has sufficient coins to bet 
            $coins_input = $request->input_bet_coins;
            $coins_user = Auth::user()->coins;

            if ($coins_user < $coins_input) {
                Session::flash('insf_coins', "You do not have enough coins");
                return  back();

            } elseif ($coins_input <= 0) {
                Session::flash('no_coin_input', "Pls enter a value greater than 0");
                return  back();

            } else {

                // minus the coins to user and add it to coinsInPlay
                    $coins_tbd = App\User::find(Auth::user()->id);
                    $coins_tbd->coins = $coins_user - $coins_input;
                    $coins_tbd->coinsInPlay = $coins_input + $coins_tbd->coinsInPlay;
                    $coins_tbd->save();

                // adding coins to match's total bets
                    $coins_tbt = App\Match::find($request->tourney_match_id);

                    $coins_tbt->betsTotal = $coins_input + $coins_tbt->betsTotal; 


                // adding coins to match's total home/away bets
                    if($coins_tbt->homeTeamID == $request->selected_team){
                        $coins_tbt->betsHomeTotal = $coins_input + $coins_tbt->betsHomeTotal; 
                        $coins_tbt->save();
                    } else {
                        $coins_tbt->betsAwayTotal = $coins_input + $coins_tbt->betsAwayTotal;
                        $coins_tbt->save();
                    }

                    
                // computing for the team odds
                if($coins_tbt->betsHomeTotal!=0)
                    $coins_tbt->homeTeamOdds = (($coins_tbt->betsAwayTotal - ($coins_tbt->betsAwayTotal * 0.055)) / $coins_tbt->betsHomeTotal);

                if($coins_tbt->betsAwayTotal!=0)
                    $coins_tbt->awayTeamOdds = (($coins_tbt->betsHomeTotal - ($coins_tbt->betsHomeTotal * 0.055)) / $coins_tbt->betsAwayTotal);
                    
                    $coins_tbt->homeTeamOddsPcnt = ($coins_tbt->betsHomeTotal / $coins_tbt->betsTotal) * 100;
                    $coins_tbt->awayTeamOddsPcnt = ($coins_tbt->betsAwayTotal / $coins_tbt->betsTotal) * 100;

                    $coins_tbt->save();



                
                $bets_tba->coinsWagered = $request->input_bet_coins;
                $bets_tba->matchID = $request->tourney_match_id;
                $bets_tba->userID = Auth::user()->id;
                $bets_tba->betLocked = 0;
                $bets_tba->betCancelled = 0;
                
                $bets_tba->save();


                return back();

            }
    } // end function







}
