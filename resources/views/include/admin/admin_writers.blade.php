<div class="admin-wrap-article" id="scroll-y">
  @foreach ($admin as $person)
  <div class="tablecol">
    
    <div class="table_users">{{ $person->name }} {{ $person->surname }}</div>
    <div class="table_email">{{ $person->email }}</div>
    
    <div class="table_section">Active</div> 
    <div class="table_btn">
      <a href="{{ url('admin/writer/'.$person->id . '-' . $person->name . '-' . $person->surname) }}">
        <i class="fa fa-dashboard"></i>
      </a>
    </div>
    <div class="table_btn">
      <form method="POST" action="{{ url('admin/'.$person->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" class="submitbtn"><i class="fa fa-trash"></i></button>  
      </form>
    </div>   
  </div>
  @endforeach
  
</div>