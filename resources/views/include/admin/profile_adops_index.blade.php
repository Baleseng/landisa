@extends('layouts.admin.main')

@section('description', '')
@section('keywords', '')

@section('title',' ' .$url. ' | adops')

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

    @include('include.admin.admin_map_nav_gender_adop')

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

          @foreach ($adops as $adop)
          <div class="table_index_row row">  

            <div class="table_index_user_flags">  
              <img class="fa fa-flag" src="https://cms.mqoqowa.africa/images/africa/{{ $adop->flag }}.svg">
            </div> 
            
            <div class="table_index_user_status"><i class="fa fa-circle {{ $adop->status }}"></i></div>

            <div class="user_hover_wrapper">
              <div class="user_hover_btn"> 
                <img class="fa fa-user" src="https://cms.mqoqowa.africa/images/profile/users/{{ $adop->avator }}" >
              </div>
              <div id="user_hover_show_user">
                <div class="user_hover_img">
                  <img class="fa fa-user" src="https://cms.mqoqowa.africa/images/profile/users/{{ $adop->avator }}" >
                </div>
                <span class="user_hover_info">
                  <a href="" class="user_hover_info_name">{{ $adop->name }} {{ $adop->surname }}</a>
                </span>
              </div>
            </div>

            <div class="table_index_user_created">{{ $adop->created_at->diffForHumans() }}</div> 

            <div class="dropdown2">
              <span class="dropbtn2 fa fa-ellipsis-v"></span>
              <div id="m5" class="dropdown2-content">
                
                <div class="index-btn-row">
                    <a href="{{ url($url.'/adops/'.$adop->id.'-'.str_replace(' ', '-',$adop->name)) }}">
                    <i class="fa fa-user"></i> {{$adop->name}}'s Profile
                  </a>
                </div>

                <div class="index-btn-row">
                  <form method="POST" action="{{ url('users/'.$adop->id) }}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <input type="hidden" value="suspend" name="status"/>
                    <button type="submit"><i class="fa fa-minus-circle"></i> Suspend {{ $adop->name }}</button>
                  </form>
                </div>

                <div class="index-btn-row">
                  <form method="POST" action="{{ url('users/'.$adop->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="submitbtn"><i class="fa fa-trash"></i> Remove {{ $adop->name }}</button>
                  </form>
                </div>
                
              </div>
            </div>

          </div>
          @endforeach
        </div>
        
        <div class="admin-wrap-paginator"> 
          {{ $adops->links() }}
        </div>

      </div>     
    </div>

  </div>

  @section('script')
    @include('include.admin.reg_realtime_adops')
    @include('include.admin.dashboard_charts_activity_scripts')
  @endsection

@endsection