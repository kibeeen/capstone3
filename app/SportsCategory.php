<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportsCategory extends Model
{
    function SportsCatToTeam(){
    	return $this->hasMany('App\Team', 'sportsCategoryID', 'id');
    }


}
