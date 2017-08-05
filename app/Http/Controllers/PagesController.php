<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\SportsCategory;
use App\GameSeries;
use App\MatchCategory;
use App\Team;
use App\League;
use App\Match;
use App\UserBet;
use Auth;


class PagesController extends Controller
{
    public function displayIndexPage(){
    	
    	$matches = Match::where('inPlay',0)->where('finished',0)->orderBy('startTime','asc')->get();
        $live_matches = Match::where('inPlay',1)->where('finished',0)->get();
    	$recent_matches = Match::where('finished',1)->get();

    	
    	$user_id = Auth::user()->id;
		$user_bets_all = UserBet::where('userID',$user_id)->limit(12)->orderBy('updated_at','desc')->get();
		$all_matches = Match::all();

		

		return view('pages/home', compact('matches','live_matches','user_bets_all','all_matches','recent_matches'));
    	

 	

        
	}

	public function displayTournamentPage($id){
    	$matches = Match::all()->where('id',$id);
    	$user_bets = UserBet::where('matchID',$id)->orderBy('updated_at','desc')->get();
    	
    	



        return view('pages/tournaments', compact('matches','user_bets'));
	}




}
