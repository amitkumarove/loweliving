$(document).ready(function($){
    checkIfEdge();
    checkHeaderScrollPos();
    profileTiles();
    initVideo();
    fullcoverVideos();
    $(window).resize(fullcoverVideos);

    // Slick
    $('.slick').slick({
        slidesToShow:1,
        slidesToScroll:1,
        pauseOnHover:false,
        pauseOnFocus:false,
        infinite:true,
        dots:true,
        adaptiveHeight: true,
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev"><img src="'+_imagedir+'/arrow-left.png"/><span class="sr-only">Previous</span></button>',
        nextArrow:'<button type="button" class="slick-next"><img src="'+_imagedir+'/arrow-right.png"/><span class="sr-only">Next</span></button>',
    })
    .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        if(currentSlide == nextSlide) {
            return;
        }

        $(this).find('.slick-arrow').addClass('active');
    }); 

    // Toggle collapsed header
    $(window).scroll(function() {
        checkHeaderScrollPos();
    });

    // Toggle hamburger menu {
    $('[data-toggle=\'menu\']').click(function() {
        var $menu = $('.header-menu ul');
        var body = $(document.body);
        body.toggleClass('menu-active');

        $menu.slideToggle(400, function() {
            if($menu.css('display') == 'none') {
                $menu.css('display', '');
            }
        });
    });

    // Isotope on projects
    if($(document.body).hasClass('post-type-archive-project')) {
        // Pre-set options
        if(window.location.hash.length > 1) {
            var $filter = $('section.projects .filters a[data-filter=\'.'+window.location.hash.slice(1)+'\']');
            if($filter.length) {
                $filter.parent().parent().find('.active').removeClass('active');
                $filter.addClass('active');
            }
        }

        var division = $('.division-filters .active').data('filter');
        var status = $('.status-filters .active').data('filter');
        var filter = (division == '*' ? '' : division)+(status == '*' ? '' : status);

        // Isotope
        var $isotope = $('.isotope').isotope({
            itemSelector: '.isotope-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            filter: projects_filter,
        });

        $('.filters a').click(function(event) {
            event.preventDefault();

            window.location.hash = '';

            $(this).parent().parent().find('.active').removeClass('active');
            $(this).addClass('active');

            division = $('.division-filters .active').data('filter');
            status = $('.status-filters .active').data('filter');
            filter = (division == '*' ? '' : division)+(status == '*' ? '' : status);

            $isotope.isotope({filter:projects_filter});
        });

        // Filter
        function projects_filter() {
            return $(this).is((filter == '' ? '*' : filter));
        }
    }

    // Load more posts
    $('button.load-more').click(function() {
        $.ajax({
            url: _ajaxurl,
            method: 'GET',
            data: {
                action: 'load_more',
                paged: ++_paged,
                ishome: _ishome,
                queryvars: _queryvars,
            },
            success: function(response) {
                var tilePost = $('.tile.post');
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                var numPostsBefore = tilePost.length;
                tilePost.parents('.wrapper-latestnews').append(response);
                document.documentElement.scrollTop = scrollTop;
                var numPostsAfter = tilePost.length;

                if(numPostsAfter - numPostsBefore < _postsperpage) {
                    $('.loadmore button').remove();
                    $('.loadmore').append('<span class="button">NO MORE POSTS</span>');
                }
            },
        });
    });

    $('.wpcf7-form').submit(function(){
        $('button[type="submit"]', this).text('SENDING...').attr('disabled', true);
    });

    $('.wpcf7').each(function(){
        this.addEventListener( 'wpcf7mailsent', function( event ) {
            $('button[type="submit"]', event.target).text('SENT!').attr('disabled', false);

            if($(this).closest('.sideform__form, .newsletter').length){
                setTimeout(function(){ window.location.href = '/thank-you/subscribed'; }, 3000);
            }
            else {
                var on_success_url = $(this).find('input[name="on_success_url"]');
                if ( on_success_url.length ) {
                    setTimeout(function(){ window.location.href = on_success_url.val(); }, 3000);
                } else {
                    setTimeout(function(){ window.location.href = '/thank-you'; }, 3000);
                }
            }

        }, false );
    });

    $('.wpcf7').each(function(){
        this.addEventListener( 'wpcf7invalid', function( event ) {
            $('button[type="submit"]', event.target).text('SUBMIT').attr('disabled', false);
        }, false );
    });

    $('.sideform__tab').click(function(){
        $(this).closest('.sideform').toggleClass('active');
    });

    $(document).click(function(e){
        if(!$(e.target).closest('.sideform').length){
            $('.sideform').removeClass('active');
        }
    });

    // // Tiles: Partners, projects and posts - first click on mobile shows overlay, second click activates the link
    // $('.tile.project, .tile.post, .tile.partner').click(function(e) {
    //     e.preventDefault();

    //     var $tile = $(this);

    //     if($tile.hasClass('is-active') && $tile.parent().is('a')) {
    //         $tile.parent()[0].click();
    //     }
    //     else {
    //         $(this).toggleClass('is-active');
    //     }
    // });


    // Select2
    if($(document.body).hasClass('blog') || $(document.body).hasClass('archive')) {
        $('select').select2({
            minimumResultsForSearch: Infinity,
        });
    }
    

    // Lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    // Project enquiry form
    $('#projectEnquiry').submit(function(event) {
        event.preventDefault();

        var $fields = $(this).find('[name]');
        var $button = $(this).find('button');
        var buttonLabel = $button.text();

        $button.prop('original-label', buttonLabel);
        $button.text('SENDING..');

        var data = {
            action: 'project_enquiry',
        };

        $('#projectEnquiry .response-output').css('display', 'none');

        $(this).find('.wpcf7-not-valid').removeClass('wpcf7-not-valid');
        var invalid = false;
        $fields.each(function() {
            if(!this.value) {
                invalid = true;
                $(this).addClass('wpcf7-not-valid');
            } else {
                data[$(this).attr('name')] = this.value;
            }

            if($(this).attr('type') == 'checkbox'){
                if(!$(this).is(":checked")){
                    data[$(this).attr('name')] = false;
                }
            }
        });

        if(invalid) {
            $button.text(buttonLabel);
            return;
        }

        $.ajax({
            url: _ajaxurl,
            method: 'POST',
            data: data,
            success: function(response) {
                var $button = $('#projectEnquiry button');
                $button.text(($button.prop('original-label') ? $button.prop('original-label') : 'SUBMIT'));

                $('#projectEnquiry .response-output').css('display', '');
                $('#projectEnquiry input').val('');
            }
        });
    });

    // Smooth anchor scrolling
    $('a[href*="#"]').click(function(e) {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name="'+this.hash.slice(1)+'"]');
            if (target.length) {
                if(target.is('#search-box')) {
                    target.slideToggle();
                }
                else if(target.is('.modal')) {
                    return;
                }
                else {
                    var header = $('header.top-header');
                    var scrollTopVal = target.offset().top - header.outerHeight();

                    $('html, body').animate({
                        scrollTop: scrollTopVal
                    }, 1000);
                }
                return false;
            }
        }
        e.preventDefault();
    });

    var sectionScrolls = $('[data-section-scroll]');
    sectionScrolls.each(function() {
        var el = $(this);
        var ignoreHeader = el.is('[data-scroll-ignore-header]');

        el.on('click', function(e) {
            var parentSection = el.closest('section');
            if(parentSection.length) {
                var nextSection = parentSection.nextAll('section:first');

                if(nextSection.length) {
                    var header = $('header.top-header');
                    var scrollTopVal = nextSection.offset().top;

                    if(header.length && !ignoreHeader) {
                        scrollTopVal = scrollTopVal - header.outerHeight();
                    }

                    $('html, body').animate({
                        scrollTop: scrollTopVal
                    }, 1000);
                }
            }
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Build the division path
    if($(document.body).hasClass('page-template-about')) {
        function generatePath() {
            var $container = $('section.divisions .container');
            var $main = $('section.divisions .main-division');
            var $blocks = $('section.divisions .sub-divisions .tile.division');
            var $left = $blocks.first();
            var $right = $blocks.last();

            var $svg = $('#division-path');
            var $pathLeft = $('#path-left');
            var $pathRight = $('#path-right');

            var pathLeft  = '';
            var pathRight = '';

            var svgHeight = $svg.height();
            var mainCenterX = $main.offset().left + ($main.outerWidth() * 0.5) - $container.offset().left;
            var leftCenterX = $left.offset().left + ($left.outerWidth() * 0.5) - $container.offset().left;
            var rightCenterX = $right.offset().left + ($right.outerWidth() * 0.5) - $container.offset().left;

            pathLeft  += 'M '+(mainCenterX - 15)+' 0';
            pathRight += 'M '+(mainCenterX + 15)+' 0';

            pathLeft  += ' V '+(svgHeight * 0.5);
            pathRight += ' V '+(svgHeight * 0.5);

            pathLeft  += ' H '+leftCenterX;
            pathRight += ' H '+rightCenterX;

            pathLeft  += ' V '+svgHeight;
            pathRight += ' V '+svgHeight;

            $('#path-left').attr('d', pathLeft);
            $('#path-right').attr('d', pathRight);

            // Set up the scroll effect
            setupClip($pathLeft[0]);
            setupClip($pathRight[0]);

            $(document).scroll(updateClips);
            updateClips();

            function updateClips() {
                var lerp = $(document).scrollTop() / ($container.height() - ($(window).height() * 0.5));
                lerp = Math.max(0, Math.min(1, lerp));
                updateClip($pathLeft[0], lerp);
                updateClip($pathRight[0], lerp);
            }

            function updateClip(path, lerp) {
                var pathLength = path.getTotalLength();
                path.style.strokeDashoffset = pathLength - (pathLength * lerp);
            }

            function setupClip(path) {
                var pathLength = path.getTotalLength();

                path.style.strokeDasharray = pathLength+' '+pathLength;
                path.style.strokeDashoffset = pathLength;

                path.getBoundingClientRect();
            }
        }
        //generatePath();
        //$(window).resize(generatePath);
    }

	$('input[type="file"]').on("change", function(e){
		var filename = $(this).val().split('\\').pop();
		$(this).closest('.wpcf7-form-control-wrap').siblings('.input-file-selection').text(filename);
	});

    // Handle placeholders on <select> elements
    function updateSelectPlaceholder() {
        var $this = $(this);

        $this.toggleClass('placeholder', $this.children('option:first-child').is(':selected'));
    }
    $('select.has-placeholder')
        .each(updateSelectPlaceholder)
        .on('change', updateSelectPlaceholder);

    // Hero banner carousel
    $('.landing .carousel-wrap').slick({
        fade:true,
        infinite:true,
        slidesToShow:1,
        arrows:false,
        dots:false,
        autoplay:true,
        autoplaySpeed:3000,
        pauseOnHover:false,
        pauseOnFocus:false,
    });

    // handle subscription options page
    $('#subscription-options').submit(function(e){
        e.preventDefault();

        var formdata = $('#subscription-options').serializeArray();

        // add unchecked checkboxes for id
        $('input[type="checkbox"]:not(:checked)',this).each(function(){
            if($(this).attr('id') !== 'unsuball'){
                formdata.push({name: this.name, value: 'unsubscribe'});
            }
        });

        updatePreferences(formdata, false);
    });

    // handle unsubscribe all
    // $('#unsubscribe-all').click(function(){

    //     var formdata = [];

    //     $('#subscription-options input[type="checkbox"]').each(function(){
    //         formdata.push({name: this.name, value: this.value});
    //     });

    //     updatePreferences(formdata, true);
    // });

    function updatePreferences(formdata){
        $('.loading-gif').addClass('in');
        $('.sub-error').slideUp();
        $('#subscription-options button').prop('disabled', true);
        $('#unsubscribe-all').prop('disabled', true);

        var name = $.urlParam('n');

        if(!name){
            name = '';
        }

        $.ajax({
            url:_ajaxurl,
            data: {
                action: 'cm_update_preferences',
                formdata: JSON.stringify(formdata),
                email: $.urlParam('e'),
                name: name,
            },
            type: 'POST'
        }).done(function(success){

            $('.loading-gif').removeClass('in');

            if(success || true){ // always true
                $('.form-wrap').slideUp(300,function(){
                    $('.thank-you').slideDown();
                });
            }else{
                // failed
                $('.sub-error').slideDown();
            }

            $('#subscription-options button').prop('disabled', false);
            $('#unsubscribe-all').prop('disabled', false);
        });
    }
	
});

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return decodeURI(results[1]) || 0;
    }
}

function checkIfEdge(){
    if(window.navigator.userAgent.indexOf("Edge") > -1){
        $('html').addClass('edge');
    }
}

function checkHeaderScrollPos() {
    var scrollTop = $(window).scrollTop();
    var winHeight = $(window).height();
    var sliderHeight = $('.landing').outerHeight() - 200;
    var $header = $('header');

    var body = $(document.body);
    if(body.hasClass('single-post')) {
        sliderHeight = 50;
    }

    if(scrollTop > sliderHeight  && $header.hasClass('collapsed')) {
        $header.removeClass('collapsed');
    }
    else if(scrollTop < sliderHeight  && !$header.hasClass('collapsed')) {
        $header.addClass('collapsed');
    }
}

function profileTiles() {
    var header = $('header.top-header');
    var headerHeight = header.outerHeight();

    var profileTiles = $('.profile-tiles');
    profileTiles.each(function(){
        var profileTileGroup = $(this);
        var profileTileItems = profileTileGroup.find('.profile-tile');

        profileTileItems.each(function() {
            var profileTileItem = $(this);
            var profileTileItemDetails = profileTileGroup.find('.profile-tile--details');

            profileTileItem.on('click', function(e) {
                e.stopPropagation();
                e.preventDefault();

                var profileTileItemDetail = profileTileItem.next();

                // close if opened
                if(profileTileItemDetail.hasClass('expanded')) {
                    profileTileItem.removeClass('active');
                    profileTileItemDetail.removeClass('expanded');
                }
                // open if closed
                else {
                    profileTileItemDetails.removeClass('expanded');
                    profileTileItems.removeClass('active');

                    profileTileItem.addClass('active');
                    profileTileItemDetail.addClass('expanded');

                    setTimeout(function() {
                        // details (old)
                        // var top_of_element = profileTileItemDetail.offset().top;
                        // var bottom_of_element = top_of_element + profileTileItemDetail.outerHeight();


                        // tile (new)
                        var top_of_tile = profileTileItem.offset().top;

                        var top_of_element = profileTileItemDetail.offset().top;
                        var bottom_of_element = top_of_element + profileTileItemDetail.outerHeight();

                        var top_of_screen = $(window).scrollTop();
                        var bottom_of_screen = top_of_screen + $(window).innerHeight();

                        // details (old)
                        // if (bottom_of_screen > bottom_of_element){
                        //     // console.log('visible');
                        // } else {
                        //     $('html, body').animate({
                        //         scrollTop: top_of_element + (bottom_of_element - top_of_element) - (bottom_of_screen - top_of_screen)
                        //     }, 200);
                        //     // console.log('not visible');
                        // }

                        // tile (new)
                        if((top_of_screen + headerHeight) < top_of_tile) {
                            $('html, body').animate({
                                scrollTop: top_of_tile - headerHeight
                            }, 200);
                        }
                    }, 500);
                }

                var profileTileClose = profileTileItemDetail.find('.close-trigger');
                profileTileClose.on('click', function(f) {
                    f.stopPropagation();
                    f.preventDefault();
                    profileTileItemDetail.removeClass('expanded');
                });
            });

        });
    });

    if(profileTiles.length) {
        checkProfileHeight();

        var resizeId;
        $(window).on('resize orientationchange', function() {
            clearTimeout(resizeId);
            resizeId = setTimeout(function() {
                checkProfileHeight();
            }, 500);
        });
    }
}

function checkProfileHeight() {
    $('html').attr('style', '');

    var labelHeight = Math.max.apply(null, $('.profile-label-wrapper').map(function() {
        return $(this).outerHeight();
    }).get());

    $('html').attr('style', '--profile-label-height:' + labelHeight + 'px;');

}

function fullcoverVideos() {
    $('.landing .iframe-wrap').each(function () {
        var $container = $(this);
        var $iframe = $container.find('iframe');

        if ($iframe.length) {
            // Resize the iframe to cover the container
            cover($container, $iframe.attr('width'), $iframe.attr('height'));
        }
    });

    function cover($target, width, height) {
        var $panel = $target.parents('.landing');

        var winWidth = $panel.outerWidth();
        var winHeight = $panel.outerHeight();

        var ratio = height / width;
        var winRatio = winHeight / winWidth;

        if (winRatio > ratio) {
            $target.width(width * (winHeight / height));
            $target.height(winHeight);

            $target.css('top', 0);
            $target.css('left', (winWidth - $target.width()) / 2)
        } else {
            $target.width(winWidth);
            $target.height(height * (winWidth / width));

            $target.css('top', (winHeight - $target.height()) / 2);
            $target.css('left', 0)
        }
    }
} 
function initVideo() {
    var videoContainers = $('#testimonials .video-section');
    if(videoContainers.length) {
        videoContainers.each(function() {
            var videoContainer = $(this);
            var iFrame = videoContainer.find('iframe').first();
            var overlay = videoContainer.find('.video-section__overlay');
            if(iFrame && iFrame.length > 0) {
                if(iFrame[0].src.indexOf('vimeo') !== -1) {
                    var player = new Vimeo.Player(iFrame);

                    if(overlay) {
                        overlay.on('click', function(e) {
                            videoContainer.addClass('active');
                            $(this).fadeOut();
                            player.play();
                        });
                    }
                } else if(iFrame[0].src.indexOf('youtube') !== -1) {
                    if(overlay) {
                        overlay.on('click', function(e) {
                            videoContainer.addClass('active');
                            iFrame[0].src += '&autoplay=1';

                            setTimeout(function() {
                                overlay.fadeOut();
                            }, 500);
                        });
                    }
                }
            }
        });
    }
}