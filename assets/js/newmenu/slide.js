
/*<![CDATA[*/$(document).ready(function() {
    $(".paging").show(); 
    $(".paging a:first").addClass("active");

var imageWidth = $(".easyslider").width(); 
var imageSum = $(".image_reel img").size(); 
var imageReelWidth = imageWidth * imageSum;

    $(".image_reel").css({'width' : imageReelWidth});

rotate = function(){ var triggerID = $active.attr("rel") - 1; 

var image_reelPosition = triggerID * imageWidth;

    $(".paging a").removeClass('active');
        $active.addClass('active');

    $(".easytitledes").stop(true,true).slideUp('slow');
    $(".easytitledes").eq( 
    $('.paging a.active').attr("rel") - 1 ).slideDown("slow"); 
    $(".image_reel").animate({left: -image_reelPosition}, 400 );
    };

rotateSwitch = function(){
    $(".easytitledes").eq( $('.paging a.active').attr("rel") - 1 ).slideDown("slow");

play = setInterval(function(){
    $active = $('.paging a.active').next();

if ( $active.length === 0) {
    $active = $('.paging a:first'); } rotate(); }, 8000); };

rotateSwitch(); $(".image_reel a, .easytitledes a").hover(function() {
    clearInterval(play); }, function() { rotateSwitch();
    });
    $(".paging a").click(function() { $active = $(this);
    clearInterval(play); rotate(); rotateSwitch();  return false;
    });
});
/*]]>*/