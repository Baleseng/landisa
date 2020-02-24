  
  <ol class="added row"><span id="result"></span></ol>     
  
  <ul class="add row">
      @if ($errors->has('section1'))
        <span class="err-msg">{{ $errors->first('section1') }}</span>
      @endif

       @if ($errors->has('section2'))
        <span class="err-msg">{{ $errors->first('section2') }}</span>
      @endif

       @if ($errors->has('section3'))
        <span class="err-msg">{{ $errors->first('section3') }}</span>
      @endif

       @if ($errors->has('section4'))
        <span class="err-msg">{{ $errors->first('section4') }}</span>
      @endif
    
    <div class="app-block">
      <div class="app-inner">
        <div class="app-card-front">
          <span class="app-unlink">
            <i class="fa fa-enthusiast"></i> 
            <b>Enthusiast</b>
          </span>
        </div>
        <div class="app-card-back">
          <div class="add">
            <label class="check">
              <input type="checkbox" value='["enthusiast","lifestyle"]' />
              <span class="fa fa-enthusiast"></span>Lifestyle
            </label>
          </div>
        </div>
      </div>
    </div>


    <div class="app-block">
      <div class="app-inner">
        <div class="app-card-front">
          <span class="app-unlink">
            <i class="fa fa-extrovert"></i> 
            <b>Extrovert</b>
          </span>
        </div>
        <div class="app-card-back">
          <div class="add">
            <label class="check">
              <input type="checkbox" value='["extrovert","entertainment"]' />
              <span class="fa fa-extrovert"></span>Entertainment
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="app-block">
      <div class="app-inner">
        <div class="app-card-front">
          <span class="app-unlink">
            <i class="fa fa-backpacker"></i> 
            <b>Backpacker</b>
          </span>
        </div>
        <div class="app-card-back">
          <div class="add">
            <label class="check">
              <input type="checkbox" value='["backpacker","travels"]' />
              <span class="fa fa-backpacker"></span>Travels
            </label>
          </div>
        </div>
      </div>
    </div>
    
    <div class="app-block">
      <div class="app-inner">
        <div class="app-card-front">
          <span class="app-unlink">
            <i class="fa fa-gearhead"></i> 
            <b>Gearhead</b>
          </span>
        </div>
        <div class="app-card-back">
          <div class="add">
            <label class="check">
              <input type="checkbox" value='["gearhead","technology"]' />
              <span class="fa fa-gearhead"></span>Technology
            </label>
          </div>
        </div>
      </div>
    </div>
  
  </ul>

  <div class="form-btn-wrap">
    <button type="submit" class="primarybtn">Personalise</button>
    <a href="{{ url('/') }}" class="cancelbtn">Cancel</a>
  </div>


