$('#change-landing').on('click', function(){
  $(this).parent().toggleClass('state-alternate');
});

$('#form-open').on('click', function(){
  $('.form-cont').addClass('state-active');
});

$('#form-close').on('click', function(){
  $('.form-cont').removeClass('state-active');
});

$('#mobile-open').on('click', function(){
  $('#mobile-menu-sidebar').addClass('state-opened');
});

$('#mobile-close').on('click', function(){
  $('#mobile-menu-sidebar').removeClass('state-opened');
});

$('#portfolio-menu-open').on('click', function(){
  $(this).toggleClass('state-closed');
  $('#portfolio-menu').toggleClass('state-opened');
});

$('.portfolio-button').on('click',function(e){
  e.preventDefault();
  const target = $(this).attr('href');
  const scrolltop = $(target).offset().top;
  $('body').animate({scrollTop: scrolltop}, 1000, 'swing', function(){
    $('#portfolio-menu').removeClass('state-opened');
    $('#portfolio-menu-open').removeClass('state-closed');
    $('#mobile-menu').addClass('state-hidden');
  });
});

$('.search-bar').on('click', function(){
  $(this).toggleClass('state-opened');
});

$('.inner-button > h1').on('click', function(){
  if($(this).parent().hasClass('active')){
    $('.inner-inner-button').removeClass('active');
    $(this).parent().toggleClass('active');
  } else {
    $(this).parent().toggleClass('active');
  }
});

$('.inner-inner-button > h1').on('click', function(){
  const el = $(this).parent();
  $('.inner-inner-button').not(el).removeClass('active');
  el.toggleClass('active');
});

$('.filter-blog').on('click', function(e){
  e.preventDefault();
  const term_id = $(this).data('termId');
  const taxonomy_name = $(this).text();
  $('#current-taxonomy').text(taxonomy_name);
  $.ajax({
    url: my_ajax_object.ajax_url,
    data: {
        'action':'filter_blog',
        'term_id': term_id,
    },
    success:function(data){
      $('#dynamic-content').html(data);
    },
    error: function(){}
  });
});

$('#dynamic-content').on('click', '.previous', function(e){
  e.preventDefault();
  const curpage = parseInt($('#curpage').html());
  const maxpage = parseInt($('#maxpage').html());
  const category = $(this).data('category');
  const pagenum = curpage - 1;

  if(curpage > 1){
    $.ajax({
      url: my_ajax_object.ajax_url,
      data: {
          'action':'filter_blog',
          'term_id': category,
          'pagenum': pagenum
      },
      success:function(data){
        $('#dynamic-content').html(data);
      },
      error: function(){}
    });
  }
});

$('#dynamic-content').on('click', '.next', function(e){
  e.preventDefault();
  const curpage = parseInt($('#curpage').html());
  const maxpage = parseInt($('#maxpage').html());
  const category = $(this).data('category');
  const pagenum = curpage + 1;
  if(curpage < maxpage){
    $.ajax({
      url: my_ajax_object.ajax_url,
      data: {
          'action':'filter_blog',
          'term_id': category,
          'pagenum': pagenum,
      },
      success:function(data){
        $('#dynamic-content').html(data);
      },
      error: function(){}
    });
  }
});

$('#dynamic-content').on('click', '.dropdown', function(e){
  e.preventDefault();
  const category = $(this).data('category');
  const pagenum = $(this).data('pagenum');
  $.ajax({
    url: my_ajax_object.ajax_url,
    data: {
        'action':'filter_blog',
        'term_id': category,
        'pagenum': pagenum,
    },
    success:function(data){
      $('#dynamic-content').html(data);
    },
    error: function(){}
  });
});

$('.filter-services').on('click', function(e){
  e.preventDefault();
  const category = $(this).data('category');
  const taxonomy = $(this).data('taxonomy');
  const taxonomy_name = $(this).text();
  $('#current-taxonomy').text(taxonomy_name);
  $.ajax({
    url: my_ajax_object.ajax_url,
    data: {
        'action':'filter',
        'category': category,
        'taxonomy': taxonomy,
    },
    success:function(data){
      $('#dynamic-content-services').html(data);
    },
    error: function(){}
  });
});

$('#dynamic-content-services').on('click', '.previous', function(e){
  e.preventDefault();
  const curpage = parseInt($('#curpage').html());
  const maxpage = parseInt($('#maxpage').html());
  const category = $(this).data('category');
  const taxonomy = $(this).data('taxonomy');
  const pagenum = curpage - 1;

  if(curpage > 1){
    $.ajax({
      url: my_ajax_object.ajax_url,
      data: {
          'action':'filter',
          'category': category,
          'pagenum': pagenum,
          'taxonomy': taxonomy,
      },
      success:function(data){
        $('body').animate({scrollTop: 0}, 1000, 'swing', function(){
          $('#dynamic-content-services').html(data);
        });
      },
      error: function(){}
    });
  }
});

$('#dynamic-content-services').on('click', '.next', function(e){
  e.preventDefault();
  const curpage = parseInt($('#curpage').html());
  const maxpage = parseInt($('#maxpage').html());
  const category = $(this).data('category');
  const taxonomy = $(this).data('taxonomy');
  const pagenum = curpage + 1;
  if(curpage < maxpage){
    $.ajax({
      url: my_ajax_object.ajax_url,
      data: {
          'action':'filter',
          'category': category,
          'pagenum': pagenum,
          'taxonomy': taxonomy,
      },
      success:function(data){
        $('body').animate({scrollTop: 0}, 1000, 'swing', function(){
          $('#dynamic-content-services').html(data);
        });
      },
      error: function(){}
    });
  }
});

$('#dynamic-content-services').on('click', '.dropdown', function(e){
  e.preventDefault();
  const category = $(this).data('category');
  const pagenum = $(this).data('pagenum');
  const taxonomy = $(this).data('taxonomy');
  $.ajax({
    url: my_ajax_object.ajax_url,
    data: {
        'action':'filter',
        'category': category,
        'pagenum': pagenum,
        'taxonomy': taxonomy,
    },
    success:function(data){
      $('#dynamic-content-services').html(data);
    },
    error: function(){}
  });
});


$('img.svg').each(function(){
  var $img = jQuery(this);
  var imgID = $img.attr('id');
  var imgClass = $img.attr('class');
  var imgURL = $img.attr('src');
  var style = $img.attr('style');

  jQuery.get(imgURL, function(data) {
      // Get the SVG tag, ignore the rest
      var $svg = jQuery(data).find('svg');

      // Add replaced image's ID to the new SVG
      if(typeof imgID !== 'undefined') {
          $svg = $svg.attr('id', imgID);
      }
      // Add replaced image's classes to the new SVG
      if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('class', imgClass+' replaced-svg');
      }

      // Add replaced image's styles to the new SVG
      if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('style', style);
      }

      // Remove any invalid XML tags as per http://validator.w3.org
      $svg = $svg.removeAttr('xmlns:a');

      // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
      if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
          $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
      }

      // Replace image with new SVG
      $img.replaceWith($svg);

}, 'xml');

});

$('#blog-related-posts').slick({
  arrows: false,
  centerMode: true,
  centerPadding: '11.25px',
  infinite: true,
  initialSlide: 0,
  slidesToShow: 1
});

$('.fade-slide-container').slick({
  adaptiveHeight: true,
  arrows: false,
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear'
});

$('#featured-case-studies').slick({
  arrows: false,
  centerMode: true,
  centerPadding: '11.25px',
  infinite: false,
  initialSlide: 1,
  slidesToShow: 1
});

$('#featured-team-members').slick({
  arrows: false,
  centerMode: true,
  centerPadding: '22.5px',
  infinite: true,
  initialSlide: 2,
  slidesToShow: 1
});

 var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
    // downscroll code
    if(st > 150){
      $('#mobile-menu').addClass('state-hidden');
      $('#share-bar').addClass('state-active');
    }

   } else {
    // upscroll code
    $('#mobile-menu').removeClass('state-hidden');
   }
   lastScrollTop = st;
});
