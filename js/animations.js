// Put class on elements when they're scrolled over
function dataVisible() {
    var threshold = $(document).scrollTop() + ($(window).height() * 1);

    $('[data-visible], .data-visible').each(function(_, element) {
        element = $(element);
        var trigger = (element.attr('data-trigger') ? $(element.attr('data-trigger')) : element);
        var visible = element.attr('data-visible') == 'visible' || element.attr('data-visible') == 'delayed';

        if(!visible && threshold > trigger.offset().top) {
            if(element.attr('data-visible-delay')) {
                element.attr('data-visible', 'delayed');
                setTimeout(makeVisible, element.attr('data-visible-delay'), element);
            }
            else {
                makeVisible(element);
            }
        }
    });

    function makeVisible(element) {
        element.attr('data-visible', 'visible');
    }
}
$(document).scroll(dataVisible);
$(window).resize(dataVisible);
dataVisible();

// Smooth-scroll the homepage's hero
jQuery(document).ready(function($) {
    var alreadyAnimating = false;

    if(!$(document.body).hasClass('page-template-home')) {
        // Only allowed on the homepage
        return;
    }

    $(window).on('wheel', function(event) {
        var scrollingDown = event.originalEvent.deltaY > 0;
        var scrollTop = $(window).scrollTop();

        // Only scroll down if we're wheeling downwards, are currently at the top, and not already animating down
        if(scrollingDown && scrollTop <= 10 && !alreadyAnimating) {
            $(document.body).addClass('scroll-locked');
            alreadyAnimating = true;
            var scrollTopVal = $(window).height();

            var heroSection = $('section.landing');
            if(heroSection.length) {
                var nextSection = heroSection.nextAll('section:first');

                if(nextSection.length) {
                    var header = $('header.top-header');
                    scrollTopVal = nextSection.offset().top;
                    scrollTopVal = scrollTopVal - header.outerHeight();
                }
            }

            $('body,html').animate({
                scrollTop: scrollTopVal,
            }, {
                duration: 1000,
                complete: function() {
                    alreadyAnimating = false;
                    $(document.body).removeClass('scroll-locked');
                },
            });
        }
    });
});

// Parallax for the stripes motif
jQuery(document).ready(function($) {
    $(window).scroll(function() {
        window.requestAnimationFrame(updateMotifParallax);
    });
    window.requestAnimationFrame(updateMotifParallax);

    function updateMotifParallax() {
        var $motifs = $('.motif').not('.motif--single');

        var scrollTop = $(window).scrollTop();
        var winHeight = $(window).height();

        $motifs.each(function() {
            var $this = $(this);
            var $wrap = $this.children('.motif__wrap');

            // Calculate the interpolation
            var start = $this.offset().top - winHeight;
            var end = $this.offset().top + $this.height();

            var scrollLength = end - start;

            var i = (scrollTop - start) / scrollLength;

            // Update the transform
            var translateY = (i * 50) - 25;

            $wrap.css('transform', 'translateY('+(translateY*-1)+'%)');

            $wrap.children('.motif__inner').css('transform', 'translateY('+translateY+'%)');
            $wrap.children('.motif__outer').css('transform', 'translateY('+translateY+'%)');
        });
    }
});
