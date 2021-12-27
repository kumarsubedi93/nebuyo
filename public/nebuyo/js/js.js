$(".menu-btn").click(function(){
  $(".header").toggleClass("res-header");
  $(".main-content").toggle();
})
function myFunction(x) {
    x.classList.toggle("change");
  }
$("#acc-fullname-edit").click(function(){
  $("#acc-fullname").hide()
  $("#acc-fullname-edit-box").show();
  $("#acc-fullname-edit").hide();
})
$("#acc-email-edit").click(function(){
  $("#acc-email").hide()
  $("#acc-email-edit-box").show();
  $("#acc-email-edit").hide();
})
$("#acc-phone-number-edit").click(function(){
  $("#acc-phone-number").hide()
  $("#acc-phone-number-edit-box").show();
  $("#acc-phone-number-edit").hide();
})
$("#acc-password-edit").click(function(){
  $("#acc-password").hide()
  $("#acc-password-edit-box").show();
  $("#acc-password-edit").hide();
})
$("#zoom1").elevateZoom(

);
$("#bundle-zoom1").elevateZoom();
$("#bundle-zoom2").elevateZoom();
$("#bundle-zoom3").elevateZoom();
$("#overview-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#overview-scrollspy-content").offset().top-60
  },200)
})
$("#overview-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#overview-scrollspy-content").offset().top-60
  },200)
})
$("#specification-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#specification-scrollspy-content").offset().top-60
  },200)
})
$("#comparing-item-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#comparing-item-scrollspy-content").offset().top-60
  },200)
})
$("#review-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#review-scrollspy-content").offset().top-60
  },200)
})
$("#customer-qa-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#customer-qa-scrollspy-content").offset().top-60
  },200)
})
$("#overview-bundle-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#overview-bundle-scrollspy-content").offset().top-60
  },200)
})
$("#product-bundle-scrollspy").click(function(){
  $("html,body").stop().animate({
    scrollTop: $("#product-bundle-scrollspy-content").offset().top-60
  },200)
})
$("#comparing-switch-btn").click(function(){
  $(".highlight-table").toggle();
})

