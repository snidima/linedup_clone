import $ from 'jquery';
global.jQuery = $;
// import 'daterangepicker';
// import 'daterangepicker/daterangepicker.scss';


import Vue from 'vue'
import store from './components/Admin/store/vuex';
import router from './components/Admin/routes';

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css';
Vue.use(VueMaterial);



import VueBlu from 'vue-blu'
import 'vue-blu/dist/css/vue-blu.min.css'

Vue.use(VueBlu)
// Vue.component( 'datepicker', Datapicker );

import Draggable from 'vuedraggable';
Vue.component( 'draggable', Draggable );

const app = new Vue({
    el: '#app',
    router,
    store
}).$mount('#admin-app');
