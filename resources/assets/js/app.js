import $ from 'jquery';


import Register from './components/Register.vue';
import Login from './components/Login.vue';
// import Personal from './components/User/Personal.vue';

// import {Tabs, Tab} from 'vue-tabs-component';
// import 'vue-tabs-component/src/components/'

import Vue from 'vue';






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

