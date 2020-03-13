
$(document).ready(function(){
   

    //js for masonry for event cards on desktop layout 
    $('.event-desktop-wrap').masonry({
        itemSelector: '.cell',
        columnWidth:5
    });
   
    //click handler for hamburger and close icon
    $('.hamburger,.close-icon').click(function() {
        //get the element with class hidden
        var hidden = $('.hidden');
        //if the element has class visible 
        if (hidden.hasClass('visible')) {
            //animate menu slowly to left and remove class visible
            hidden.animate({"left":"-1000px"}, "slow").removeClass('visible');
        } else {
            //otherwise show the menu and add class visible
            hidden.animate({"left":"0px"}, "slow").addClass('visible');
        }
        //toggle the display of close btn accordingly
        $(".close-wrap").toggleClass('toggle-display');
       
       //check if the menu  is shown 
        if($(".site-header .menu").hasClass("visible")) {
            //do not allow scrolling of the page
            $('html, body').css({
                overflow: 'hidden',
                height: '100%'
            });
        }
        else{
            //else allow scrolling of the page
            $('html, body').css({
            overflow: 'auto',
            height: 'auto'
        });
       
        }

    });
       
    //start of slider initialisation(slider only present in mobile)
    if ($(window).width() < 480) {
        $(".current-organizers-wrap").hide();
        $(".organizers-mobile-wrap").show();
        //slider configuration for organizers cards
        $('.organizers-mobile-wrap').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:false,
            nextArrow:false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: "unslick"
                },
                {
                    breakpoint: 600,
                    settings: "unslick"
                },
                {
                    breakpoint: 480,
                    settings: {
                        prevArrow:false,
                        nextArrow:false,                        
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 1.2,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        //hide the non slider wraps
        $(".event-desktop-wrap").hide();
        $(".event-mobile-wrap").show();
        //slider configuration for event cards   
        $('.event-mobile-wrap').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:false,
            nextArrow:false,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: "unslick"
                },
                {
                    breakpoint: 600,
                    settings: "unslick"
                },
                {
                    breakpoint: 480,
                    settings: {
                        prevArrow:false,
                        nextArrow:false,                        
                        dots: true,
                        infinite: false,
                        speed: 300,
                        slidesToShow: 1.2,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }
    
});

