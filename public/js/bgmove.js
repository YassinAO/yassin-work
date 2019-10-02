if(window.innerWidth <= 1024){
    // Don't run the script.
}else{
    $('#header').mousemove(function(e){
        var moveX = (e.pageX * -1 / 25);
        var moveY = (e.pageY * -1 / 25);
        $(this).css('background-position', moveX + 'px ' + moveY + 'px');
    });
}
