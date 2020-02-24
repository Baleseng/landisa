  <div class="table-row">
    <div class="table-col-img"></div>      
    <div class="table-col-team">
      <select>
        <option value="group_a_div">Group A <i class="fa fa-chevron-down"></i></option>
        <option value="group_b_div">Group B <i class="fa fa-chevron-down"></i></option>
        <option value="group_c_div">Group C <i class="fa fa-chevron-down"></i></option>
        <option value="group_d_div">Group D <i class="fa fa-chevron-down"></i></option>
        <option value="group_e_div">Group E <i class="fa fa-chevron-down"></i></option>
        <option value="group_f_div">Group F <i class="fa fa-chevron-down"></i></option>
        <option value="group_g_div">Group G <i class="fa fa-chevron-down"></i></option>
        <option value="group_h_div">Group H <i class="fa fa-chevron-down"></i></option>
      </select>
    </div>
    <div class="table-col-status">GP</div>
    <div class="table-col-status">W</div>
    <div class="table-col-status">L</div>
    <div class="table-col-status">D</div>
    <div class="table-col-status">Pts</div>
  </div>

  <div class="table-row group_a box">
    @foreach ( $wcstand->where('group', '=', 'A') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

   <div class="table-row group_b box">
    @foreach ( $wcstand->where('group', '=', 'B') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_c box">
    @foreach ( $wcstand->where('group', '=', 'C') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_d box">
    @foreach ( $wcstand->where('group', '=', 'D') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_e box">
    @foreach ( $wcstand->where('group', '=', 'E') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_f box">
    @foreach ( $wcstand->where('group', '=', 'F') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_g box">
    @foreach ( $wcstand->where('group', '=', 'G') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

  <div class="table-row group_h box">
    @foreach ( $wcstand->where('group', '=', 'H') as $stand )
    <div class="table-col-img">
      <img src="{{ URL::asset('images/worldcup/flag/'.$stand->flag) }}"/>
    </div>      
    <div class="table-col-team">{{ $stand->team }}</div>
    <div class="table-col-status">{{ $stand->game }}</div>
    <div class="table-col-status">{{ $stand->win }}</div>
    <div class="table-col-status">{{ $stand->lose }}</div>
    <div class="table-col-status">{{ $stand->draw }}</div>
    <div class="table-col-status">{{ $stand->points }}</div>
    @endforeach
  </div>

