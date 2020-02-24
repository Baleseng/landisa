@extends('layouts.admin.profile')

@section('title', 'Writer  | ' . $writers->name )

@section('styles')
  @include('include.admin.profile_styles')
@endsection

@section('searchfield')
  @include('include.admin.user.header_search_news')
@endsection

@section('content')

	<div class="admin-profile-container">
		<div class="admin-profile-row row">
			<div class="admin-profile-col-1">
				
				<div class="admin-profile-img">
					<img class="fa fa-user" src="https://writer.triwink.app/images/avator/{{ $writers->avator }}" >
				</div>

				<div class="admin-profile-info">
					<div class="admin-profile-title">
						<div class="admin-profile-border"></div>
						<div class="admin-profile-h5">Basic Info</div>
					</div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>Gender</b> <span> : Male</span></div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>Birthday</b> <span>: 10 April 1981</span></div>
				</div>	

				<div class="admin-profile-info">
					<div class="admin-profile-title">
						<div class="admin-profile-border"></div>
						<div class="admin-profile-h5">Enjoys writing about</div>
					</div>
					<div class="admin-profile-li"><h6>Travelling</h6></div>
					<div class="admin-profile-li"><h6>Motoring</h6></div>
					<div class="admin-profile-li"><h6>Entertainment</h6></div>
				</div>

			</div>
			<div class="admin-profile-col-2">
				
				<div class="admin-profile-name">
					
					<h1>{{$writers->name}} {{$writers->surname}}</h1>
					<h6>Writter / Developer / Designer</h6>
					
					<div class="admin-profile-title">
						<div class="admin-profile-border"></div>
						<div class="admin-profile-h5">Ranking as Writer</div>
					</div>

					<span class="ranking-number">8.5</span>
					<div class="admin-profile-raking">
						<i class="ranked fa fa-star"></i>
						<i class="ranked fa fa-star"></i>
						<i class="ranked fa fa-star"></i>
						<i class="ranked fa fa-star-half-alt"></i>
						<i class="unranked fa fa-star"></i>
					</div>

				</div>

				<div class="admin-profile-info">
					<div class="admin-profile-title">
						<div class="admin-profile-border"></div>
						<div class="admin-profile-h5">Contact Info</div>
					</div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>Email</b> <span>: {{ $writers->email }}</span></div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>Phone</b> <span>: 079 015 3066</span></div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>From</b> <span>: Soweto Gauteng South Africa</span></div>
					<div class="admin-profile-li"><i class="fa fa-"></i> <b>Lives</b> <span>: Cape Towm Western Cape South Africa</span></div>
				</div>
			</div>

			<div class="admin-profile-col-2">
				<div id="container" style="min-width: 310px; max-width: 420px; height: 400px; margin: 0 auto" ></div>
			</div>

		</div>
	</div>
                
	@section('scripts')
		@include('include.admin.profile_scripts_writer_gauge')
  	@include('include.admin.profile_scripts')
	@endsection

@endsection