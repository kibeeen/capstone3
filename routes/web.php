<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\SportsCategory;
use App\GameSeries;
use App\MatchCategory;
use App\Team;
use App\League;
use App\Match;



// --- PagesController --- //



// display tournament page
	Route::get('/tournaments/{id}', 'PagesController@displayTournamentPage');

// display update matches page
	Route::get('/update-matches/', 'ActionsController@displayUpdateMatchesPage');

// --- ActionsController --- //

// add matches page
	Route::get('/matches','ActionsController@displayAddMatchesPage');
	Route::post('/matches/add/', 'ActionsController@addMatch');
	Route::post('/matches/update/', 'ActionsController@updateMatch');
	Route::get('/matches/start/{id}', 'ActionsController@startMatch');

// add teams page
	Route::get('/teams', 'ActionsController@displayPagesTeam');
	Route::post('/teams/add/', 'ActionsController@addTeam');
	Route::post('/teams/edit/', 'ActionsController@editTeam');
	Route::get('/teams/delete/{id}', 'ActionsController@deleteTeam');

// add league page
	Route::get('/leagues', 'ActionsController@displayPagesLeague');
	Route::post('/leagues/add/','ActionsController@addLeague');

// ---

// add match category page
	Route::get('/match-categories', function () {
	    return view('admin-pages/add-match-categories'); });
	Route::post('/match-categories/add/','ActionsController@addMatchCategory');

// add sports category page
	Route::get('/sports-categories', function () {
	    return view('admin-pages/add-sports-category'); });
	Route::post('/sports-categories/add/','ActionsController@addSportsCategory');

// add game series page
	Route::get('/game-series', function () {
	    return view('admin-pages/add-game-series'); });
	Route::post('/game-series/add/','ActionsController@addGameSeries');	

// ---

// place bet
	Route::post('/tournaments/placebet/','ActionsController@addBet');	


// middleware

	Route::group(['middleware' => 'auth'], function(){

		// display index page
			Route::get('/', 'PagesController@displayIndexPage');

	});

	Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
		
		// routes na pang admin

	});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// [ajax] displayTeamOnEditPage
	
	Route::post('/api/displayTeam/', function(Request $request){

		// alert('$request->team_name');

		
		$get_teamID = $request->team_name;


		$teamName = Team::find($get_teamID);


		// dd($teamName);

		// json_encode($teamName);

		echo json_encode($teamName);
	});

// [ajax] displayMatchInfoOnUpdatePage
	
	Route::post('/api/displayMatchInfo/', function(Request $request){
		
		$get_matchID = $request->match_name;

		$matchName = Match::find($request->match_id);

		echo json_encode($matchName);
	});

// [ajax] lock bets and match if time is 5 mins from now
	
	Route::post('/lockMatches', function(Request $request){
		
		
	});
	