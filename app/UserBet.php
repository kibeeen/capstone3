<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBet extends Model
{
    public function Bettor(){
    	return $this->belongsTo('App\User','userID');

    }

    public function UserBetMatchID(){
        return $this->belongsTo('App\Match','matchID');
    }

    public function UserBetTeamChosenOdds(){
        return $this->belongsTo('App\Match');
    }

    public function TeamChosenName(){
    	return $this->belongsTo('App\Team', 'teamChosenID');
    }




}
