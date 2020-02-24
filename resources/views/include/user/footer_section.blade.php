<!-- FOOTER SECTION -->

<div class="footer-wrap">

  <div class="footer-row">
    <div class="footer-col-3">
      <div class="footer-logo">
        <img src="https://cms.mqoqowa.africa//images/logo/signagefooter.svg" alt="logo" />
      </div>
      <div class="footer-copyright">Website © 2018  All rights reserved.</div>
    </div> 
    <div class="footer-col-1">
      <div class="footer-geoweather">Wed 22 Aug | <i class="fa fa-sun"></i> 23 Sunny</div>       
      <div class="footer-geoflag"><img class="fa fa-user" src="https://cms.mqoqowa.africa//images/africa/{{$geoip->getCountryCode()}}.svg" /></div> 
      <div class="footer-geolocation">{{ $geoip->getCity() }}, {{ $geoip->getCountry() }}</div> 
    </div>
    <div class="footer-col-2">
      <div class="footer-site-btn">
        <a href=""><i class="fa fa-comment-alt"></i> Feedback</a>
      </div>
    </div>
  </div>

</div>
