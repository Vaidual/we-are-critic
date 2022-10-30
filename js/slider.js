$(document).ready(function(){
    $('.new-titles__slider').slick({
      slidesToShow: 5,
      slidesToScroll: 5,
      infinite: false,
      draggable: false,
      waitForAnimate: true,
      variableWidth: true,
      speed: 600,
      easing: 'ease',
      appendArrows: $('.new-titles__buttons-container')
    });
  });

  $(document).ready(function(){
    $('.most-rated__slider').slick({
      slidesToShow: 5,
      slidesToScroll: 5,
      infinite: false,
      draggable: false,
      waitForAnimate: true,
      variableWidth: true,
      speed: 600,
      easing: 'ease',
      appendArrows: $('.most-rated__buttons-container')
    });
  });
