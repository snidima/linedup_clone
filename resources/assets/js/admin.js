import $ from 'jquery';

import Vue from 'vue'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css';
import 'vue-material/dist/components/mdIcon/index.css';


import Lessons from './components/Admin/Lessons.vue';

Vue.use(VueMaterial);
Vue.component( 'lessons', Lessons );


if( $('#admin-app').length ){
    let app = new Vue({
        el: '#app'
    });
}