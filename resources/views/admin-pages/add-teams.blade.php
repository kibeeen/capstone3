@extends('..layout/master-admin')


@section('title')
	AyosD2Bets | Best Cash Sportsbook, Dota2, CSGO, NBA and etc.
@endsection

@section('inline-css')

	body {
		{{-- background-image: none; --}}
		{{-- background-color: #fff; --}}
		background-attachment: fixed;
	} 

	.navbar-inverse {
		box-shadow: 0 0px 5px rgba(0,0,0,0);
	}

@endsection


@section('admin-home-content')

	<div class='admin-main-content'>

		<div id='add-teams'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Teams
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action='/teams/add/' enctype="multipart/form-data">
					{{ csrf_field() }}
						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_name">Full Team Name :</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="add_team_name" name='add_team_name' placeholder='Add team name' required>
						    </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_abv">Short Team Name :</label>
						    <div class="col-sm-2">
						      	<input type="text" class="form-control" id="add_team_abv" name='add_team_abv' placeholder='Short name' required>
						    </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_team_logo">Team Logo :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="add_team_logo" name='add_team_logo' accept='image/*' required>
						    </div>
						</div>

						<div class="form-group">
						  	<label for="add_team_sports_category" class="control-label col-sm-2">Sports Category :</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" id="add_team_sports_category" name='add_team_sports_category' required>
							    	@foreach($scategories as $scategory)  	
							    	<option value="{{ $scategory->id }}">
							    		{{ $scategory->sportsCatName }}
						    		</option>
								  	@endforeach
							  	</select>
						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Team</button>
						    </div>
					  	</div>
					</form>	
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}





		<div id='edit-teams'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-pencil-square-o"></i>&nbsp; Edit Teams
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action='/teams/edit/' enctype="multipart/form-data">

					{{ csrf_field() }}

						<div class="form-group">
						  	<label for="edit_select_team_name" class="control-label col-sm-2">Select Team :</label>
						  	<div class="col-sm-4">
							  	<select class="form-control" id="edit_select_team_name" name='edit_select_team_name' required>
							  		<option selected disabled>Select a team to edit / delete</option>
							    	@foreach($teams as $team)  	
							    	<option value="{{ $team->id }}">
							    		{{ $team->TeamSportsCategory->sportsCatName . ' - ' . $team->teamName }}
						    		</option>
								  	@endforeach
							  	</select>
							  	<input type="hidden" id="token" value="{{csrf_token()}}">
						  	</div>
						</div>


						<div class="form-group">
						    <label class="control-label col-sm-2" for="edit_team_name">New Team Name :</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="edit_team_name" name='edit_team_name' placeholder='Edit team name' required disabled>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="edit_team_abv">Short Team Name :</label>
						    <div class="col-sm-2">
						      	<input type="text" class="form-control" id="edit_team_abv" name='edit_team_abv' placeholder='Short name' required disabled>
						    </div>
						</div>
						<div class="form-group">
						    <label class="control-label col-sm-2" for="edit_team_logo">Team Logo :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="edit_team_logo" name='edit_team_logo' accept='image/*' disabled required>
						    </div>
						</div>

						<div class="form-group">
						  	<label for="edit_sports_category" class="control-label col-sm-2">Sports Category :</label>
						  	<div class="col-sm-3">


					  		<select class="form-control" id="edit_sports_category" name='edit_sports_category' required disabled>
						  		<option selected disabled>Edit category</option>
							  	@foreach($scategories as $scategory)  	
							    	<option value='{{ $scategory->id }}'>{{ $scategory->sportsCatName }}</option>
							  	@endforeach
						  	</select>

						  	</div>
						</div>

					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-5">
							    <button type="submit" class="btn btn-primary" id='update_team' disabled>
								    <i class="fa fa-floppy-o"></i>&nbsp; Update Team
							    </button>&nbsp;
							    
							    <a href=' {{ url("/teams/delete/") }}' id='delete_team_ahref'>
								    <button type='button' class="btn btn-danger" id='delete_team' disabled>
								    	<i class="fa fa-trash-o"></i>&nbsp; Delete Team
								    </button>
							    </a>

						    </div>
					  	</div>
					</form>	
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}









		<div id='teams-list'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						Teams List
					</h3>
				</div>

				<div class="panel-body">

					<table class="table table-hover">
					    <tbody>
					      	<tr>
					        	<td>Liquid</td>
					        	<td>Doe</td>
					        	<td>john@example.com</td>
					     	</tr>
					      	<tr>
						        <td>OG Gaming</td>
						        <td>Moe</td>
						        <td>mary@example.com</td>
					      	</tr>
					      	<tr>
						        <td>TNC Pro Gaming</td>
						        <td>Dooley</td>
						        <td>july@example.com</td>
					      	</tr>
					    </tbody>
					</table>				
					
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}


	</div> {{-- end of admin-main-content --}}


@endsection





@section('javascripts')

<script type="text/javascript">

	token = $('#token').val();

	$('#edit_select_team_name').change(function(){


		$.post("/api/displayTeam/",

	    {
	    	_token : token,
	        team_name: $('#edit_select_team_name').val(),

	    },
	    function(data, status){

    	    var team_info = JSON.parse(data);
	        $('#edit_team_name').val(team_info.teamName);
	        $('#edit_team_abv').val(team_info.teamABV);
	        $('#edit_sports_category').val(team_info.sportsCategoryID);
	        
	        $('#edit_team_name').removeAttr('disabled');
	        $('#edit_team_abv').removeAttr('disabled');
	        $('#edit_team_logo').removeAttr('disabled');
	        $('#edit_sports_category').removeAttr('disabled');
	        $('#update_team').removeAttr('disabled');
	        $('#delete_team').removeAttr('disabled');


	        $('#delete_team_ahref').attr('href','/teams/delete/'+team_info.id);


	        
	    });



	});



</script>

@endsection

