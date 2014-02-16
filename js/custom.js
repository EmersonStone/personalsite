$("#footer-icon").hover(function(){
$(this).text('!')}, 

function(){
$(this).text('"');
})

$(function(){
  $("#menu-toggle,#nav-close").click(function(){
    $("#wrap").toggleClass("pushed");
  });
});

