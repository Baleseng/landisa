$(document).ready(function(){
  $("select").change(function(){
    $(this).find("option:selected").each(function(){
      if($(this).attr("value")=="africacountry"){
        $(".country").not(".africa").hide();
        $(".africa").show("checked");
      }
      else if($(this).attr("value")=="aocountry"){
        $(".country").not(".ao").hide();
        $(".ao").show();
      }
      else if($(this).attr("value")=="bwcountry"){
        $(".country").not(".bw").hide();
        $(".bw").show();
      }
      else if($(this).attr("value")=="kecountry"){
        $(".country").not(".ke").hide();
        $(".ke").show();
      }
      else if($(this).attr("value")=="mzcountry"){
        $(".country").not(".mz").hide();
        $(".mz").show();
      }
      else if($(this).attr("value")=="nacountry"){
        $(".country").not(".na").hide();
        $(".na").show();
      }
      else if($(this).attr("value")=="tzcountry"){
        $(".country").not(".tz").hide();
        $(".tz").show();
      }
      else if($(this).attr("value")=="zacountry"){
        $(".country").not(".za").hide();
        $(".za").show();
      }
      else if($(this).attr("value")=="zmcountry"){
        $(".country").not(".zm").hide();
        $(".zm").show();
      }
       else if($(this).attr("value")=="zwcountry"){
        $(".country").not(".zw").hide();
        $(".zw").show();
      }
      else{
        $(".country").hide();
      }
    });
  }).change();
});
