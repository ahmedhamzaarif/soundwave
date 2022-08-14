@extends('layouts.applayout')

@section('content')
    <h2 class="text-center">Dashboard</h2>

	<div class="tab-content tab-content-basic">
		<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
		  <div class="row">
			<div id="tsongs_card" class="col-md-6">
				<div class="statistics-details d-flex align-items-center justify-content-around bg-tcard m-1 p-3">
					<div>
						<p class="statistics-title">Total Songs</p>
						<h3 class="rate-percentage">{{$songs_total}}</h3>
					</div>
					<div>
						<p class="statistics-title">Songs Rating</p>
						<h3 class="rate-percentage">{{$srating_total}}</h3>
					</div>
					<div>
						<p class="statistics-title">Songs Review</p>
						<h3 class="rate-percentage">{{$sreview_total}}</h3>
					</div>	
				</div>
			</div>
			<div id="tvideos_card" class="col-md-6">
				<div class="statistics-details d-flex align-items-center justify-content-around bg-tcard m-1 p-3">
					<div>
						<p class="statistics-title">Total Videos</p>
						<h3 class="rate-percentage">{{$videos_total}}</h3>
					</div>
					<div>
						<p class="statistics-title">Videos Ratings</p>
						<h3 class="rate-percentage">{{$vrating_total}}</h3>
					</div>
					<div>
						<p class="statistics-title">Videos Reviews</p>
						<h3 class="rate-percentage">{{$vreview_total}}</h3>	
					</div>	
				</div>
			</div>
		</div>

		  <div class="row mt-4">
			<div class="col-md-12">
			  <div class="statistics-details d-flex align-items-center justify-content-around">
				<div>
				  <p class="statistics-title">Genre</p>
				  <h3 class="rate-percentage">{{$genre_total}}</h3>
				</div>
				<div>
					<p class="statistics-title">Artist</p>
					<h3 class="rate-percentage">{{$artists_total}}</h3>
				</div>
				<div>
					<p class="statistics-title">Album</p>
					<h3 class="rate-percentage">{{$album_total}}</h3>
				</div>
				<div>
					<p class="statistics-title">Languages</p>
					<h3 class="rate-percentage">{{$language_total}}</h3>
				</div>
				<div>
					<p class="statistics-title">Users</p>
					<h3 class="rate-percentage">{{$user_total}}</h3>
				</div>
			  </div>
			</div>
		  </div> 
		</div>
	</div>

@endsection()