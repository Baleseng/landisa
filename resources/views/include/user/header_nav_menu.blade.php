<div class="navigation">
	<ul>
    <li><a href="https://triwink.app/news">Home</a></li>
   
    <li class="left-border"><a href="https://triwink.app/{{ $section1[0] }}">{{ $section1[0] }}</a></li>
    <li class="left-border"><a href="https://triwink.app/{{ $section2[0] }}">{{ $section2[0] }}</a></li>
    <li class="left-border"><a href="https://triwink.app/{{ $section3[0] }}">{{ $section3[0] }}</a></li>
    <li class="left-border"><a href="https://triwink.app/{{ $section4[0] }}">{{ $section4[0] }}</a></li>
    <li class="left-border"><a href="https://triwink.app/{{ $section5[0] }}">{{ $section5[0] }}</a></li>
    <li class="left-border"><a href="https://triwink.app/{{ $section6[0] }}">{{ $section6[0] }}</a></li>

  </ul>

  <div id="icon" class="hamburger"><div></div></div>
  <div class="hamburgermenu">
    <div id="submenudesktop">
      @include('include.menuheadlines')
      @include('include.menuentrepreneur')
      @include('include.menufanatic')
      @include('include.menupetrolhead')
      @include('include.menuextrovert')
      @include('include.menuenthusiast')
      @include('include.menubackpacker')
      @include('include.menugearhead')
    </div>
  </div>

  <div id="mobileSideNav" class="sidenavmenu">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>

</div>
