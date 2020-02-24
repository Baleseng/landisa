@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | moderators')

@section('style')
  @include('include.admin.dashboard_charts_activity_styles')
@endsection

@section('searchfield')
  @include('include.admin.header_search_news')
@endsection

@section('menubutton')
  @include('include.admin.header_section_'.$url.'_button')
@endsection

@section('content')
  @if (session('status'))
    {{ session('status') }}
  @endif

  <div class="admin-user-map-index-container">

    @include('include.admin.admin_map_nav_gender_moderator')

    <div class="admin-user-map-index-widget">
      <div class="admin-user-map-index-col">
      
        <div class="admin_table_user_index">
          
          <div class="table_index_head_row">
            <div class="table_index_head_user_flag"></div>
            <div class="table_index_head_user_status"></div>
            <div class="table_index_head_user_img"></div>
            <div class="table_index_head_user_created">Registered</div>
            <div class="table_index_head_user_btn"></div>
          </div>

          @foreach ($moderators as $moderator)
          <div class="table_index_row row">  

            <div class="table_index_user_flags">  
              <img class="fa fa-flag" src="https://developer.triwink.app/images/africa/{{ $moderator->flag }}.svg">
            </div> 
            
            <div class="table_index_user_status"><i class="fa fa-circle {{ $moderator->status }}"></i></div>

            <div class="user_hover_wrapper">
              <div class="user_hover_btn"> 
                <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $moderator->avator }}" >
              </div>
              <div id="user_hover_show_user">
                <div class="user_hover_img">
                  <img class="fa fa-user" src="https://developer.triwink.app/images/profile/users/{{ $moderator->avator }}" >
                </div>
                <span class="user_hover_info">
                  <a href="" class="user_hover_info_name">{{ $moderator->name }} {{ $moderator->surname }}</a>
                </span>
              </div>
            </div>

            <div class="table_index_user_created">{{ $moderator->created_at->diffForHumans() }}</div> 

            <div class="dropdown2">
              <span class="dropbtn2 fa fa-ellipsis-v"></span>
              <div id="m5" class="dropdown2-content">
                
                <div class="index-btn-row">
                  <a href="{{ url($url.'/moderators/'.$moderator->id.'-'.str_replace(' ', '-',$moderator->name)) }}">
                    <i class="fa fa-user"></i> {{$moderator->name}}'s Profile
                  </a>
                </div>

                <div class="index-btn-row">
                  <form method="POST" action="{{ url('users/'.$moderator->id) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <input type="hidden" value="suspend" name="status"/>
                    <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $moderator->name }}</button>
                  </form>
                </div>

                <div class="index-btn-row">
                  <form method="POST" action="{{ url('users/'.$moderator->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $moderator->name }}</button>
                  </form>
                </div>
                
              </div>
            </div>

          </div>
          @endforeach

        </div>
        <div class="admin-wrap-paginator"> 
          {{ $moderators->links() }}
        </div>

      </div>     
    </div>
  </div>

  @section('script')
    @include('include.admin.reg_realtime_moderators')
    @include('include.admin.dashboard_charts_activity_scripts')
  @endsection

@endsection