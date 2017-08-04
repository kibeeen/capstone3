<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function MatchHomeTeam(){
        return $this->belongsTo('App\Team','homeTeamID');
    }

    public function MatchAwayTeam(){
    	return $this->belongsTo('App\Team','awayTeamID');
    }

    public function GameSeries(){
        return $this->belongsTo('App\GameSeries','gameSeriesID');
    }

    public function MatchLeague(){
        return $this->belongsTo('App\League','leagueID');
    }

    public function MatchSportsCategory(){
        return $this->belongsTo('App\SportsCategory','sportsCatID');
    }


}
