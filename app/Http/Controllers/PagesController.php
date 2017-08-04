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
    	
    	$matches = Match::where('inPlay',0)->get();
    	$live_matches = Match::where('inPlay',1)->get();

    	if(Auth::user()){
    		$user_id = Auth::user()->id;
    		$user_bets_all = UserBet::where('userID',$user_id)->get();
    		$all_matches = Match::all();
    		return view('pages/home', compact('matches','live_matches','user_bets_all','all_matches'));
    	} else {

    	}
    	
	    	$all_matches = Match::all();
    		return view('pages/home', compact('matches','live_matches','user_bets_all','all_matches'));
    	

 	

        
	}

	public function displayTournamentPage($id){
    	$matches = Match::all()->where('id',$id);
    	$user_bets = UserBet::all()->where('matchID',$id);
    	
    	



        return view('pages/tournaments', compact('matches','user_bets'));
	}




}
