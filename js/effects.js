var pContainerHeight = $('.box').height();

$(window).scroll(function(){


    var wScroll = $(this).scrollTop();
    //console.log(wscroll);

    if (wScroll <= pContainerHeight) {

        $('.logo').css({
            'transform':'translate(0px, '+ wScroll /2 +'%)'
        });

    }
});
