import $ from 'jquery';


import Register from './components/Register.vue';
import Login from './components/Login.vue';
import Vue from 'vue';


Vue.component( 'register', Register );
Vue.component( 'login', Login );

if( $('#app').length ){
    let app = new Vue({
        el: '#app'
    });
}

