var ratedIndex = -1;
$(document).ready(function () {
  $('.fa-star').click(function () {
    ratedIndex = parseInt($(this).data('index'));
  })
  $('.fa-star').mouseover(function () {
    resetStars();
    var currentIndex = parseInt($(this).data('index'));
    setStars(currentIndex);
  });

  $('.fa-star').mouseleave(function () {
    resetStars();
    if (ratedIndex != -1) {
      setStars(ratedIndex);
    }

  });

});

function resetStars() {
  $('.fa-star').css('color', 'white');
}

function setStars(max) {
  for (i = 0; i <= max; i++) {
    $('.fa-star:eq(' + i + ')').css('color', 'black');
  }
}




$(function() {  
  $("body").niceScroll({
      cursorcolor: "#34495E",
      cursorwidth: "10px"
  });
})
$(function() {  
  $(".ask").niceScroll({
      cursorcolor: "teal",
      cursorwidth: "10px"
  });
})