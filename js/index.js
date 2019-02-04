$(document).ready(function (){
  var elem1=document.getElementById("form2");
  var elem2=document.getElementById("form3");
  $(elem2).hide();
  $(document.getElementById("a1")).on("click", function(){
      $(elem1).hide();
      $(elem2).show();
  });
  $(document.getElementById("a2")).on("click", function(){
      $(elem2).hide();
      $(elem1).show();
  });
});
