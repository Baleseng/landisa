@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title', 'Writer | ' . $media->title )

@section('style')
  @include('include.admin.add_edit_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<section class="uploadbtn">
		<div class="admin-card-wrapper">
		
			<div class="admin-card">
				<a href="{{ url('') }}">
					<i class="fa fa-file-video"></i><b>Video</b>
				</a>
			</div>

			<div class="admin-card">
				<a href="{{ url('') }}">
					<i class="fa fa-file-image"></i><b>Gallry</b>
				</a>
			</div>

			<div class="admin-card">
				<a href="{{ url('') }}">
					<i class="fa fa-file-audio"></i><b>Audio</b>
				</a>
			</div>

			<div class="admin-card">
				<a href="{{ url('') }}">
					<i class="fa fa-youtube"></i><b>Embed</b>
				</a>
			</div>

			<div class="admin-card">
				<a href="{{ url('') }}">
					<i class="fa fa-youtube"></i><b>VR/360</b>
				</a>
			</div>

		</div>
	</section>

@section('script')
  @include('include.admin.add_edit_scripts')
@endsection

@endsection