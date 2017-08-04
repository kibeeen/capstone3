<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function AwayTeamToMatch(){

    	return $this-hasMany('App\Match', 'awayTeamID', 'id');

    }

    public function TeamSportsCategory(){

    	return $this->belongsTo('App\SportsCategory','sportsCategoryID');

    }

}
