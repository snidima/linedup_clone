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

// import Datepicker from 'vue-datepicker';
// Vue.component( 'datepicker', Datepicker );

import VueBlu from 'vue-blu'
// import Datapicker from 'vue-blu/src/components/datepicker'
import 'vue-blu/dist/css/vue-blu.min.css'

Vue.use(VueBlu)
// Vue.component( 'datepicker', Datapicker );

const app = new Vue({
    el: '#app',
    router,
    store
}).$mount('#admin-app');
