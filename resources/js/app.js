
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.toastr = require('toastr');
window.swal = require('sweetalert2');
window.Chart = require('chart.js');
window.metisMenu = require('metismenu');
window.slimScroll = require('jquery-slimscroll');

window.videojs = require('video.js');
require('videojs-youtube');

const WOW = require('wowjs');
window.wow = new WOW.WOW({
    live: false
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app'
});

(function($) {

    window.wow.init();

    "use strict"; // Start of use strict

    // Toggle the side navigation
    $(document).on('click', '#sidebarToggle', function(e) {
        e.preventDefault();
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
        if ($window.width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Category Owl Carousel
    var objowlcarousel = $(".owl-carousel-category");
    if (objowlcarousel.length > 0) {
        objowlcarousel.owlCarousel({
            items: 8,
            lazyLoad: true,
            pagination: false,
            loop: true,
            autoPlay: 2000,
            navigation: true,
            stopOnHover: true,
            navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
        });
    }

    // Login Owl Carousel
    var mainslider = $(".owl-carousel-login");
    if (mainslider.length > 0) {
        mainslider.owlCarousel({
            items: 1,
            lazyLoad: true,
            pagination: true,
            autoPlay: 4000,
            loop: true,
            singleItem: true,
            navigation: false,
            stopOnHover: true,
            navigationText: ["<i class='mdi mdi-chevron-left'></i>", "<i class='mdi mdi-chevron-right'></i>"]
        });
    }

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip()

    // Scroll to top button appear
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        event.preventDefault();
    });

})(jQuery);