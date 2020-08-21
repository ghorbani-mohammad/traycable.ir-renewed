jQuery(document).ready(function ($) {
    $(document).ready(function(){
        $('.blocks-gallery-item a').attr("data-fancybox", "gallery");
        $('.wp-block-image a').attr("data-fancybox", "");
        $('[data-fancybox="gallery"]').fancybox();
        $('.slider-show').slick({responsive: [{breakpoint: 1024, settings: {slidesToShow: 3}},{breakpoint: 769, settings: {slidesToShow: 2}}, {breakpoint: 480, settings: {slidesToShow: 1}}]});
        $('.elementor-slides').slick();
        $('.wpcf7-submit').parent().addClass('tmt-wpcf7-submit');

        // Accordion
        $(".tmt-accordion-title").on("click", function() {
            if ($(this).hasClass("tmt-open")) {
                $(this).removeClass("tmt-open");
                $(this).siblings(".tmt-accordion-content").slideUp(200);
            } else {
                if ($(this).hasClass("multiple")) {}
                else {
                    $(".tmt-accordion-title").removeClass("tmt-open");
                    $(".tmt-accordion-content").slideUp(200);
                }
                $(this).addClass("tmt-open");
                $(this).siblings(".tmt-accordion-content").slideDown(200);
            }
        });
    });
if (window.matchMedia('(max-width: 767px)').matches) {
    $("#nav_btn").click(function(){
        $("body").toggleClass('open_menu');
    });
    $(".menu-item-has-children").click(function (e) {
        e.stopPropagation();
        $(this).toggleClass('open-sub-menu').children(".sub-menu").slideToggle();
    });
}
    // STAART Back to Top Settings
    var btn = $('#top');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 500) {
            btn.fadeIn();
        } else {
            btn.fadeOut();
        }
    });
    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
    // END Back to Top Settings


    //icon header
    $(".icon-drop-down").on("click", function(e) {
        e.preventDefault();
        if ($(this).hasClass("tmt-open")) {
            $(this).removeClass("tmt-open");
            $(this).next(".slide-toggle").slideUp(300);
        } else {
            $(".icon-drop-down").removeClass("tmt-open");
            $(".slide-toggle").slideUp(300);
            $(this).addClass("tmt-open");
            $(this).next(".slide-toggle").slideDown(300);
        }
    });

});

( function( $ ) {
    var WidgetElementorSlidesHandler = function( $scope, $ ) {
        $scope.find('.elementor-slides').slick();
    };
    var WidgetElementorCarouselHandler = function( $scope, $ ) {
        $scope.find('.slider-show').slick({responsive: [{breakpoint: 1024, settings: {slidesToShow: 3}},{breakpoint: 769, settings: {slidesToShow: 2}}, {breakpoint: 480, settings: {slidesToShow: 1}}]});
    };
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/themento_slides.default', WidgetElementorSlidesHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/themento_post_carousel.default', WidgetElementorCarouselHandler );
    } );
} )( jQuery );