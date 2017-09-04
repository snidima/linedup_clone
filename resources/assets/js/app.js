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

$('.menu__item').click(function (e) {
    e.preventDefault();
    modal.close();
    let id = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(id).offset().top
    }, 400);
});
