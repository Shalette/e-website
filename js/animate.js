$(document).ready(function(){
$(window).resize(function() {
  if(window.innerWidth<767){
    $('#nav').css({marginTop: "20px"});
  }
  else{
    $('#nav').css({marginTop: "85px"});
  }
});
  $(document).scroll(function() {
    if(window.innerWidth > 767){
    $('#brand').css({height: $(this).scrollTop() > 80? "60px":"80px"});
    $('#nav').css({marginTop: $(this).scrollTop() > 80? "70px":"85px"});
  }
});
});
