$(document).on('scroll', function() {
    var nav = $("nav");
    var indicator = $(".scroll-indicator");
    if($(this).scrollTop()>=$('#header-title').position().top){
        nav.removeClass('nav').addClass("nav-alt");
        indicator.addClass("scroll-indicator-alt");
    } else {
        nav.removeClass("nav-alt").addClass('nav');
        indicator.removeClass("scroll-indicator-alt");
    }
})
