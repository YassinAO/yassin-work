$(window).scroll(function() {
    var wintop = $(window).scrollTop(), docheight =

    $(document).height(), winheight = $(window).height();
    var scrolled = (wintop/(docheight-winheight))*100;

    $('.scroll-indicator-alt').css('width', (scrolled + '%'));
});
