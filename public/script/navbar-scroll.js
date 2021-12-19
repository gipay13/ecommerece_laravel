$(document).ready(function () {
  $(document).scroll(function () { 
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());  
  });
});

//2 cara ini bekerja tapi gatau kenapa

// $(document).scroll(function () {
//   var $nav = $(".navbar-fixed-top");
//   $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
// });
