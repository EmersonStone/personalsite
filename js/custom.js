$(".rabbit").hover(function(){
$(this).text('!')},

function(){
$(this).text('"');
})

$(function(){
  $("#menu-toggle, #nav-close").click(function(){
    $("#container").toggleClass("pushed");
  });
  $(".container").click(function(){
    $("#container").removeClass("pushed");
  });
});

