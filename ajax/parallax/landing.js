$(window).scroll(function() {
    var wScroll = $(this).scrollTop();
    if(wScroll > $('#h1head').offset().top - 400 ){
        $('.head-er').addClass('muncul');
        $('.head-isi').each(function(i) {
            setTimeout(function() {
                $('.head-isi').eq(i).addClass('muncul');
            },500 * (i+1))
        });
        $('.head-img').each(function(i) {
            setTimeout(function() {
                $('.head-img').eq(i).addClass('muncul');
            },1000 * (i+1))
        });
    }
}); 