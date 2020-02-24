<script type="text/javascript">
  $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
      type : 'get',
      url : '{{URL::to("find")}}',
      data:{'input':$value},
      success:function(data){
        $('.search ul').html(data);
      }
    });
  })
</script>

<script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


