$(document).ready(function(){

    $('a[rel=gallery]').colorbox({
        transition: "fade",
        speed: 750,
        current: "{current} of {total}",
        opacity: .8,
        slideshow: true,
        slideshowAuto: false,
        //maxWidth: "700px",
        maxHeight: "750px",
        escKey: true,
        arrowKey: true
    });
    
    $('body').css({backgroundColor: '#888'}).animate({backgroundColor: '#555'}, {duration: 3000, easing: 'linear'});
    $('#loginform').hide();
    $('#uploadform').hide();
    
    if ($('#admin').text() == 'Admin'){
        $('a[rel=admin]').colorbox({
            transition: "elastic",
            speed: 1000,
            opacity: .57,
            href: 'loginform.php'
        });
    }else{
        $('#admin').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $('#password').attr('value', 'logout');
            $('#logout').submit();
        });
    };
    
    $('a[rel=upload]').colorbox({
        transition: "elastic",
        speed: 1000,
        opacity: .57,
        href: 'uploadform.php'
    });
    
    $('.gallery').css({opacity: 0});
    
    $('img').each(function(){
        var delayTime = (Math.floor(Math.random()*15)) * 200;
        $(this).parent().delay(delayTime).animate({opacity: 1}, {duration: 1000, easing: 'swing'});
    
        if ($(this).attr('height') > $(this).attr('width')){
          var centerH = ($(this).attr('height') - 125)/-2;
          $(this).css({marginTop: centerH});
        }
        else if ($(this).attr('height') < $(this).attr('width')){
          var centerW = ($(this).attr('width') - 125)/-2;
          $(this).css({marginLeft: centerW});
        };
    });

    $('#deleteMode').click(function(e) {
        e.preventDefault();
        $('.x').css({opacity: .65})
        $('.x').hover(function(){$(this).animate({opacity: 1}, {duration: 300, easing: 'swing', queue: false})}, function(){$(this).animate({opacity: .5}, {duration: 300, easing: 'swing', queue: false})});
        $('a[rel=gallery]').attr('rel', 'deleteMode').attr('class', 'deleteMode');
        $('.x').animate({top: 0}, 1200, 'swing').click(function(e){
            e.preventDefault();
            $('#id').attr('value', $(this).attr('id'));
            $('#delete').submit();
        });        
    });
      
});