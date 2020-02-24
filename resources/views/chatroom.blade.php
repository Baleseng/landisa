@extends('layouts.user.main')

@section('description', Auth::user()->name . ' ' . Auth::user()->surname)
@section('keywords', '')

@section('title',  Auth::user()->name . ' ' . Auth::user()->surname)

@section('style')
  @include('layouts.user.poststyle')
@endsection

@section('searchfield')
  @include('include.user.header_search_users')
@endsection

@section('content')

	@if (session('status'))
		{{ session('status') }}
	@endif

	<div class="chatroom-container row">
    
    <div class="chatroom-user-container" id="scroll-y">
        <a href="#">
            <img src="" class="c-user-image fa fa-user"/> 
            <span class="c-user-name">Stephen Mokgosi</span>
        </a>

        <a href="#">
            <img src="#" class="c-user-image fa fa-user"/> 
            <span class="c-user-name">Boikanyo Lebese</span>
        </a>

        <a href="#">
            <img src="#" class="c-user-image fa fa-user"/> 
            <span class="c-user-name">Sechaba Rasentswere</span>
        </a>
    </div>

    <div class="chatroom-msg-container row">

        <div class="c-msg-output-container">
        	<ul>
        		<li class="row">
        			<span class="c-msg-primary-user">test1</span>
        		</li>
        		<li class="row">
        			<span class="c-msg-secondary-user">test2test2test2 test2test2test2test2</span>
        		</li>
                <li class="row">
                    <span class="c-msg-secondary-user">tes3</span>
                </li>
                <li class="row">
                    <span class="c-msg-primary-user">test4test4test4 test4test4test4test4</span>
                </li>
        	</ul>
        </div>
        
        <div class="c-msg-input-container">
            <div class="c-msg-insert-wrap"></div>
            <input class="c-msg-input" type="text"/>
            <button class="c-msg-btn"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>

  </div>


  @section('script')
  
  @include('layouts.user.postscript')
  @endsection

@endsection