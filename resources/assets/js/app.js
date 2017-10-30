import '../img/photo.jpg'

import 'flipclock/compiled/flipclock';
import 'flipclock/compiled/flipclock.css';

import Register from './components/Register.vue';
import Login from './components/Login.vue';
import BuySwitcher from './components/Payment/BuySwitcher.vue';
import Payment from './components/Payment/Payment.vue';

import UserMain from './components/User/UserMain.vue';

import Vue from 'vue';








Vue.component( 'register', Register );
Vue.component( 'login', Login );
Vue.component( 'buyswitcher', BuySwitcher );
Vue.component( 'payment', Payment );
Vue.component( 'usermain', UserMain );




// import Personal from './components/User/Personal.vue';
// Vue.component( 'personal', Personal );



if( $('#app').length ){
    let app = new Vue({
        el: '#app'
    });
}


let clockEL = $('#course-clock');
let clock = clockEL.FlipClock(clockEL.attr('data-seconds'), {
    clockFace: 'DailyCounter',
    countdown: true,
    showSeconds: true,
    language: 'ru'

});



// $.fn.iziModal = iziModal;
// $("#modal").iziModal();
// $(document).on('click', '.trigger', function (event) {
//     event.preventDefault();
//     $('#modal').iziModal('open');
// });