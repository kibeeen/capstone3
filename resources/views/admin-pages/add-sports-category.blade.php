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

		<div id='add-sports-category'>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class='admin-panel-header'>
						<i class="fa fa-plus"></i>&nbsp; Add Sports Category
					</h3>
				</div>

				<div class="panel-body">
					<form class="form-horizontal" method="post" action='{{ url("/sports-categories/add/") }}' enctype="multipart/form-data">
					{{ csrf_field() }}
						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_sportscat_name">Add Category Name :</label>
						    <div class="col-sm-4">
						      	<input type="text" class="form-control" id="add_sportscat_name" name='add_sportscat_name' placeholder='Add sports category name' required>
						    </div>
						</div>

						<div class="form-group">
						    <label class="control-label col-sm-2" for="add_sportscat_logo">Add Category Thumb :</label>
						    <div class="col-sm-4">
						      	<input type="file" class="form-control-file" id="add_sportscat_logo" name='add_sportscat_logo' accept='image/*'>
						    </div>
						</div>


					  	<div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-2">
							    <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i>&nbsp; Add Sports Category</button>
						    </div>
					  	</div>
					</form>	
				</div> {{-- end of panel body --}}
			</div> {{-- end of panel --}}
		</div> {{-- end of add teams section --}}

	</div> {{-- end of admin-main-content --}}

@endsection

