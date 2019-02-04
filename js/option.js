$(document).ready(function(){
  $("select").change(function(){
    var id = $(this).attr("id");
    var id1= id.substring(3);
    var id2="id"+id1;
    $("#"+id2).html("&#8377; "+$("#"+id).val());
    });
  });
