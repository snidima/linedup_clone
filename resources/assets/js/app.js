import '../img/photo.jpg'
import alertify from 'alertify.js'

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
window.alertify = alertify;