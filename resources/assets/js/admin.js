import Vue from 'vue'
import store from './components/Admin/store/vuex';
import router from './components/Admin/routes';

import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.css';
Vue.use(VueMaterial);



const app = new Vue({
    el: '#app',
    router,
    store
}).$mount('#admin-app');
