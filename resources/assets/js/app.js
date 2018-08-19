import '../img/photo.jpg'
import '../img/section-bg.jpg'
import '../img/teacher01.jpg'
import '../img/manager01.jpg'
import '../img/rev1.jpg'
import '../img/rev2.jpg'
import '../img/rev3.jpg'


import alertify from 'alertify.js'

import api from './api.js'

import Plyr from 'plyr'
import 'plyr/dist/plyr.css'

import Register from './components/Register.vue';
import Login from './components/Login.vue';
import BuySwitcher from './components/Payment/BuySwitcher.vue';
import Payment from './components/Payment/Payment.vue';
import Upload from './components/FileUploadBtn.vue';
import Vue from 'vue';


Vue.component( 'register', Register );
Vue.component( 'upload', Upload );
Vue.component( 'login', Login );
Vue.component( 'buyswitcher', BuySwitcher );
Vue.component( 'payment', Payment );



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