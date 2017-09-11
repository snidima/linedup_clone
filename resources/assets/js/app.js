import jQuery from 'jQuery'
window.$ = jQuery;

import  tingle from 'tingle.js/dist/tingle.min';
import 'tingle.js/dist/tingle.min.css';


let modal = new tingle.modal({
    footer: false,
    stickyFooter: false,
    closeMethods: ['overlay', 'button', 'escape'],
    closeLabel: "Закрыть",
    cssClass: ['menu-container']
});

// set content
modal.setContent($('#menu-content').html());





$('#js-menu').click(()=>{
    modal.open();
});

$('.menu__item:not(.menu__item_user)').click(function (e) {
    e.preventDefault();
    modal.close();
    let id = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(id).offset().top
    }, 400);
});

$.fn.extend({
    animateCss: function (animationName) {
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        this.addClass('animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
        });
        return this;
    }
});

$('#qweqwe').click(()=>{
    $('.menu2').show().animateCss('fadeIn');
});

$('#rjnownge').click(function(){
    $('.menu2').animateCss('zoomOutUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).hide();
    });

});
