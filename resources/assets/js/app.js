import $ from 'jquery';


import Register from './components/Register.vue';
import Vue from 'vue';


Vue.component( 'register', Register );
if( $('#app').length ){
    let register = new Vue({
        el: '#app'
    });
}

