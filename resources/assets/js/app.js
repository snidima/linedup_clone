import '../img/photo.jpg'
import '../img/section-bg.jpg'
import '../img/teacher01.jpg'
import '../img/manager01.jpg'
import '../img/rev1.jpg'
import '../img/rev2.jpg'
import '../img/rev3.jpg'
import '../img/rev4.jpg'
import '../img/rev5.jpg'
import '../img/rev6.jpg'


import alertify from 'alertify.js'

import api from './api.js'

import Plyr from 'plyr'
import 'plyr/dist/plyr.css'

import Register from './components/Register.vue';
import Login from './components/Login.vue';
import BuySwitcher from './components/Payment/BuySwitcher.vue';
import Payment from './components/Payment/Payment.vue';
import Upload from './components/FileUploadBtn.vue';
import PaymentHistory from './components/Payment/PaymentHistory.vue';
import Vue from 'vue';


Vue.component( 'register', Register );
Vue.component( 'upload', Upload );
Vue.component( 'login', Login );
Vue.component( 'buyswitcher', BuySwitcher );
Vue.component( 'payment', Payment );
Vue.component( 'payment-history', PaymentHistory );



if( $('#app').length ){
    let app = new Vue({
        el: '#app'
    });
}



const player = new Plyr('#lesson-player');
const players = Array.from(document.querySelectorAll('.js-player')).map(p => new Plyr(p));


window.alertify = alertify;

$('.js-menu .js-menu-open-btn').click(()=>{
    $('.js-menu').addClass('opened')
})
$('.js-menu .js-menu-close-btn').click(()=>{
    $('.js-menu').removeClass('opened')
})


$('a[href*="#"]')
// Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });



$(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
        $('.js-scrollToTop').show();
    } else {
        $('.js-scrollToTop').hide();
    }
});


$('.js-scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},500);
    return false;
});