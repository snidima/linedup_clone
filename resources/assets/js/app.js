import '../img/photo.jpg'



import 'flipclock/compiled/flipclock';
import 'flipclock/compiled/flipclock.css';

import Register from './components/Register.vue';
import Login from './components/Login.vue';


import Vue from 'vue';


import 'izimodal/js/iziModal.min';
import 'izimodal/css/iziModal.min.css'





Vue.component( 'register', Register );
Vue.component( 'login', Login );


// Vue.component('tabs', Tabs);
// Vue.component('tab', Tab);

import Personal from './components/User/Personal.vue';
Vue.component( 'personal', Personal );



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


$("#modal").iziModal();
$(document).on('click', '.trigger', function (event) {
    event.preventDefault();
    $('#modal').iziModal('open');
});