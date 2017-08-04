<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    function LeagueToMatch(){
    	return $this->hasMany('App\League', 'leagueID', 'id');
    }

}
