var $devicewidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var $deviceheight = (window.innerHeight > 0) ? window.innerHeight : screen.height;
var $bodyel = jQuery("body");

var $lgWidth = 1199;
var $mdWidth = 991;
var $smWidth = 767;
var $xsWidth = 479;

/* ========================== */
/* ==== HELPER FUNCTIONS ==== */

function validatedata($attr, $defaultValue) {
    "use strict";
    if ($attr !== undefined) {
        return $attr
    }
    return $defaultValue;
}

function parseBoolean(str, $defaultValue) {
    "use strict";
    if (str == 'true') {
        return true;
    } else if (str == "false") {
        return false;
    }
    return $defaultValue;
}

$(window).on('load', function(){

    var $preloader = $('.ct-preloader');
    var $content = $('.ct-preloader-content');


    var $timeout = setTimeout(function(){
        $($preloader).addClass('animated').addClass('fadeOut');
        $($content).addClass('animated').addClass('fadeOut');

    }, 0);
    var $timeout2 = setTimeout(function(){
        $($preloader).css('display', 'none').css('z-index', '-9999');
    }, 500);
});

(function ($) {
       if(document.getElementById('ct-js-wrapper')){
        var snapper = new Snap({
            element: document.getElementById('ct-js-wrapper')
        });

        snapper.settings({
            disable: "right",
            easing: 'linear',
            addBodyClasses: true
        });
    }

    $(document).ready(function () {
        //Scroll to Top// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


        $('#toTop').on("click", function() {
            $("body,html").animate({scrollTop: 0}, 600);
            $("ul.ct-restaurantMenu li").removeClass('is-active');
             $("ul.ct-restaurantMenu li:first-child").addClass('is-active');
            return true;
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $("#toTop").fadeIn(300);
            } else {
                $("#toTop").fadeOut(250);
            }
        });

        // Add Background Image// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        $(".ct-js-background").each(function(){
            $(this).css("background-image", 'url(' + $(this).attr("data-bg") + ')')
            $(this).css("background-repeat", validatedata($(this).attr("data-bgrepeat"), 'repeat'))
        })

        // Snap Navigation in Mobile // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if ($devicewidth > 767 && document.getElementById('ct-js-wrapper')) {
            snapper.disable();
        }

        $(".navbar-toggle").on("click",function () {
            if($bodyel.hasClass('snapjs-left')){
                snapper.close();

            } else{
                snapper.open('left');

            }
        });

        $('.ct-menuMobile .ct-menuMobile-navbar .dropdown > a').on("click",function(e) {
            return false; // iOS SUCKS
        })
        $('.ct-menuMobile .ct-menuMobile-navbar .dropdown > a').on("click",function(e){
            var $this = $(this);
            if($this.parent().hasClass('open')){
                $(this).parent().removeClass('open');
            } else{
                $('.ct-menuMobile .ct-menuMobile-navbar .dropdown.open').toggleClass('open');
                $(this).parent().addClass('open');
            }
        })

        $('.ct-menuMobile .ct-menuMobile-navbar .onepage > a').on("click",function(e) {
            snapper.close();
        })

        // Animations Init // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        function appear() {
            $('.cssAnimate .animated').appear(function () {
                var $this = $(this);

                $this.each(function () {
                    if ($this.data('time') != undefined) {
                        setTimeout(function () {
                            $this.addClass('activate');
                            $this.addClass($this.data('fx'));
                        }, $this.data('time'));
                    } else {
                        $this.addClass('activate');
                        $this.addClass($this.data('fx'));
                    }
                });
            }, {accX: 50, accY: -50});
        }

        if ($().appear) {
            if (device.mobile() || device.tablet()) {
                $("body").removeClass("cssAnimate");
            } else {
                appear();
            }
        }

    })

    $(window).on('resize', function() {
        if ($(window).width() < 768) {
            snapper.enable();
        } else{
            snapper.disable();
        }
    })

    $(document).mouseup(function (e) {
        var $searchform = $(".ct-navbar-search");

        if(!$('#ct-js-navSearch').is(e.target)){
            if (!$searchform.is(e.target) // if the target of the click isn't the container...
                && $searchform.has(e.target).length === 0) // ... nor a descendant of the container
            {
                $searchform.hide();
                $('#ct-js-navSearch').removeClass('is-active');
            }
        }
    });

    $(window).load(function(){

        // Masonry For Content // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if (jQuery().masonry  && (jQuery(window).width()>480)) {

            jQuery('.ct-js-masonry').masonry({
                itemSelector: '.ct-js-masonryItem',
                layoutMode: 'sloppyMasonry',
                resizable: false, // disable normal resizing
                // set columnWidth to a percentage of container width
                masonry: { }
            });
        }
        // Masonry For Sidebar // -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        if (jQuery().masonry  && (jQuery(window).width()<992) && (jQuery(window).width()>767)) {

            jQuery('.ct-js-sidebar .row').masonry({
                itemSelector: '.col-sm-6.col-md-12',
                layoutMode: 'sloppyMasonry',
                resizable: false, // disable normal resizing
                // set columnWidth to a percentage of container width
                masonry: { }
            });
        }
    })

})(jQuery);