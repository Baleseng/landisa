<div class="admin-wrap-article" id="scroll-y">
  @foreach ($admin as $person)
  <div class="table_row">
    <div class="table_btn_block">
      <div class="table_users">{{ $person->name }} {{ $person->surname }}</div>
      <div class="table_email">{{ $person->email }}</div>
      <div class="table_img img-block">
        <img class="fa fa-user" src="{{ URL::asset('images/profile/users/'.$person->profileimg) }}"/>
      </div>
      <div class="table_section">Active</div> 
      <div class="table_btn"><a href="{{ url('/admin/contributor/dashboard/'.$person->id) }}"><i class="fa fa-dashboard"></i></a></div>
      <div class="table_btn">
        <form method="POST" action="{{ url('/admin/contributor/'.$person->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="submitbtn"><i class="fa fa-trash"></i></button>  
        </form>
      </div>   
    </div>
  </div>
  @endforeach
  
</div>