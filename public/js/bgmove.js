if(window.innerWidth <= 1024){
    // Don't run the script.
}else{
    $('#header').mousemove(function(e){
        var moveX = (e.pageX * -1 / 55);
        var moveY = (e.pageY * -1 / 55);
        $(this).css('background-position', moveX + 'px ' + moveY + 'px');
    });
}
